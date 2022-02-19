<?php

$server = 'localhost';
$database = 'to_do_list';
$username = 'root';
$password = '';

$connection = new mysqli($server, $username, $password, $database);

$sql = "SELECT * FROM todos ORDER BY id DESC";

$result = $connection->query($sql);

?>

<!-- <?php foreach($result as $todo) { ?>
  <tr>
    <td><?php echo $todo['id']; ?></td>
    <td><?php echo $todo['title']; ?></td>
    <td><?php echo $todo['date_time']; ?></td>
    <td><?php echo $todo['checked']; ?></td>
    <td><button>X</button></td>
  </tr>
    <?php } ?> -->
