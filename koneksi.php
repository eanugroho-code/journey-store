<?php
$mysqli = new mysqli("localhost", "root", "", "journeyo_store");

// Check connection
if ($mysqli->connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli->connect_error;
  exit();
}
