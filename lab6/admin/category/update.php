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
        
        $results ='';
        
         if (isPostRequest() ) {
            $category_id = filter_input(INPUT_POST, 'category_id');
            $category = filter_input(INPUT_POST, 'category');
             
            updateCategory($category_id, $category);
            
            if (updateCategory($category_id, $category) == true) {
                    $results = 'Category updated';
            }
            else {
                    $results = 'Category was not updated';
            }
         }
        ?>
    <center>
        <h1>Update Category</h1><br/>
        
        
        <form method="post" action="#">
            <div class="form-group"> 
            <select name="category_id">
            <?php foreach ($categories as $row): ?>
                <option value="<?php echo $row['category_id']; ?>">
                    <?php echo $row['category']; ?>
                </option>
            <?php endforeach; ?>
            </select><br/></div>
            Update to: <input type="text" name="category" value="" /><br /><br />
            <input class="btn btn-default" type="submit" value="Submit" /><br/><br/>
        </form>
            <button class="btn btn-default" onClick="location.href='index.php'">Back</button><br/>
        
        <?php include '../../includes/results.html.php'; ?>
    </center>
    </body>
</html>
