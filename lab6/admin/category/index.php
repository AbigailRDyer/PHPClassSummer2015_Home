<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../../css/bootstrap.css">
        <title></title>
    </head>
    <body>
        <?php
        require_once '../../includes/session-start.php';
        require_once '../../includes/access-required.html.php';
         
        include_once '../../functions/dbConn.php';
        include_once '../../functions/categoryFunctions.php';
        include_once '../../functions/productsFunctions.php';
        include_once '../../functions/until.php';
        
        $db = getDatabase();
        $stmt = $db->prepare("SELECT * FROM categories");
            $results = array();
            
            if ($stmt->execute() && $stmt->rowCount() > 0) {
                $results = $stmt->fetchAll(PDO::FETCH_ASSOC); 
            } ?>
    <center>
        <table class="table">
            <thead>
                <tr>
                    <th><h3>Viewing All Categories</h3></th>
                </tr>
            </thead>
            <br /><button class="btn btn-default" onClick="location.href='create.php'">Add New Category</button>
         <?php foreach ($results as $row): ?>
                <tr>
                    <td><?php echo $row['category']; ?></td>
                    <td><a href="update.php?id=<?php echo $row['category_id']; ?>">Update</a></td>            
                    <td><a href="delete.php?id=<?php echo $row['category_id']; ?>">Delete</a></td>            
                </tr>
            <?php endforeach; ?>
            
        </table>
        <button class="btn btn-default" onClick="location.href='../index.php'">Back</button><br/>
    </center>
    
    </body>
</html>
