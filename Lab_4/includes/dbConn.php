<?php
        
//connecting to the database phpclasssummer2015
        function getDatabase() {
            $config = array(
            'DB_DNS' => 'mysql:host=localhost;port=3306;dbname=phpclasssummer2015', 
            'DB_USER' => 'php', 
            'DB_PASSWORD' => 'summer15'
            );
            
        try {
            
            $db = new PDO($config['DB_DNS'], $config['DB_USER'], $config['DB_PASSWORD']);
            $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        }   
        
        catch (Exception $ex) {
        //If the connection fails we will close the connection by setting the variable to null
        $db = null;
        echo $ex->getMessage();
        include "./includes/error.php";
        exit();
        }
        return $db;
        }
        
        
        ?>