<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/bootstrap.css">
        <title></title>
    </head>
    <body>

<center>   
<form class="form-group" action="index.php" method="GET" name="searchCorps">
    <input type="text" name="corpName" value="Search for...">
        <br /><br />
        <label>in:</label>
    <select name="columnsSearch">
        <option value="id">ID</option>
        <option value="corp">Corporation</option>
        <option value="incorp_dt">Incorporation Date</option>
        <option value="email">Email</option>
        <option value="zipcode">Zip Code</option>
        <option value="owner">Owner</option>
        <option value="phone">Phone</option>
    </select>
    <br /><br />
    <input class="btn btn-default" type="hidden" value="submit2" name="action" />
    <input class="btn btn-default" type="submit" value="Search" onClick="location.href = 'index.php'" />
    <input class="btn btn-default" type="reset" value="Reset" name="reset" />
    <br /><br />
    
</form>
</center>
</body>
</html>