<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/bootstrap.css">
        <title></title>
    </head>
    <body>
    
    <center>
        <br />
        <h1>Corporation Database</h1><br /><br />
        
        <?php
//connecting to the database connection file
        include '/includes/dbConn.php';
        include '/includes/functions.php';
        include '/includes/dbData.php';
        
        $action = filter_input(INPUT_POST, 'value');
        
       
        
        include '/includes/form2.php';
        if ( $action === 'submit1' ) {
        $corpName = filter_input(INPUT_GET, 'corpName');
        $columnsSearch = filter_input(INPUT_GET, 'columnsSearch');
        }
        if (filter_input(INPUT_GET, 'columnsSearch')){
            $corpName = filter_input(INPUT_GET, 'corpName');
            $columnsSearch = filter_input(INPUT_GET, 'columnsSearch');
            switch ($columnsSearch){
                case "id": {
                    $data = searchSpec($corpName, $columnsSearch);
                }
                case "corp": {
                    $data = searchSpec($corpName, $columnsSearch);
                }
                case "incorp_dt": {
                    $data = searchSpec($corpName, $columnsSearch);
                }
                case "email": {
                    $data = searchSpec($corpName, $columnsSearch);
                }
                case "owner": {
                    $data = searchSpec($corpName, $columnsSearch);
                }
                case "zipcode": {
                    $data = searchSpec($corpName, $columnsSearch);
                }
                case "phone": {
                    $data = searchSpec($corpName, $columnsSearch);
                }
            }
            ?>
        <table class="table">
            <thead>
                
            </thead>
         <?php foreach ($data as $row): ?>
<!-- table of results -->
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['corp']; ?></td>
                    <td><?php echo $row['incorp_dt']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['owner']; ?></td>
                    <td><?php echo $row['zipcode']; ?></td>
                    <td><?php echo $row['phone']; ?></td>
                    <td><a href="read.php?id=<?php echo $row['id']; ?>">Read</a></td>
                    <td><a href="update.php?id=<?php echo $row['id']; ?>">Update</a></td>            
                    <td><a href="delete.php?id=<?php echo $row['id']; ?>">Delete</a></td>            
                </tr>
            <?php endforeach; ?>
            
        </table><?php
        } 
        ?>
       
        
        <h4>or...</h4>
        <br />
        
        <?php
        include '/includes/form1.php';
        if ( $action === 'submit2' ) {
        $columnsOrder = filter_input(INPUT_GET, 'columnsOrder');
        $orderBy = filter_input(INPUT_GET, 'orderBy');
        }
        
    
        if (filter_input(INPUT_GET, 'columnsOrder')){
            $columnsOrder = filter_input(INPUT_GET, 'columnsOrder');
            $orderBy = filter_input(INPUT_GET, 'orderBy');
            switch ($columnsOrder){
                case "id": {
                    $data = getALLTestData($columnsOrder, $orderBy);
                }
                case "corp": {
                    $data = getALLTestData($columnsOrder, $orderBy);
                }
                case "incorp_dt": {
                    $data = getALLTestData($columnsOrder, $orderBy);
                }
                case "email": {
                    $data = getALLTestData($columnsOrder, $orderBy);
                }
                case "owner": {
                    $data = getALLTestData($columnsOrder, $orderBy);
                }
                case "zipcode": {
                    $data = getALLTestData($columnsOrder, $orderBy);
                }
                case "phone": {
                    $data = getALLTestData($columnsOrder, $orderBy);
                }
            ?>
        <table class="table">
            <thead>
                
            </thead>
         <?php foreach ($data as $row): ?>
<!-- table of results -->
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['corp']; ?></td>
                    <td><?php echo $row['incorp_dt']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['owner']; ?></td>
                    <td><?php echo $row['zipcode']; ?></td>
                    <td><?php echo $row['phone']; ?></td>
                    <td><a href="read.php?id=<?php echo $row['id']; ?>">Read</a></td>
                    <td><a href="update.php?id=<?php echo $row['id']; ?>">Update</a></td>            
                    <td><a href="delete.php?id=<?php echo $row['id']; ?>">Delete</a></td>            
                </tr>
            <?php endforeach; ?>
            
        </table><?php
        } 
        }
        ?>

                <input class="btn btn-default" type="button" value="Add New" onClick="location.href='create.php'"/> 
            
                <br />
    </center>
    </body>
</html>
