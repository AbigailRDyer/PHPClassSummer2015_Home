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

        $categories = getAllCategories();

        if (isPostRequest()) {
            $category_id = filter_input(INPUT_POST, 'category_id');
            $product = filter_input(INPUT_POST, 'product');
            $price = filter_input(INPUT_POST, 'price');
            $image = uploadProductImage();

            $errors = array();

            if (!isValidPrice($price)) {
                $errors[] = 'Price is not valid';
            }

            if (!isValidProduct($product)) {
                $errors[] = 'Product is not valid';
            }


            if (false === $image) {
                $errors[] = 'image could not be uploaded';
            }

            if (count($errors) == 0) {

                if (createProduct($category_id, $product, $price, $image)) {
                    $results = 'Product Added';
                } else {
                    $results = 'Product was not added';
                }
            }
        }
        ?>
    <center>
        <h1>Add Product</h1><br />

        <?php if (isset($errors) && count($errors) > 0) : ?>
            <ul>
                <?php foreach ($errors as $error): ?>
                    <li><?php echo $error; ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>

        <form method="post" action="#" enctype="multipart/form-data">
            Category:
            <select name="category_id">
                <?php foreach ($categories as $row): ?>
                    <option value="<?php echo $row['category_id']; ?>">
                        <?php echo $row['category']; ?>
                    </option>
                <?php endforeach; ?>
            </select><br /><br /><div class="form-group">  
                Product Name: <br /><input type="text" name="product" value="" /> 
                <br /> 
                Price: <br /><input type="text" name="price" value="" /> 
                <br /><br />
                <label>Image Upload: </label>
                <input name="upfile" type="file">
            </div><br/>
            <input class="btn btn-default" type="submit" value="Submit" />
        </form><br />
        <button class="btn btn-default" onClick="location.href = 'index.php'">Back</button>

        <br/>
        <?php include '../../includes/results.html.php'; ?>

    </center>

</body>
</html>
