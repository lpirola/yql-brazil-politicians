<?php
function cleanUp($txt) {
  global $mysqli;
  return $mysqli->real_escape_string(trim($txt));
}
?>