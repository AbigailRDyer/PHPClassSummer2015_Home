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
        $site_id = '';
        ?>

    <center>
        <h2>Select a Site</h2>
        <form class="form-group" action="lookup.php" method="post">
            <select name="site_id">
                <?php foreach ($sites as $row): ?>
                    <option value="<?php echo $row['site_id']; ?>"
                    <?php if (intval($site_id) === $row['site_id']) : ?>
                                selected="selected"
                            <?php endif; ?> >
                                <?php echo $row['site']; ?>
                    </option>
                    <?php endforeach; ?>
            </select>
            <input class="btn btn-default" type="submit" value="Submit" name="submit" />
        </form>

        <?php
        if (isPostRequest()) {
            
            $db = getDatabase();
            $site_id = filter_input(INPUT_POST, 'site_id');
            $stmt2 = $db->prepare("SELECT * FROM sitelinks WHERE site_id = :site_id");
                $binds = array(
                    ":site_id" => $site_id);
            if ($stmt2->execute($binds)) {
                $results = $stmt2->fetchAll(PDO::FETCH_ASSOC);
           
            
            $stmt3 = $db->prepare("SELECT * FROM sites WHERE site_id = :site_id");
                $binds2 = array(
                    ":site_id" => $site_id);
                $results2 = array();
                if ($stmt3->execute($binds2)) {
                    $results2 = $stmt3->fetchAll(PDO::FETCH_ASSOC);
            }
             }
            echo $results2['site']." added on ".$results2['date'];
            ?>

            <h4>Results Found: <?php echo count($results); ?></h4>
            <table class="table">
                <?php foreach ($results as $row): ?>
                    <tr>
                        <td><?php echo $row['link'] ?></td>
                        <td><a href="<?php echo $row['link']; ?>" target="popup">Visit Page</a></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php } ?>
    </center>
</body>
</html>
