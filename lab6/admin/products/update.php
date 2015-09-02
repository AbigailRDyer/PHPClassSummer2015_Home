<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        
        require '../../functions/productsFunctions.php';
        require '../../functions/until.php';
        
        $results ='';
        
         if (isPostRequest() ) {
            $product_id = filter_input(INPUT_POST, 'product_id');
            $product = filter_input(INPUT_POST, 'product');
            $price = filter_input(INPUT_POST, 'price');
            $image = filter_input(INPUT_POST, 'image');
             
            UpdateProduct($product_id, $product, $price, $image);
            
            if (UpdateProduct($product_id, $product, $price, $image) == true) {
                    $results = 'Product updated';
            }
            else {
                    $results = 'Product was not updated';
            }
         }
        ?>
        
        <h1>Update Product</h1>
        
        <?php include '../../includes/results.html.php'; ?>
        
        
        <form method="post" action="#">
            New Product Name: <input type="text" name="product" value=""/><br />
            Price: <input type="text" name="price" value="" />
            <input type="submit" value="Submit" />
        </form>
    </body>
</html>
