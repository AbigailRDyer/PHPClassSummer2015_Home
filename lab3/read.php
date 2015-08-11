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
        
        $db = getDatabase(); 
         
        $id = filter_input(INPUT_GET, 'id');
        
        $stmt = $db->prepare("SELECT * FROM corps WHERE id = :id");
        $binds = array(
                ":id" => $id
            );
        
        $results = array();           
        if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
        $results = $stmt->fetch(PDO::FETCH_ASSOC);
            }
            
         ?>
        
<!--table to display the database data-->

<table cellspacing="15">
            <thead>
                <tr>
                    <th>Company</th>
                    <th>Incorp Date</th>
                    <th>Email</th>
                    <th>Zip Code</th>
                    <th>Owner</th>
                    <th>Phone</th>
                </tr>
            </thead>
        
            <tr>
                <td><?php echo $results['corp']; ?></td>
                <td><?php echo $results['incorp_dt']; ?></td>
                <td><?php echo $results['email']; ?></td>
                <td><?php echo $results['zipcode']; ?></td>
                <td><?php echo $results['owner']; ?></td>             
                <td><?php echo $results['phone']; ?></td>             
            </tr>
       
        </table>
        <br/>
        <br/>
<!--button to return to data entry-->
        <button onclick="window.location.href='view.php'">Back</button>
    </body>
</html>
