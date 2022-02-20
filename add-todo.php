<?php

if(isset($_POST['submit'])){
  require 'db_conn.php';

  $title = $_POST['title'];
  $descript = $_POST['descript'];

  if(empty($title)){
    header('Location: index.php?mess=error');
  } else {
    $title = $_POST['title'];

    $sql = "INSERT INTO todos(title,descript) VALUES ('$title','$descript')";

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
