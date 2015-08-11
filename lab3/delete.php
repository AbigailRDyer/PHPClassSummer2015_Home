<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        
            include './dbConn.php';
            include './functions.php';
            
            $db = getDatabase();
            
            $id = filter_input(INPUT_GET, 'id'); 
            $stmt = $db->prepare("DELETE FROM corps where id = :id");
            
            $binds = array(
                ":id" => $id
            );
       
        $isDeleted = false;
        if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
            $isDeleted = true;
        }  
        ?>
        
        
        <?php if ( !$isDeleted ): ?> 
        <h1> Record <?php echo $id; ?> Not Deleted</h1>
        <?php endif; ?>
        
        <p> <a href="view.php">Back</a></p>
    </body>
</html>
