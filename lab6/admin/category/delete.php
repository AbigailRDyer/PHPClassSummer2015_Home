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
            
            deleteCategory($category_id);
            
            if (deleteCategory($category_id) == true) {
                    $results = 'Category deleted';
                }
                else {
                    $results = 'Category was not deleted';
                }
            
        }
        
        ?>
    <center>
        <h1>Delete Category</h1><br/>
        
        
        <form method="post" action="#">
            
            <div class="form-group">
            <select name="category_id">
            <?php foreach ($categories as $row): ?>
                <option value="<?php echo $row['category_id']; ?>">
                    <?php echo $row['category']; ?>
                </option>
            <?php endforeach; ?>
            </select>
            </div>
            <input class="btn btn-default" type="submit" value="Delete" /><br/><br/>
        </form><br/>
        <button class="btn btn-default" onClick="location.href='index.php'">Back</button>
        <?php include '../../includes/results.html.php'; ?>
    </center>
    </body>
</html>
