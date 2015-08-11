<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/bootstrap.css">
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
            $isDeleted = true;?>
    <center><b><h1> Record <?php echo $id; ?> Deleted</h1></b>
            <?php
        }  
        ?>
        
        
        <?php if ( !$isDeleted ): ?> 
        <h1> Record <?php echo $id; ?> Not Deleted</h1>
        <?php endif; ?>
        
        <button class="btn btn-default" onclick="window.location.href='view.php'">Back</button></center>
    </body>
</html>
