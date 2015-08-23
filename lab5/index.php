<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
            <link rel="stylesheet" href="./css/bootstrap.css">
        <?php
            require './functions/dbConn.php';
            require './functions/functions.php';
            
            $results = '';
            $isValid = true;
            $textbox = '';
        ?>
        
        <center>
            <h2>Enter a Site</h2>
            <form class="form-group" action="index.php" method="post">
                <input type="text" name="site" value="<?php echo $textbox ?>" placeholder="http://">
                <input class="btn btn-default" type="submit" value="Enter New" name="submit" />
            </form>
        
        
        <?php
            if (isPostRequest()) {
                
                $site1 = filter_input(INPUT_POST, 'site');
                
                if ( filter_var($site1, FILTER_VALIDATE_URL) === false ) {
                    $isValid = false;
                    $textbox = filter_input(INPUT_POST, 'site') ?>
                    <b><h3><?php echo "Must enter a valid website"; ?></h3></b>
                    
                <?php }
                if ($isValid) {
                    $site = filter_input(INPUT_POST, 'site');
                
                
                    $db = getDatabase();
                
                    $stmt = $db->prepare("INSERT INTO sites SET site = :site, date = NOW()");
            
                    $binds = array(
                        ":site" => $site);
            
                    if ($stmt->execute($binds)) { 
//curl
                        require 'curl.php';
//regex
                        require 'regex.php';
                    
                        require 'join.php';
                
                        $site_id = $db->lastInsertId("SELECT * FROM sites");
                    
                        foreach ($removeDuplicates as $link) { 
                        
                            $stmt2 = $db->prepare("INSERT INTO sitelinks SET link = :link, site_id = :site_id");
                                $binds = array( 
                                    ":link" => $link, ":site_id" => $site_id); 
                            } 
                            $results2 = array();
                            if ($stmt2->execute($binds)) {
                                $results2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);
                        }   } 
            
               ?>
                <h2>Results found: <?php echo count($removeDuplicates); ?></h2>
                <table class="table">
                        <?php foreach ($results2 as $row): ?><tr>
                        <td><?php echo $row['site_id']; ?></td>
                        <td><?php echo $row['link']; ?></td>
                        </tr><?php endforeach; ?>
                    </table>
                    
            <?php }}
        ?>
        
        
        <br />
        <button class="btn btn-default" onclick="window.location.href='lookup.php'">View All</button>
        </center>
        
    </body>
</html>
