<?php
require 'db_conn.php';
$sql = "SELECT * FROM todos ORDER BY id DESC";

$result = $conn->query($sql);

?>

<div class="todo-add-section">
  <form action="add-todo.php" method="POST" autocomplete="off">
  <?php if(isset($_GET['mess']) && $_GET['mess'] == 'error') { ?>  
    <input id="todo-input-text"
                type="text" 
                name="title" 
                class="error"
                placeholder="Feltet må ikke være tomt" />
    <input id="todo-input-description"
                type="text" 
                name="descript" 
                placeholder="Beskrivelsen må ikke være tom" />
    <button type="submit" name="submit"><i class="fa fa-solid fa-plus font-size"></i></button>
  <?php } else { ?>
    <input id="todo-input-text"
                type="text" 
                name="title" 
                placeholder="Tilføj titel" />
    <input id="todo-input-description"
                type="text" 
                name="descript" 
                placeholder="Tilføj beskrivelse" />
    <button type="submit" name="submit"><i class="fa fa-solid fa-plus font-size"></i></button>
  <?php } ?>
  </form>
</div>




<div class="todos-section">
  <?php foreach($result as $todo) { ?>
    <?php if (!$todo['checked']) { ?>
      <div class="todo-item b-radius" id="<?php echo $todo['id']; ?>">
        <div class="wrapper">
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
        <?php } ?>
      </div>
    </div>
  <?php } ?>
</div>





