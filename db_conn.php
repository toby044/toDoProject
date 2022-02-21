<?php

$server = 'localhost';
$database = 'to_do_list';
$username = 'root';
$password = '';

$conn = new mysqli($server, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
