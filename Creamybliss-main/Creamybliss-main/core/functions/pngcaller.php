<?php

function pngcaller($gallery)
{
  $pngfiles = array();
  foreach (glob($gallery . "/*.png") as $pngfile) {
    array_push($pngfiles, basename($pngfile));
  }
  return $pngfiles;
}
?>