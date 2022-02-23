<?php
require 'db_conn.php';
$userid = $_COOKIE['userid'];
$sql = "SELECT * FROM todos WHERE user_id = '$userid'";



$result = $conn->query($sql);

foreach ($result as $check) {
  if (isset($_POST['check'])) {
    $check = 1;
    $id = $_POST['id'];
    $sql = "UPDATE todos SET checked=$check WHERE id = '$id'";
    mysqli_query($conn, $sql);
    header('Location: index.php');
  }
}

?>

<div class="user-greeting">
  <h1 class="greeting">Hvad skal vi lave i dag <?php echo $_COOKIE['uname']; ?>?</h1>
</div>


<div class="todo-add-section">
  <form action="add-todo.php" method="POST" autocomplete="off">
  <?php if(isset($_GET['mess']) && $_GET['mess'] == 'error') { ?>  
    <input type="hidden"
           name="user_id">
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
              <form action="index.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $todo['id'];?>">
                <input type="submit" name="check">
              </form>
              <span class="todo-checkmark b-radius"></span>
            </label>
            <h2 class="todo-title"><?php echo $todo['title']; ?></h2>
            <small class= "todo-date">
              <?php 
                $timestamp = $todo['date_time'];
                $expireDate = strtotime('+7days', strtotime($timestamp));
                echo 'Oprettet: ' . date('d-m-Y H:i:s', strtotime($timestamp)) . '<br/>' . 'Deadline: ' . date('d-m-Y H:i:s', $expireDate); 
              ?>
            </small>
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
      </div>
    <?php } ?>
  <?php } ?>
</div>

