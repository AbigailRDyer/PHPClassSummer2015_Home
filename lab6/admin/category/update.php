<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        
        require '../../functions/categoryFunctions.php';
        require '../../functions/until.php';
        
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
        
        <h1>Update Category</h1>
        
        <?php include '../../includes/results.html.php'; ?>
        
        
        <form method="post" action="#">
            <select name="category_id">
            <?php foreach ($categories as $row): ?>
                <option value="<?php echo $row['category_id']; ?>">
                    <?php echo $row['category']; ?>
                </option>
            <?php endforeach; ?>
            </select><br/>
            New category: <input type="text" name="category" value="" />
            <input type="submit" value="Submit" />
        </form>
    </body>
</html>
