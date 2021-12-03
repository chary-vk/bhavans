<?php require("./components/header.php") ?>
<div class="container">
    <?php
    if (isset($_POST["submit"])) {

        require "./functions/register.php";

        $email = $_POST["email"];
        $password = $_POST["password"];
        $Confirmpassword = $_POST["Confirmpassword"];

        if ($password == $Confirmpassword) {

            $result = isUserExist($email);
            if ($result == true) {
                echo "User already exist";
            } else {
                $result = registration($email, $password, "student");
                if ($result) {
                    echo "Registration Successful";
                } else {
                    echo "Registration Failed";
                }
            }
        } else {
            echo "Password and Confirm Password does not match";
        }
    }

    ?>


    <div class="row offset-3 col-sm-3">
        <h1>Registration</h1>
        <form action="./index.php" method="POST">
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" name="email" class="form-control">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control">
            </div>
            <div class="form-group">
                <label for="password">Confirm password</label>
                <input type="password" name="Confirmpassword" class="form-control">
            </div>
            <div class="form-group">
                <input type="submit" name="submit" class="btn btn-success" value="submit" />
            </div>
        </form>
        <p>
            Already have an account? <a href="./pages/login.php">Login</a>
        </p>
    </div>

</div>

<?php require("./components/footer.php") ?>