<?php
include_once "header.php";
?>
<body>
    <br>
    <?php
     echo __DIR__."<br>";
    ?>

    <br>
    <div class="row">
        <div class="col-md-5 col-centered">
            <div id="message" class="alert alert-info" style="display: none;"></div>
            <div class="panel panel-default">
                <div class="panel-heading">licence generator</div>
                <div class="panel-body">
<form id="license" method="post" action="send-data.php" class="form-well">
    <fieldset>
    <div class="form-group">
<input type="email" name="user" id="user" placeholder="Enter the email of the receipient" class="form-control">
        <span id="error"></span>
    </div>
    
    <div class="form-group">
<button type="submit" name="sub_btn" class="btn btn-primary">Generate License File</button>
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