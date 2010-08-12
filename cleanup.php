<?php
function cleanUp($txt) {
  global $mysqli;
  return $mysqli->real_escape_string(trim(mb_convert_encoding($txt,"UTF-8","auto")));
}
?>