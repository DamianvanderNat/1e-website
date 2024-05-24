<?php
function logo()
{
    return "<h1 class='logo'> logo</h1>";
}
$pngarrayfiles = pngcaller("content/gallery");
foreach ($pngarrayfiles as $key => $pngfile) {
    echo "<img class='logoproduct' src='content/gallery/" . $pngfile . "'/>";
}

?>