<?php
require 'db_conn.php';
?>

<div class="todo-add-section">
  <form action="add-todo.php" method="POST" autocomplete="off">
  <?php if(isset($_GET['mess']) && $_GET['mess'] == 'error') { ?>  
    <input id="todo-input-text"
                type="text" 
                name="title" 
                class="error"
                placeholder="Feltet må ikke være tomt!" />
    <button type="submit"><i class="fa fa-solid fa-plus font-size"></i></button>
  <?php } else { ?>
    <input id="todo-input-text"
                type="text" 
                name="title" 
                placeholder="Tilføj punkt til liste" />
    <button type="submit"><i class="fa fa-solid fa-plus font-size"></i></button>
  <?php } ?>
  </form>
</div>




<div class="todos-section">
  <?php foreach($result as $todo) { ?>
    <div class="todo-item b-radius" id="<?php echo $todo['id']; ?>">
      <div class="wrapper">
        <?php if ($todo['checked']) { ?>
          <label class="todo-checkbox-container">
            <input type="checkbox" checked />
            <span class="todo-checkmark b-radius"></span>
          </label>
          <h2 class="todo-title checked"><?php echo $todo['title']; ?></h2>
        <?php } else { ?>
          <label class="todo-checkbox-container">
            <input type="checkbox">
            <span class="todo-checkmark b-radius"></span>
          </label>
          <h2 class="todo-title"><?php echo $todo['title']; ?></h2>
        <?php } ?>
        <small class="todo-date"><?php echo $todo['date_time']; ?></small>
        <div class="dropdown-arrow">
          <i class="fa fa-solid fa-chevron-down font-size"></i>
        </div>
      </div>
    </div>
  <?php } ?>
</div>






