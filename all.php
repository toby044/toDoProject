<?php

require './db_conn.php';

$sql = "SELECT * FROM todos ORDER BY id DESC";

$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel='stylesheet' type='text/css' href='./css/style.css' />
      <script src="https://kit.fontawesome.com/6f6a2b9d07.js" crossorigin="anonymous"></script>
      <title>Todo</title>
  </head>
  <body>
    <?php include "./modules/header.php"; ?>
    <main>
      <div class="main-container b-radius">
        <div class="todos-section">
          <?php foreach($result as $todo) { ?>
            <div class="todo-item b-radius" id="<?php echo $todo['id']; ?>">
              <div class="wrapper">
              <?php if ($todo['checked']) { ?>
                <div class="wrapper-inner">
                  <label class="todo-checkbox-container">
                    <input type="checkbox" name="check" checked>
                    <span class="todo-checkmark b-radius"></span>
                  </label>
                  <h2 class="todo-title checked"><?php echo $todo['title']; ?></h2>
                  <small class="todo-date"><?php echo $todo['date_time']; ?></small>
                  <div class="dropdown-arrow">
                    <i class="fa fa-solid fa-chevron-down font-size"></i>
                  </div>
                </div>
                <div class="wrapper-inner-2">
                  <p class="todo-descript checked"><?php echo $todo['descript']; ?></p>
                  <div class="todo-archive">
                    <i class="fa fa-solid fa-box-archive"></i>
                  </div>
                </div>
              </div>
              <?php } else { ?>
                <div class="wrapper-inner">
                  <label class="todo-checkbox-container">
                    <input type="checkbox" name="check">
                    <span class="todo-checkmark b-radius"></span>
                  </label>
                  <h2 class="todo-title"><?php echo $todo['title']; ?></h2>
                  <small class="todo-date"><?php echo $todo['date_time']; ?></small>
                  <div class="dropdown-arrow">
                    <i class="fa fa-solid fa-chevron-down font-size"></i>
                  </div>
                </div>
                <div class="wrapper-inner-2">
                  <p class="todo-descript"><?php echo $todo['descript']; ?></p>
                  <div class="todo-archive">
                    <i class="fa fa-solid fa-box-archive"></i>
                  </div>
                </div>
              </div>
              <?php } ?>
            </div>
          <?php } ?>
        </div>
      </div>
    </main>
  </body>
</html>

