<?php


function isAdmin($userName)
{
    $sql = "SELECT superuser FROM users WHERE username='$userName' ";
    $conn = mysqli_connect("localhost", "root", "", "creamybliss");
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) == 1) {
        $data = mysqli_fetch_assoc($result);
        $_SESSION['superuser'] = $data['superuser'];
    }
    return $_SESSION['superuser'];
}

function admin()
{
    $superuser = isAdmin($_SESSION['username']);
    $connectie = mysqli_connect("localhost", "root", "", "creamybliss");
    $sql = "SELECT id, username, password, email, superuser FROM users";
    $result1 = mysqli_query($connectie, $sql);
    if (mysqli_num_rows($result1) > 0) {
        $users = '<table border="2" class="tabellen">';
        while ($row = mysqli_fetch_assoc($result1)) {
            $users .= '<tr><td>id: ' . $row["id"] . '</td><td>username: ' . $row["username"] . '</td><td>password: ' . $row["password"] . '</td><td>email: ' . $row["email"] . '</td><td>superuser: ' . $row["superuser"] . '</td></tr>';
        }
        $users .= "</table>";
    } else {
        echo "0 results";
    }

    $sql = "SELECT id, name, small, medium, large, description, image FROM products";
    $result2 = mysqli_query($connectie, $sql);
    if (mysqli_num_rows($result2) > 0) {
        $products = '<table border="2" class="tabellen">';
        while ($row = mysqli_fetch_assoc($result2)) {
            $products .= '<tr><td>id: ' . $row["id"] . '</td><td>name: ' . $row["name"] . '</td><td>small: ' . $row["small"] . '</td><td>medium: ' . $row["medium"] . '</td><td>large: ' . $row["large"] . '</td><td>description: ' . $row["description"] . '</td><td>image: ' . $row["image"] . '</td></tr>';
        }
        $products .= "</table>";
    } else {
        echo "0 results";
    }

    $sql = "SELECT id, username, size, item_id, amount FROM winkelmand";
    $result3 = mysqli_query($connectie, $sql);
    if (mysqli_num_rows($result3) > 0) {
        $winkelmand = '<table border="2" class="tabellen">';
        while ($row = mysqli_fetch_assoc($result3)) {
            $winkelmand .= '<tr><td>id: ' . $row["id"] . '</td><td>username: ' . $row["username"] . '</td><td>size: ' . $row["size"] . '</td><td>item_id: ' . $row["item_id"] . '</td><td>amount: ' . $row["amount"] . '</td></tr>';
        }
        $winkelmand .= "</table>";
    } else {
        echo "0 results";
    }
    if ($superuser == 1) {
        return "<button type=\"button\" class=\"slider\">Open Users</button>
                    <div class=\"content\">
                        $users
                    </div>
                <button type=\"button\" class=\"slider\">Open Products</button>
                    <div class=\"content\">
                        $products
                    </div>
                <button type=\"button\" class=\"slider\">Open Winkelmand</button>
                    <div class=\"content\">
                        $winkelmand
                    </div>";
    }
}
?>