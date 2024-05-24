<?php
function bootstrap($path)
{
    $phpfiles = array();
    foreach (glob($path . "core/*.php") as $phpfile) {
        array_push($phpfiles, basename($phpfile));
    }
}
?>