<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
//connecting to the database connection file and the fuctions file
            include './dbConn.php';
            include './functions.php';
            
            $results = '';
            
//if data is submitted
            if (isPostRequest()) {
            
            $db = getDatabase();
            
            $stmt = $db->prepare("INSERT INTO corps SET corp = :corp, incorp_dt = NOW(), email = :email, zipcode = :zipcode, owner = :owner, phone = :phone where id = :id");
//linking text box data with database data
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
            
//displays 'data added' if data is added sucessfully
            if ( $stmt->execute($binds) && $stmt->rowCount() > 0 ) {   
                $results = 'Data Added';
            }
            }
            
        ?>
        <h3>
            <?php echo $results; ?>
        </h3>
        
<!--data entry form-->
        <form method="post" action="#">
            
                Corporation: <input type="text" value="" name="corp" />
                <br />
                Email: <input type="text" value="" name="email" />
                <br />    
                Zip code: <input type="text" value="" name="zipcode" />
                <br />
                Owner: <input type="text" value="" name="owner" />
                <br />  
                Phone #: <input type="text" value="" name="phone" />
            <br/>
            <br/>
<!--submit data button-->
            <input type="submit" value="Submit" /></form>
            <br/>
<!--link to all data in database table-->
            <button onclick="window.location.href='view.php'">Back</button>
    </body>
</html>