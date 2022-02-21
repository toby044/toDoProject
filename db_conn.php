<?php

$server = 'localhost';
$database = 'test';
$username = 'root';
$password = '';

$conn = new mysqli($server, $username, $password, $database);

$sql = "SELECT * FROM todos ORDER BY id DESC";

$result = $conn->query($sql);

?>
