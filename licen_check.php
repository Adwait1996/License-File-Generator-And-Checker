<?php
include_once "header.php";
?>
<body>
    <br>
    <?php
     echo __DIR__."<br>";
     //echo "<br>".filemtime("6cdc04ba0deaced22b834d34d1ceb141.lic");
     echo $directory =dirname(__FILE__);
    ?>

    <br>
    <div class="row">
        <div class="col-md-5 col-centered">
            <div id="message" class="alert alert-info" style="display: none;"></div>
            <div class="panel panel-default">
                <div class="panel-heading">licence file checker</div>
                <div class="panel-body">
    <form id="license_check" enctype="multipart/form-data" method="post" action="check-file.php" class="form-well">
    <fieldset>
    <div class="form-group">
        <input type="file" name="license" id="lic-file" class="form-control">
        <span id="error"></span>
    </div>
    
    <div class="form-group">
<button type="submit" name="sub_btn" class="btn btn-primary">Validate this License File</button>
    </div>
</fieldset>
        </form>
    </div>
        </div>
        </div>
    </div>
        <?php
        include_once "footer.php";
        ?>