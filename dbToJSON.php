<?php
// Database forbindelse
include 'db_conn.php';

// Vælg brugers todos og opbevar i en variabel
$userid = $_COOKIE['userid'];
$sql = "SELECT * FROM todos WHERE user_id = '$userid'";
$result = mysqli_query($conn, $sql);

// Konverter MySQL til PHP array og loop igennem det
$arr = array();
while($row =mysqli_fetch_assoc($result)){
  $arr[] = $row;
}

// Printer JSON String format
echo json_encode($arr);

// Konvertere til JSON fil format
$fp = fopen('userdata.json', 'w');
fwrite($fp, json_encode($arr));
fclose($fp);

// Luk database forbindelse
mysqli_close($conn);