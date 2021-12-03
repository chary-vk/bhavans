

<?php

function login($username, $password)
{


    require 'db.php';

    $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";

    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $_SESSION['username'] = $username;
        $_SESSION['userid'] = mysqli_fetch_assoc($result)['id'];
        return true;
    } else {

        return false;
    }
}
