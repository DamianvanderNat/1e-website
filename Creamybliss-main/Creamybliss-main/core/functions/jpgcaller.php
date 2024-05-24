<?php

function jpgcaller($gallery)
{
  $jpgfiles = array();
  foreach (glob($gallery . "/*.jpg") as $jpgfile) {
    array_push($jpgfiles, basename($jpgfile));
  }
  return $jpgfiles;
}

?>