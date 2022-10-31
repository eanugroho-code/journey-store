<?php
$mysqli = new mysqli("localhost:3306", "cpses_joawe1658r@localhost", "", "journeyo_store");

// Check connection
if ($mysqli->connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli->connect_error;
  exit();
}
