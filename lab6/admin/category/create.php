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
            $category = filter_input(INPUT_POST, 'category');
            
            if(isValidCategory($category) == true) {
              createCategory($category);  
                
              $results ='Category added';
            }
            else {
              $results ='Category is not valid';
            }
        }?>
            
    <center>
        <h1>Add Category</h1><br/>
        
    
        <form method="post" action="#">
            <div class="form-group">
            Category Name : <input type="text" name="category" value="" /><br/><br/>
            <input class="btn btn-default" type="submit" value="Submit" /><br/>
            </div>
        </form>
        <button class="btn btn-default" onClick="location.href='index.php'">Back</button>
        
        <?php include '../../includes/results.html.php'; ?>
    </center>
        
    </body>
</html>
