<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../../css/bootstrap.css">
        <title></title>
    </head>
    <body>
        <?php
        require_once '../../includes/session-start.req-inc.php';
        require_once '../../includes/access-required.html.php';
        require '../../functions/categoryFunctions.php';
        require '../../functions/until.php';
        
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
        
        <h1>Delete Category</h1>
        
        <?php include '../../includes/results.html.php'; ?>
        
        <form method="post" action="#">
            
            <select name="category_id">
            <?php foreach ($categories as $row): ?>
                <option value="<?php echo $row['category_id']; ?>">
                    <?php echo $row['category']; ?>
                </option>
            <?php endforeach; ?>
            </select>
            <input type="submit" value="Delete" />
            <button class="btn btn-default" onClick="location.href='index.php'">Back</button>
        </form>
    </body>
</html>
