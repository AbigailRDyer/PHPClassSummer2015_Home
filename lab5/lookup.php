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
            
            $db = getDatabase();
            
                $stmt = $db->prepare("SELECT * FROM sites ORDER BY site DESC");
                $sites = array();
                if ($stmt->execute() && $stmt->rowCount() > 0) {
                    $sites = $stmt->fetchAll(PDO::FETCH_ASSOC);
                }
                    $site_id = filter_input(INPUT_POST, 'site_id');
                ?>
        
        <center>
            <h2>Select a Site</h2>
            <form class="form-group" action="#" method="post">
                <select name="site">
                <?php foreach ($sites as $row): ?>
                    <option value="<?php echo $row['site_id']; ?>"
                        <?php if( intval($site_id) === $row['site_id']) : ?>
                        selected="selected"
                    <?php endif; ?> >
                    <?php echo $row['site']; ?>
                    
                <?php endforeach; ?>
                </select>
                <input class="btn btn-default" type="submit" value="Submit" name="submit" />
            </form>
        
                <?php
                if ( isPostRequest() ) {
                    
                    $stmt2 = $db->prepare("SELECT * FROM sites JOIN sitelinks WHERE sites.site_id = sitelinks.site_id AND site_id = :site_id");
                    $binds = array(
                        ":site_id" => $site_id
                    );
                    if ($stmt2->execute($binds)) {
                        $results = $stmt2->fetchAll(PDO::FETCH_ASSOC);
                        var_dump($results);
                }
                    
                }
        ?>
        
            
            <?php if( isset($results) ): ?>
 
            <h4>Results found <?php echo count($results); ?></h4>
            <table style="table">
                <?php foreach ($results as $row): ?>
                    <tr>
                        <td><?php echo $row['link']; ?></td> 
                    </tr>
                <?php endforeach; ?>
            </table>

        <?php endif; ?>
        </center>
    </body>
</html>
