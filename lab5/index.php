<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
//connecting to the database connection file and the fuctions file
            require './functions/dbConn.php';
            require './functions/functions.php';
            
            $results = '';
            
            if (isPostRequest()) {
            $db = getDatabase();
                
            $stmt = $db->prepare("INSERT INTO sitelinks SET link = :link");
            $link = filter_input(INPUT_POST, 'link');
            
            $binds = array(
                    ":link" => $link);
            
            if ($stmt->execute($binds)) {   
                $results = 'Data Added';
        ?>
        <center><b><h3><?php echo $results; ?></h3></b></center><br />
        <?php
        }} ?>
        
        <center>
            <h2>Enter a website</h2>
            <form class="form-group" action="#" method="POST" name="searchCorps">
                <input type="text" name="link" value="" placeholder="http://">
                <input class="btn btn-default" type="submit" value="Enter New" name="submit" />
            </form>
            </br></br>
            <button class="btn btn-default" onclick="window.location.href='view.php'">View All</button>
            
        </center>
    </body>
</html>
