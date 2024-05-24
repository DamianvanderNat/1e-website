<?php

function cssLinks($path)
{
    $html = "";
    $base = '<link rel="stylesheet" href="';
    $base2 = '">';
    $files = glob("./" . $path . "/*");
    foreach ($files as $file) {
        $html .= $base . $file . $base2;
    }
    return $html;
}

?>