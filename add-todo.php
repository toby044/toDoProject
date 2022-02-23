<?php

if(isset($_POST['submit'])){
  require 'db_conn.php';

  $title = htmlspecialchars($_POST['title']);
  $descript = htmlspecialchars($_POST['descript']);

  if(empty($title)){
    header('Location: index.php?mess=error');
  } else {
    $user_id = $_COOKIE['userid'];
    $sql = "INSERT INTO todos(title, descript, user_id) VALUES ('$title', '$descript', $user_id)";

    mysqli_query($conn, $sql);

    if($sql){
      header('Location: index.php?mess=succes');
    } else {
      header('Location: index.php');
    }
    $conn = null;
    exit();
  }
} else {
  header('Location: index.php?mess=error');
}
