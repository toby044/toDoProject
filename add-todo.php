<?php

if(isset($_POST['title'])){
  require 'db_conn.php';

  $title = $_POST['title'];

  if(empty($title)){
    header('Location: index.php?mess=error');
  } else {
    $stmt = $connection->prepare("INSERT INTO todos(title) VALUE(?)");
    $res = $stmt->execute([$title]);

    if($res){
      header('Location: index.php?mess=succes');
    } else {
      header('Location: index.php');
    }
    $connection = null;
    exit();
  }
} else {
  header('Location: index.php?mess=error');
}
