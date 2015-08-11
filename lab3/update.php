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
            
            
            
            $results = '';
            $db = getDatabase();
            
            if (isPostRequest()) {
                
                
                $stmt = $db->prepare("UPDATE corps set corp = :corp, incorp_dt = :incorp_dt, email = :email, zipcode = :zipcode, owner = :owner, phone = :phone where id = :id");
                $id = filter_input(INPUT_POST, 'id');
                $corp = filter_input(INPUT_POST, 'corp');
                $incorp_dt = filter_input(INPUT_POST, 'incorp_dt');
                $email = filter_input(INPUT_POST, 'email');
                $zipcode = filter_input(INPUT_POST, 'zipcode');
                $owner = filter_input(INPUT_POST, 'owner');
                $phone = filter_input(INPUT_POST, 'phone');
                
                
                $binds = array(
                    ":id" => $id,
                    ":corp" => $corp,
                    ":incorp_dt" => $incorp_dt,
                    ":email" => $email,
                    ":zipcode" => $zipcode,
                    ":owner" => $owner,
                    ":phone" => $phone );
                
                if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
                   $results = 'Record updated';
                   echo $results;
                }}
             else {
                $id = filter_input(INPUT_GET, 'id');
                $stmt = $db->prepare("SELECT * FROM corps where id = :id");
                $binds = array(
                    ":id" => $id
                );
                if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
                   $results = $stmt->fetch(PDO::FETCH_ASSOC);
                }
                if ( !isset($id) ) {
                    die('Record not found');
                }
                $corp = $results['corp'];
                $incorp_dt = $results['incorp_dt'];
                $email = $results['email'];
                $zipcode = $results['zipcode'];
                $owner = $results['owner'];
                $phone = $results['phone'];
            }
        
        ?>
        
        
        
        <form method="post" action="#">            
            Corp <input type="text" value="<?php echo $corp; ?>" name="corp" />
            <br />
            Email <input type="text" value="<?php echo $email; ?>" name="email" />
            <br />  
            Zip Code <input type="text" value="<?php echo $zipcode; ?>" name="zipcode" />
            <br />  
            Owner <input type="text" value="<?php echo $owner; ?>" name="owner" />
            <br />  
            Phone <input type="text" value="<?php echo $phone; ?>" name="phone" />
            <br />  
            <input type="hidden" value="<?php echo $id; ?>" name="id" /> 
            <input type="submit" value="Update" />
        </form>
        
        <p> <a href="view.php">Back</a></p>
    </body>
</html>
