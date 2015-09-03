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
    <center>
        <h1>Update Product</h1>
        
        <?php include '../../includes/results.html.php'; ?>
        
        
        <form method="post" action="#">
            <div class="form-group"> 
            New Product Name: <input type="text" name="product" value=""/><br />
            Price: <input type="text" name="price" value="" />
            <input class="btn btn-default" type="submit" value="Submit" /></div>
        </form>
            <button class="btn btn-default" onClick="location.href='index.php'">Back</button><br/>
    </center>
    </body>
</html>
