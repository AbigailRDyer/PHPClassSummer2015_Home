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
        include './includes/dbConn.php';
        $db = getDatabase();
        
//select all from corps table
            $stmt = $db->prepare("SELECT * FROM corps");
            $results = array();
            
            if ($stmt->execute() && $stmt->rowCount() > 0) {
                $results = $stmt->fetchAll(PDO::FETCH_ASSOC); 
            } ?>
    <center>
        <br />
        
<!-- Navigation -->
       <button class="btn btn-default" onClick="location.href='create.php'">Add New</button>
       <button class="btn btn-default" onclick="window.location.href='index.php'">Back</button>
       
<!--table to display the company names-->
        <table class="table">
            <thead>
                <tr>
                    <th><h3>Viewing All Companies</h3></th>
                </tr>
            </thead>
         <?php foreach ($results as $row): ?>
<!-- Navigation -->
                <tr>
                    <td><?php echo $row['corp']; ?></td>
                    <td><a href="read.php?id=<?php echo $row['id']; ?>">Read</a></td>
                    <td><a href="update.php?id=<?php echo $row['id']; ?>">Update</a></td>            
                    <td><a href="delete.php?id=<?php echo $row['id']; ?>">Delete</a></td>            
                </tr>
            <?php endforeach; ?>
            
        </table>
<!-- Navigation -->
       <button class="btn btn-default" onClick="location.href='create.php'">Add New</button>
       <button class="btn btn-default" onclick="window.location.href='index.php'">Back</button>
    </center>
        <br/>
        
        
    </body>
</html>