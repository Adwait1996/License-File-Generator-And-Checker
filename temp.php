<?php
include_once "connection.php";
?>
<?php
$email="adwaitanand1996@gmail.com";
/*$path="c/windows";
$datemodified="loll";*/

        $stmt=$con->prepare("SELECT datemodified FROM license WHERE email=:email");
		$stmt->bindParam(":email",$email);
         $stmt->execute();
		$date_modified=$stmt->fetch();
		$date_modified_server=$date_modified['datemodified'];

		echo $date_modified_server;
		/*$date_modified_client= filemtime($filename);
		echo $date_modified_client;
		if($date_modified_server==$date_modified_client)
			return true;
		else
			return false;*/

?>