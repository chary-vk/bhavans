<?php session_start(); ?>


<?php require("../components/header.php"); ?>

<div class="container">

    <form method="POST" action="login.php">
        <div class="row offset-3 col-sm-3">
            <h1 class="text-center">Login</h1>
            <span class="text-danger"><?php if (isset($_SESSION['error'])) {
                                            echo  $_SESSION['error'];
                                        } ?></span>
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" name="email" class="form-control">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control">
            </div>
            <div class="form-group">
                <input type="submit" name="submit" class="btn btn-success" value="submit" />
            </div>
        </div>
    </form>
</div>


<?php

require '../functions/login.php';


if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $login = login($email, $password);

    if ($login) {
        header("Location: home.php");
    } else {
        $_SESSION["error"] = "invalid email or password";
    }
}

?>









<?php require("../components/footer.php"); ?>