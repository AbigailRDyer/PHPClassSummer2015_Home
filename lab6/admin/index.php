<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../css/bootstrap.css">
        <title></title>
    </head>
    <body>
        <br />
    <center>
        <?php
        //require_once '../includes/session-start.req-inc.php';
        //require_once '../includes/access-required.html.php';
        require '../functions/productsFunctions.php';
        require '../functions/categoryFunctions.php';
        require '../functions/until.php';
        //require '../includes/loginform.html.php';
        ?>
        <button class="btn btn-default" onClick="location.href='category/index.php'">View Categories</button>
        <button class="btn btn-default" onClick="location.href='products/index.php'">View Products</button>
    </center>
    </body>
</html>
