<?php 
$host = 'localhost';
$dbuser = 'root';
$dbpass = '';
$db = 'test';

$conn = new mysqli($host, $dbuser, $dbpass, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

