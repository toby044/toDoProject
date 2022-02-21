<?php 

include('db_conn.php');

// Query statement
$sql = 'SELECT * FROM users';

// Resultat af query
$result = mysqli_query($conn, $sql);

// Fetch resultater
$data = mysqli_fetch_all($result, MYSQLI_ASSOC);

// Frisæt resultat fra hukommelsen
mysqli_free_result($result);

// Luk forbindelse
mysqli_close($conn);

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
                <div class="flexStart">
                    <!--<p style="width: 50%;" class="noMargin">NielsCool69</p>-->
                    <div class="container-admin" style="width: 50%;">
                        <div class="row-admin flexStart">
                            <?php foreach($data as $databyte){?>
                            <div class="col-admin">
                                <div class="user-admin">
                                    <div class="user-content-admin flexStart">
                                        <p style='margin-right:18px;'><?php echo htmlspecialchars($databyte['name']); ?></p>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                    <form class="flexEnd" method="post" style="width: 50%;">
                      <input name="notAccepted" class="notAccepted" type="submit"></input>
                        <input name="accepted" class="accepted" type="submit"></input>
                    </form>
                </div>
                <hr>
                <?php
                    if(array_key_exists('accepted', $_POST)) {
                        accepted();
                    }
                    else if(array_key_exists('notAccepted', $_POST)) {
                        notAccepted();
                    }
                    function accepted() {
                        echo "<div class='flexStart'>
                                <img src='images/arrow_side_up.png' alt='Arrow' style='margin-right:18px;'>
                                <p>Accepteret</p>
                            </div>";
                        echo "<hr>";
                    }
                    function notAccepted() {
                        echo "<div class='flexStart'>
                                <img src='images/arrow_side_up.png' alt='Arrow' style='margin-right:18px;'>
                                <p>Ikke accepteret</p>
                            </div>";
                        echo "<hr>";
                    }
                ?>
            </div>
        </main>
</body>

</html>