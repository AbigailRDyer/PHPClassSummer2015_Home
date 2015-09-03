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
        
        $products = getAllProducts();
        
        $results ='';
        
        if (isPostRequest() ) {
            $product_id = filter_input(INPUT_POST, 'product_id');
            
            deleteProduct($product_id);
            
            if (deleteProduct($product_id) == true) {
                    $results = 'Product deleted';
                }
                else {
                    $results = 'Product was not deleted';
                }
            
        }
        
        ?>
    <center>
        <h1>Delete Product</h1>
        
        <?php include '../../includes/results.html.php'; ?>
        
        <form method="post" action="#">
            
            <div class="form-group"> 
            <select name="product_id">
            <?php foreach ($products as $row): ?>
                <option value="<?php echo $row['product_id']; ?>">
                    <?php echo $row['product']; ?>
                </option>
            <?php endforeach; ?>
            </select>
            <input class="btn btn-default" type="submit" value="Delete" />
                </div>
        </form>
            <button class="btn btn-default" onClick="location.href='index.php'">Back</button><br/>
    </center>
    </body>
</html>
