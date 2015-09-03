<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            require_once '../includes/session-start.php';
            require_once '../functions/cart-functions.php';
            require_once '../functions/dbConn.php';
            require_once '../functions/until.php';
            require_once '../functions/categoryFunctions.php';
            require_once '../functions/productsFunctions.php';
                        
            startCart();            
            
            $allCategories = getAllCategories();            
            $allProducts = getAllProducts();
            
            $categorySelected = filter_input(INPUT_GET, 'cat');
            $action = filter_input(INPUT_POST, 'action');
                       
            
            if ( $action === 'buy' ) {
                $productID = filter_input(INPUT_POST, 'product_id');
                addToCart($productID);
                
            }
                  
           
            include_once '../includes/categories.php';
            include_once '../includes/products.php';
            
            
            
        ?>
    </body>
</html>
