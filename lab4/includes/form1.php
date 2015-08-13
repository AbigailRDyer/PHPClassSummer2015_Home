<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/bootstrap.css">
        <title></title>
    </head>
    <body>

<center>   
<form class="form-group" action="#" method="GET" name="selectOrder">
    <label>Order by:</label>            
    <select name="columnsOrder">
        <option>ID</option>
        <option>Corporation</option>
        <option>Incorporation Date</option>
        <option>Email</option>
        <option>Zip Code</option>
        <option>Owner</option>
        <option>Phone</option>
    </select>
        <br /><br />
    
        Ascending:
    <input class="radio-inline" type="radio" name="orderBy" value="ascending"/><br />
        Descending:
    <input class="radio-inline" type="radio" name="orderBy" value="descending"/>
    
    <br /><br />
    <input class="btn btn-default" type="hidden" value="sort" name="action" />
    <input class="btn btn-default" type="submit" value="View All" name="action" />
    <input class="btn btn-default" type="reset" value="Reset" name="reset" />
    
</form>
</center>
</body>
</html>
