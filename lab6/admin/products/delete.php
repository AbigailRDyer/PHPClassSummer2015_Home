<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        require_once '../../includes/session-start.req-inc.php';
        require_once '../../includes/access-required.html.php';
        require '../../functions/productsFunctions.php';
        require '../../functions/until.php';
        
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
        
        <h1>Delete Product</h1>
        
        <?php include '../../includes/results.html.php'; ?>
        
        <form method="post" action="#">
            
            <select name="product_id">
            <?php foreach ($products as $row): ?>
                <option value="<?php echo $row['product_id']; ?>">
                    <?php echo $row['product']; ?>
                </option>
            <?php endforeach; ?>
            </select>
            <input type="submit" value="Delete" />
        </form>
    </body>
</html>
