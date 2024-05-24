<?php

function signup()
{
    $sign_in_error = "";
    $name_error = "";
    $email_error = "";
    $conn = dbconnect('localhost', 'root', '', 'creamybliss');

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["email"]) && isset($_POST["username"]) && isset($_POST["password"])) {
            $username = $_POST["username"];
            $email = $_POST["email"];
            $password = $_POST["password"];

            $sql_u = "SELECT * FROM users WHERE username='$username'";
            $sql_e = "SELECT * FROM users WHERE email='$email'";
            $res_u = mysqli_query($conn, $sql_u) or die(mysqli_error($conn));
            $res_e = mysqli_query($conn, $sql_e) or die(mysqli_error($conn));

            if (mysqli_num_rows($res_u) > 0) {
                $name_error = "Sorry... Username is already taken";
            } else if (mysqli_num_rows($res_e) > 0) {
                $email_error = "Sorry... Email is already taken";
            } else {
                $sql = "INSERT INTO users (username, email, password)
                    VALUES('$username', '$email', '$password' )";
                header("location:?content=login");
                $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
            }
        } else {
            $sign_in_error = "* Fill in the required fields.";
        }
    }
    "<div class='error'>";
    echo $sign_in_error;
    echo $name_error;
    echo $email_error;
    "</div>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="signup-page-content">
        <div class="container-left">
            <div class="content-left">
                <div>
                    <form method="post">
                        <div class="usernameinput">
                            <input type="text" name="username" placeholder="Username">
                        </div>
                        <div class="passwordinput">
                            <input type="password" name="password" placeholder="Password">
                        </div>
                        <div class="emailinput">
                            <input type="text" name="email" placeholder="Email">
                        </div>

                        <div class="submit" name="register">
                            <input type="submit" value="Sign up">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



</body>

</html>