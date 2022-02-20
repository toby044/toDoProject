<?php

$server = 'localhost';
$database = 'to_do_list';
$username = 'root';
$password = '';

$conn = new mysqli($server, $username, $password, $database);

$sql = "SELECT * FROM todos ORDER BY id DESC";

$result = $conn->query($sql);

?>
