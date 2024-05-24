<?php

function products()
{


    $out = "";
    $out .= "<h1 class='products'> Products</h1>";
    $jpgarrayfiles = jpgcaller("content/gallery");
    foreach ($jpgarrayfiles as $key => $jpgfile) {
        // 1. connectie maken
        $connectie = mysqli_connect("localhost", "root", "", "creamybliss");
        // 2. vraag stellen
        // query sturen
        $sql = "SELECT id, name, description, image, small, medium, large FROM products";
        $result = mysqli_query($connectie, $sql);
        // 3. ophalen data
        // fetch row/record
        while ($row = mysqli_fetch_assoc($result)) {
            $out .= "
            <div class='product-container'>
                <img src='content/gallery/$row[image]'/>
                <div class='product-description'>
                    <div class='size-block'>
                        <p class='product-title'>Sizes</p>
                        <input onclick='change_size(this)' class='radio' type='radio' name='" . basename($row['image']) . "' id='" . basename($row['image']) . "S' value='S'> <label class='size-label' for='" . basename($row['image']) . "S'>S</label>
                        <input onclick='change_size(this)' class='radio' type='radio' name='" . basename($row['image']) . "' id='" . basename($row['image']) . "M' value='M'> <label class='size-label' for='" . basename($row['image']) . "M'>M</label>
                        <input onclick='change_size(this)' class='radio' type='radio' name='" . basename($row['image']) . "' id='" . basename($row['image']) . "L' value='L'> <label class='size-label' for='" . basename($row['image']) . "L'>L</label>
                    </div>
                    <div class='product-text'>
                        <p class='product-title'>$row[name]</p>
                        <p>$row[description]</p>
                    </div>
                    <div class='amountprice'>
                        <div class='amount'>
                            <input id='number' name='" . basename($row['image']) . "' type='number' value='1'  oninput='this.value=Math.max(1, Math.abs(this.value))' onchange='change_amount(this)'>
                        </div>
                        <div class='priceprod'>
                            <p id='price_s'>€$row[small]</p>
                            <p id='price_m'>€$row[medium]</p>
                            <p id='price_l'>€$row[large]</p>
                        </div>
                    </div>
                    <div class='sendtobasket'>
                        <form method='POST' target='frame'>
                            <input type='hidden' name='size_value' id='size'>
                            <input type='hidden' value='1' name='amount' id='amount'>
                            <input type='hidden' name='id' value='$row[id]'>
                            <button type='submit'>add</button>
                        </form>
                    </div>
                </div>
            </div>";

        }

        mysqli_close($connectie);
        $out .= '<iframe name="frame"></iframe>';
        return $out;
    }
}
?>