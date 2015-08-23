
<?php

function getALLTestData($columnsOrder, $orderBy){
    $db = getDatabase();
    
           $search = $columnsOrder + " " + $orderBy;
           $stmt = $db->prepare("SELECT * FROM corps ORDER BY :columnsOrder;");
           $binds = array(
               ":columnsOrder" => $search
           );
            $results = array();
            if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
                $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            return $results;
}

function searchSpec($corpName, $columnsSearch){
    $db = getDatabase();
           
           $value = $corpName;
           $stmt = $db->prepare("SELECT * FROM corps WHERE :columnsSearch LIKE '%':value'%'");
           
           $binds = array(
                ":columnsSearch" => $columnsSearch,
                ":value" => strtoupper($value)
            );
            $results = array();
            if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
                $results = $stmt->fetchALL(PDO::FETCH_ASSOC);
            }
            return $results;
}
