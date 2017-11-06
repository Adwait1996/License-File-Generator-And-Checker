
<?php

 class licensing
{
               
                 private $db;
     function __construct($con)
     {
           $this->db = $con;
        
     }
	public function insert($email,$path,$datemodified)
	{
		try
		{

			$stmt= $this->db->prepare("INSERT INTO license (email,path,datemodified) VALUES (:email,:path,:datemodified)");

			$stmt->bindParam(":email",$email);
			$stmt->bindParam(":path",$path);
			$stmt->bindParam(":datemodified",$datemodified);
			$stmt->execute();
			return true;
			
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
			return false;
		}
	}
	public function writefile($filename,$licenseinfo)
	{
		

		$handle=fopen($filename,'w');
		fwrite($handle, $licenseinfo);
		fclose($handle);

	}

	public function tampercheck($filename,$email)
	{
		$stmt=$this->db->prepare("SELECT datemodified ,path FROM license WHERE email=:email");
		$stmt->bindParam(":email",$email);
         $stmt->execute();
		$date_modified=$stmt->fetch();
		$date_modified_server=$date_modified['datemodified'];
		$path=$date_modified['path'];
		$date_modified_client= filemtime($path);
		if($date_modified_server==$date_modified_client)
			return true;
		else
			return false;
	}
	public function checkfile($filename)
	{
        $array=explode(".",$filename);
        $extn=$array[1];
        if($extn!="lic") die('Invalid file type..');
        $file = file_get_contents($filename);
	    $array=explode(":",$file);
	    $email=trim($array[1]);
	    $date_start=date('d-m-Y H:i:s',trim($array[3]));
	    $date_end=date('d-m-Y H:i:s',trim($array[5]));
	    $date_now=date('d-m-Y H:i:s');
	    $diff=date_diff(date_create($date_now),date_create($date_end));
	    $days=$diff->format("%R%a days");
	    if($this->tampercheck($filename,trim($array[1])))
	    {
		    echo "ISSUED TO->".$array[1]."<br>";
		    echo "VALID UNTIL->".$date_start."<br>";
		    echo "VALID UNTIL->".$date_end."<br>";
		    if($days>=0)
		        echo "This license is VALID.!!";
		    else
		    	echo "This license has expired..!!";

		    echo "<br> ".$days."Remaining";
	    }
	else
		echo "This license is being edited hence Invalid.!!";
	
}
}
 ?>