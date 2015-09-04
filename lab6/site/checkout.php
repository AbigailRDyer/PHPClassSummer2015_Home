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
                
            $total = 0;
            
            $checkoutProducts = array();
            
            $items = getCart();
            
            foreach ($items as $id) {
                $checkoutProducts[] = getProduct($id);
            }
            
            include '../includes/checkout.php';
        ?>
    </body>
</html>
