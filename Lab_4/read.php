<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/bootstrap.css">
        <title></title>
    </head>
    <body>
        <?php
//connecting to DB and functions
        include '/includes/dbConn.php';
        include '/includes/functions.php';
        
        $db = getDatabase(); 
         
        $id = filter_input(INPUT_GET, 'id');
 
//pulling and binding ID from selection
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
<table class="table">
            <thead><tr>
            <th><h3>Viewing <?php echo $results['corp']; ?></h3></th>
                </tr>
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
        <br/><br/>
        
    <center>

<!-- navigation -->
        <button class="btn btn-default" onClick="location.href='update.php'">Update</button>
        <button class="btn btn-default" onClick="location.href='delete.php'">Delete</button>
        <button class="btn btn-default" onclick="window.location.href='index.php'">Back</button>
    </center>
    </body>
</html>
