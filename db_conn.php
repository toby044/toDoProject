<?php

$server = 'localhost';
$database = 'test';
$username = 'root';
$password = '';

$conn = new mysqli($server, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
