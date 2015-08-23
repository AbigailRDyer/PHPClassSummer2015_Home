<?php
    $stmt4 = $db->prepare("SELECT * FROM sites JOIN sitelinks ON sites.site_id = sitelinks.site_id");
    $joinResults = array();
    if ($stmt4->execute() && $stmt->rowCount() > 0) {
        $joinResults = $stmt4->fetchAll(PDO::FETCH_ASSOC);
    }
