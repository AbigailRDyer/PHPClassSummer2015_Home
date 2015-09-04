<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../../css/bootstrap.css">
        <title></title>
    </head>
    <body>
    <center>
        <header>
        <button class="btn btn-default" onClick="location.href='checkout.php'">View Cart</button>
        </header>
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
    </center>
    </body>
</html>
