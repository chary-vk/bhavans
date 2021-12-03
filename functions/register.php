
<?php

function registration($email, $password, $role = "student")
{
    require('db.php');

    $query = "INSERT INTO users (username, password, role) VALUES ('$email', '$password', '$role')";
    $result = mysqli_query($conn, $query);
    if ($result) {
        return true;
    } else {
        return false;
    }
}

function  isUserExist($email)
{
    require('db.php');

    $query = "Select * from users where username = '$email'";

    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
        return true;
    } else {
        return false;
    }
}


?>