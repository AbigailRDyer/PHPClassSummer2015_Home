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
        $stmt = $db->prepare("SELECT * FROM products");
            $results = array();
            
            if ($stmt->execute() && $stmt->rowCount() > 0) {
                $results = $stmt->fetchAll(PDO::FETCH_ASSOC); 
            } ?>
    <center>
        <table class="table">
            <thead>
                <tr>
                    <th><h3>Viewing All Products</h3></th>
                </tr>
            </thead>
            <br /><button class="btn btn-default" onClick="location.href='create.php'">Add New Product</button>
         <?php foreach ($results as $row): ?>
                <tr>
                    <td><?php echo $row['product']; ?></td>
                    <td>$<?php echo $row['price']; ?></td>
                    <td><a href="update.php?id=<?php echo $row['product_id']; ?>">Update</a></td>            
                    <td><a href="delete.php?id=<?php echo $row['product_id']; ?>">Delete</a></td>            
                </tr>
            <?php endforeach; ?>
    </center>
    </body>
</html>
