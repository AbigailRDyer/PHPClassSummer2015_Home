<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/bootstrap.css">
        <title></title>
    </head>
    <body>
    
    <center>
        <br />
        <h1>Corporation Database</h1><br /><br />
        
        <?php
//connecting to the database connection file
        include './includes/dbconn.php';
        include './includes/functions.php';
        include './includes/dbData.php';
        
        
        
        include './includes/form2.php';
        
        $column = '';
        $search = '';
        $results = searchTest($column, $search);
        
        
        ?>
        
        <h4>or...</h4>
        <br />
        
        <?php
        include './includes/form1.php';
        ?>
    
<!-- Navigation 
                <input class="btn btn-default" type="button" value="Add New" onClick="location.href='create.php'"/>
                <input class="btn btn-default" type="submit" name="searchby" value="View All" onClick="location.href='view.php'"/>   
            -->
                <br />
    </center>
    </body>
</html>
