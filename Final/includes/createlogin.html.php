<?php
include "functions/loginFunction.php";
include "functions/until.php";

if (isPostRequest()) {
    $email = filter_input(INPUT_POST, 'email');
    $password = filter_input(INPUT_POST, 'password');
    
    createUser($email, $password);
    
    if (createUser() == true) {
            ?>
        <h3>User Created</h3><br/>
        <button class="btn btn-default" onClick="location.href='index.php'">Sign In</button>
        <?php
        }
    else {
        echo "Oops, something went wrong";
    }
}

?>

<form method="post" action="#">    
    Email : <input name="email" type="text" value="" />
    <br />
    Password : <input name="password" type="password" value="" />
    <br />
    <input type="submit" value="Create Account" />
</form>
