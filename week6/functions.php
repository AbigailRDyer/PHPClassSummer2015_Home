<?php

function isLoggedin() {
    if (isset($_SESSION['loggedin']) &&
            $_SESSION['loggedin'] === false) {
        die('Access not allowed');
    }
}

