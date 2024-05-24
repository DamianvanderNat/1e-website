<?php
session_start();
$superuser = 0;
if (isset($_SESSION['superuser'])) {
    $superuser = $_SESSION['superuser'];
}

$connectie = mysqli_connect("localhost", "root", "", "creamybliss");
if (isset($_POST['value'])) {
    $sql = "DELETE FROM winkelmand WHERE item_id='" . $_POST['value'] . "'";
    $result = mysqli_query($connectie, $sql);
}
if (isset($_POST["id"])) {
    if ($_POST['size_value'] != NULL) {
        $username = $_SESSION['username'];
        $amount = intval($_POST['amount']);
        $sql_check = "SELECT amount, item_id FROM winkelmand WHERE id = '" . $_POST['id'] . "' AND size = '" . $_POST['size_value'] . "' AND username = '" . $username . "' ";
        $check_result = mysqli_query($connectie, $sql_check);
        $data = mysqli_fetch_all($check_result);
        if (!count($data) <= 0) {
            $amount = intval($data[0][0]) + $amount;
            $sql = "UPDATE winkelmand SET amount = '" . $amount . "' WHERE item_id = '" . $data[0][1] . "'";
        } else {
            $sql = "INSERT INTO winkelmand (username, id, size, amount) VALUES ('" . $username . "', '" . $_POST['id'] . "' , '" . $_POST['size_value'] . "', '" . $amount . "')";
        }
        $result = mysqli_query($connectie, $sql);
        echo $result;
    }

}
// function adminchecker()
// {
//     $username = $_SESSION['username'];
//     $superuser = $_POST['superuser'];
//     $connectie = mysqli_connect("localhost","root","","creamybliss");
//     $sql = "SELECT username, superuser FROM users WHERE superuser='" . 1 .  "'";
//     $result = mysqli_query($connectie, $sql);
//     $data = mysqli_fetch_all($result);
// }
// adminchecker();
function functioncaller()
{
    $functfiles = array();
    foreach (glob("core/functions/*.php") as $functfile) {
        include_once($functfile);
    }
}
functioncaller();
$css = cssLinks("css");
if (isset($_GET['content'])) {
    include('content/' . $_GET['content'] . '.php');
    $function = $_GET['content'];
} else {
    include('content/home.php');
    $function = 'home';
}
$render = $function();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php echo $css; ?>
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <title>Creamy bliss</title>
</head>

<body>
    <div class="menu">
        <a href="?content=home"><img class='logoproduct' src='content/gallery/cream.png' width="45"></a>
        <a href="?content=products">Products</a>
        <?php
        $renderMenu = "";
        if (isset($_SESSION['token'])) {
            $renderMenu = "<a href=\"?content=winkelmand\">Winkelmand</a>
                                   <a href=\"?content=login\">Logout</a>";
            if ($superuser == 1) {
                $renderMenu .= "<a href=\"?content=admin\">Adminpanel</a>";
            }
        } else {
            $renderMenu .= "<a href=\"?content=login\">Login</a>";
        }
        echo $renderMenu;
        ?>
    </div>
    <div class="main-content">
        <?php
        echo $render;
        ?>
    </div>
    <script src="javascript/app.js"></script>

</body>

</html>