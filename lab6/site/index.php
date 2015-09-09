<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../css/bootstrap.css">
        <title></title>
    </head>
    <body><br /><center>
        <header>
        <button class="btn btn-default" onClick="location.href='checkout.php'">View Cart</button><br /><br />
        <form method="post" action="#">
                    <input class="btn btn-xs" type="submit" value="Empty Cart" />
                    <input type="hidden" name="action" value="empty" />
        </form>
        
        
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
            if ($categorySelected != "")
                    {
                    $allProducts = getProductByCategory($categorySelected);
                    }
            
            
            $action = filter_input(INPUT_POST, 'action');
                       
            
            if ( $action === 'buy' ) {
                $productID = filter_input(INPUT_POST, 'product_id');
                addToCart($productID);
                
            }
            
            
            if ( $action === 'empty' )
                {
                unset($_SESSION['cart']);
                header('Location: ?cart');
                exit();
                }
                  
           
            include_once '../includes/categories.php';
            include_once '../includes/products.php';
            
            
        ?>
        <br />
        
        <button class="btn btn-default" onClick="location.href='../index.php'">Back</button>
    </center>
    </body>
</html>
