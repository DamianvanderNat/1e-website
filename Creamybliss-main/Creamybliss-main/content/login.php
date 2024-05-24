<?php

function login()
{
    $data = '';
    $pass = '';
    $user = '';
    $_SESSION = [];

    if (isset($_POST['username']) && isset($_POST['password'])) {
        $user = $_POST['username'];
        $pass = $_POST['password'];
        $sql = "SELECT * FROM users WHERE username='$user' AND password='$pass'";
        $conn = mysqli_connect("localhost", "root", "", "creamybliss");
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) == 1) {
            $data = mysqli_fetch_assoc($result);
            $_SESSION['superuser'] = $data['superuser'];
            $_SESSION['token'] = rand(100000000, 999999999);
            $_SESSION['username'] = $user;
            mysqli_close($conn);
            header('Location: /CreamyBliss/');
            return;
        }



    }
    if (!isset($_SESSION['token'])) {
        return
            '<div class="login-box">
        <form method="post" action="/CreamyBliss/?content=login">
        <label for="username">Username</label>
        <input type="text" name="username">
        <label for="password">Password</label>
        <input type="password" name="password">
        <input type="submit" id="loginbutton" name="login" value="Log in"><br>
        </div>
        </form>
        <form action"/CreamyBliss/">
        <div class="signup">
        Dont have an account yet? 
        <input type="hidden" name="content" value="signup">
        <input type="submit" id="signupbutton" value="Sign up here">
        </form>
        </div>';
    } else {
        $_SESSION['token'] = null;
        header('Location: /CreamyBliss/');
    }

}

?>