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
        include 'includes/dbConn.php';
        include 'includes/dbData.php';
        include 'index.php';
        $results = getALLTestData($columnsOrder, $orderBy);
?>
    <center>
        <br />
        
<!-- Navigation -->
       <button class="btn btn-default" onClick="location.href='create.php'">Add New</button>
       <button class="btn btn-default" onclick="window.location.href='index.php'">Back</button>
       
<!--table to display the company names-->
        <table class="table">
            <thead>
                
            </thead>
         <?php foreach ($results as $row): ?>
<!-- Navigation -->
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['corp']; ?></td>
                    <td><?php echo $row['incorp_dt']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['owner']; ?></td>
                    <td><?php echo $row['zipcode']; ?></td>
                    <td><?php echo $row['phone']; ?></td>
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