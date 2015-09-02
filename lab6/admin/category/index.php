<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../../css/bootstrap.css">
        <title></title>
    </head>
    <body>
        <?php
        //require_once '../../includes/session-start.req-inc.php';
        //require_once '../../includes/access-required.html.php';
        require '../../functions/productsFunctions.php';
        require '../../functions/categoryFunctions.php';
        require '../../functions/until.php';
        require '../../functions/dbConn.php';
        
        $db = getDatabase();
        $stmt = $db->prepare("SELECT * FROM categories");
            $results = array();
            
            if ($stmt->execute() && $stmt->rowCount() > 0) {
                $results = $stmt->fetchAll(PDO::FETCH_ASSOC); 
            } ?>
        
        <table class="table">
            <thead>
                <tr>
                    <th><h3>Viewing All Categories</h3></th>
                </tr>
            </thead>
         <?php foreach ($results as $row): ?>
                <tr>
                    <td><?php echo $row['category']; ?></td>
                    <td><a href="read.php?id=<?php echo $row['category_id']; ?>">Read</a></td>
                    <td><a href="update.php?id=<?php echo $row['category_id']; ?>">Update</a></td>            
                    <td><a href="delete.php?id=<?php echo $row['category_id']; ?>">Delete</a></td>            
                </tr>
            <?php endforeach; ?>
            
        </table>
    </body>
</html>
