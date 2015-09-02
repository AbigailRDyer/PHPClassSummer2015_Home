<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        
        <?php
        //require_once '../../includes/session-start.req-inc.php';
        //require_once '../../includes/access-required.html.php';
        require '../../functions/categoryFunctions.php';
        require '../../functions/until.php';
        
        $results ='';
        
        if (isPostRequest() ) {
            $category = filter_input(INPUT_POST, 'category');
            
            if(isValidCategory($category) == true) {
              createCategory($category);  
                
              $results ='Category added';
            }
            else {
              $results ='Category is not valid';
            }
        }?>
        
        <h1>Add Category</h1>
        
        <?php include '../../includes/results.html.php'; ?>
        
        
        <form method="post" action="#">
            Category Name : <input type="text" name="category" value="" />
            <input type="submit" value="Submit" />
        </form>
        
        
    </body>
</html>
