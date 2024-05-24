<?php



function winkelmand()
{
    $username = $_SESSION['username'];
    $connectie = mysqli_connect("localhost", "root", "", "creamybliss");
    $sql = "SELECT username, id, size, item_id, amount FROM winkelmand WHERE username='" . $username . "'";
    $result = mysqli_query($connectie, $sql);
    $data = mysqli_fetch_all($result);
    if (count($data) <= 0) {
        return "<div class='emptycreamwagon'><img src='content/gallery/shoppingcart.png'><br>Your shopping cart is lacking milkshakes, you can find them in the Products page. </div><br><br><a class='winkelmand-link' href='/creamybliss/?content=products'>Find our creamy shakes here!<a>";

    } else {
        $text = "";
        $text .= "<div class='checkoutheader'><form action='content/checkout.php'><button type='submit' class='payment-form'>Checkout</button></form></div>";
        foreach ($data as &$value) {
            $text .= "<form class='drippingwagon' action='' method='POST'>";
            $sql = "SELECT name, image, small, medium, large FROM products WHERE id='" . $value[1] . "'";
            $result = mysqli_query($connectie, $sql);
            $data2 = mysqli_fetch_all($result);
            $text .= '<img class="cartimg" src="content/gallery/' . $data2[0][1] . '">';
            $text .= "<div class='amountcart'>amount: $value[4]</div><br>";
            $text .= "<div class='winkelmand-product'>" . $data2[0][0] . "</div>" . "<div class='winkelmand-size'>Size: $value[2]</div>";
            if ($value[2] == "S") {
                $sql = "SELECT small From products WHERE id='" . $value[1] . "'";
                $result = mysqli_query($connectie, $sql);
                $data3 = mysqli_fetch_row($result);
                $price = str_replace(',', '.', $data3[0]);
                $text .= "<div class='winkelmand-price'>Price: €" . (floatval($price) * floatval($value[4])) . "</div>";
            } else if ($value[2] == "M") {
                $sql = "SELECT medium From products WHERE id='" . $value[1] . "'";
                $result = mysqli_query($connectie, $sql);
                $data3 = mysqli_fetch_row($result);
                $price = str_replace(',', '.', $data3[0]);
                $text .= "<div class='winkelmand-price'>Price: €" . (floatval($price) * floatval($value[4])) . "</div>";
            } else {
                $sql = "SELECT large From products WHERE id='" . $value[1] . "'";
                $result = mysqli_query($connectie, $sql);
                $data3 = mysqli_fetch_row($result);
                $price = str_replace(',', '.', $data3[0]);
                $text .= "<div class='winkelmand-price'>Price: €" . (floatval($price) * floatval($value[4])) . "</div>";
            }
            $text .= "<div class='winkelmand-delete'><button class='delbutton' type='submit' name='value' value='$value[3]'>remove</button></div>";
            $text .= "</form>";
        }
        return $text;

    }
}

?>