<?php 
$host = 'localhost';
$dbuser = 'root';
$dbpass = '';
$db = 'to_do_list';

$conn = new mysqli($host, $dbuser, $dbpass, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

