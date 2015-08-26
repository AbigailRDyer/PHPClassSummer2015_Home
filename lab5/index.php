<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <link rel="stylesheet" href="./css/bootstrap.css">
        <center>
            <br />
            
        <?php
//header with home and view all buttons        
        include './header.php';
        require './functions/dbConn.php';
        require './functions/functions.php';
   
        $results = '';
        $isValid = true;
        $textbox = '';
        ?>

    
        <h2>Enter a Site</h2>
        <form class="form-group" action="index.php" method="post">
            <input type="text" name="site" value="<?php echo $textbox ?>" placeholder="http://">
            <input class="btn btn-default" type="submit" value="Enter New" name="submit" />
        </form>


        <?php
//if submit is clicked pull site and validate for URL
        if (isPostRequest()) {
            $site1 = filter_input(INPUT_POST, 'site');
            if (filter_var($site1, FILTER_VALIDATE_URL) === false) {
                $isValid = false;
                $textbox = filter_input(INPUT_POST, 'site')
                ?>
                <b><h3><?php echo "Must enter a valid website"; ?></h3></b>

                <?php
            }
            if ($isValid == true) {
                $db = getDatabase();
                $site = filter_input(INPUT_POST, 'site');
//curl
                require 'curl.php';
//regex
                require 'regex.php';
                var_dump($links);
                $stmt = $db->prepare("INSERT INTO sites SET site = :site, date = NOW()");
                $binds = array(
                    ":site" => $site);
                if ($stmt->execute($binds)) {
                    $site_id = $db->lastInsertId();
                    $stmt2 = $db->prepare("INSERT INTO sitelinks SET link = :link, site_id = :site_id");
                    foreach ($links as $link) {
                        $binds = array(
                            ":site_id" => $site_id,
                            ":link" => $link);
                        $stmt2->execute($binds);
                    }
                }
                ?>
                <h2>Results Entered: <?php echo count($links); ?></h2>
                <table class="table">
                    <?php foreach ($links as $row): ?>
                        <tr>
                            <td><?php echo $row; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </table>

                <?php
            }
        }
        ?>


        <br />
        
        <br />
    </center>

</body>
</html>
