<?php 

include('db_conn.php');

// Query statement
$sql = "SELECT * FROM users WHERE role ='user'";

// Resultat af query
$result = mysqli_query($conn, $sql);

// Fetch resultater
$data = mysqli_fetch_all($result, MYSQLI_ASSOC);
/*
// Frisæt resultat fra hukommelsen
mysqli_free_result($result);

// Luk forbindelse
mysqli_close($conn);
*/
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' type='text/css' href='css/style.css' />
    <script src="https://kit.fontawesome.com/6f6a2b9d07.js" crossorigin="anonymous"></script>
    <title>Todo</title>
</head>

<body>
    <aside>
        <div class="flex-down">
            <h2>To Do</h2>
            <h3>Administrator</h3>
        </div>
        <a href="modules/logout.php" class="logoutBtn">Log ud</a>
    </aside>
    <main>
        <div class="main-container b-radius">
            <h1>Bruger anmodninger</h1>
            <?php 
                $query = "SELECT * FROM users WHERE status = 'pending' ORDER BY id ASC";
                //$result = mysqli_query($conn, $query);
                foreach($data as $databyte){
            ?>
                <div class="flexStart">
                    <p style='width: 50%;'><?php echo htmlspecialchars($databyte['name']);?></p>
                    <form action="admin.php" method="post" class="flexEnd" style="width: 50%;">
                        <input type="hidden" name="id" value="<?php echo $databyte['id'];?>"></input>
                        <input name="notAccepted" class="notAccepted" type="submit"></input>
                        <input name="accepted" class="accepted" type="submit"></input>
                    </form>
                </div>
                <hr>
            <?php } ?>
            <?php
                if(isset($_POST['accepted'])) {
                    $id = $_POST['id'];

                    $select = "UPDATE users SET status = 'approved' WHERE id = '$id'";
                    //$result = mysqli_query($conn, $select);

                    echo "<div class='flexStart'>
                            <input name='accepted' class='accepted' type='submit' style='margin-right:18px;'></input>
                            <p>Bruger accepteret</p>
                        </div>";
                    echo "<hr>";
                }
                if(isset($_POST['notAccepted'])) {
                    $id = $_POST['id'];

                    $select = "DELETE FROM users WHERE id = '$id'";
                    $result = mysqli_query($conn, $select);

                    echo "<div class='flexStart'>
                            <input name='notAccepted' class='notAccepted' type='submit' style='margin-right:18px;'></input>
                            <p>Bruger ikke accepteret</p>
                        </div>";
                    echo "<hr>";
                }
            ?>
        </div>
    </main>
</body>

<!-- Fra møde med Niels
<div class="flexEnd" style="width: 50%;">
    <?php /*
        printf('<a href="x.php?id=%s"><input name="accepted" class="accepted" type="submit" style="margin-right:18px;"></input></a>', $databyte['name']); 
        printf('<a href="y.php?id=%s"><input name="notAccepted" class="notAccepted" type="submit"></input></a>', $databyte['name']); 
    */ ?>
</div>
-->

</html>