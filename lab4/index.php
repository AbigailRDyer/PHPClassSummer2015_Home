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
        include './includes/dbconn.php';
        include './includes/functions.php';
        include './includes/dbData.php';
        
        $action = filter_input(INPUT_POST, 'action');
        
        include './includes/form2.php';
        
        if ( $action === 'Search' ) {
       
        $column = filter_input(INPUT_POST, 'columnSearch');
        $search = filter_input(INPUT_POST, 'searchCorps');
        $sresults = searchTest($column, $search);
        }
        
        ?>
        
        <h4>or...</h4>
        <br />
        
        <?php
        include './includes/form1.php';
        
        if ( $action === 'View All' ) {
       
        $columnsOrder = filter_input(INPUT_POST, 'columnsOrder');
        $orderBy = filter_input(INPUT_POST, 'orderBy');
        $oresults = getALLTestData($columnsOrder, $orderBy);
        }
        ?>
    
        <table class="table">
            <thead><tr>
            <th><h3>Results</h3></th>
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
<!-- Navigation 
                <input class="btn btn-default" type="button" value="Add New" onClick="location.href='create.php'"/>
                <input class="btn btn-default" type="submit" name="searchby" value="View All" onClick="location.href='view.php'"/>   
            -->
                <br />
    </center>
    </body>
</html>
