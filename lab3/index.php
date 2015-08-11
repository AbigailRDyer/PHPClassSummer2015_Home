<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/bootstrap.css">
        <title></title>
    </head>
    <body>
        <?php
//connecting to the database connection file
        include './dbconn.php';
        include './functions.php';
        ?>
    <center>
        <br />
        <h1>Corporation Database</h1><br /><br />
<!-- Navigation -->
                <input class="btn btn-default" type="button" value="Add New" onClick="location.href='create.php'"/>
                <input class="btn btn-default" type="submit" name="searchby" value="View All" onClick="location.href='view.php'"/>   
            
                <br />
    </center>
    </body>
</html>
