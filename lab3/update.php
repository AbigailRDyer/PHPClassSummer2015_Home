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
                   ?>
        <h1><b><center><?php echo $results; ?></b></h1></center><br />
        <?php
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
        
        
        <center>
            <h3>Update Listing</h3><br />
        <form class="form-group" method="post" action="#">            
            Corporation: <input type="text" value="<?php echo $corp; ?>" name="corp" />
            <br /><br />
            Email: <input type="text" value="<?php echo $email; ?>" name="email" />
            <br /><br />
            Zip Code: <input type="text" value="<?php echo $zipcode; ?>" name="zipcode" />
            <br /><br />  
            Owner: <input type="text" value="<?php echo $owner; ?>" name="owner" />
            <br /><br />  
            Phone: <input type="text" value="<?php echo $phone; ?>" name="phone" />
            <br /><br />  
            <input type="hidden" value="<?php echo $id; ?>" name="id" /> 
            <br /><br />
            <input class="btn btn-default" type="submit" value="Update" />
        </form>
    
        <button class="btn btn-default" onclick="window.location.href='view.php'">Back</button>
    </center>
    </body>
</html>
