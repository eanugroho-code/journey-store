<?php
$mysqli = new mysqli("localhost", "journeyo_store", "40196Ean!", "journeyo_store");

// Check connection
if ($mysqli->connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli->connect_error;
  exit();
}
