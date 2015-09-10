<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/bootstrap.css">
        <title></title>
    </head>
    <body>
        <?php
            include_once 'functions/dbConn.php';
            include_once 'functions/loginFunction.php';
            include_once 'functions/until.php';
        ?>
        <center>
        <h1>Address Book</h1><br />
        
        <?php include 'includes/loginform.html.php'; ?>
        
        <button class="btn btn-default" onClick="location.href='createlogin.php'">Sign Up</button>
    </body>
</html>
