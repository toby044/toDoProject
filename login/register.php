<?php

// Database forbindelse
include('../db_conn.php');
include('../modules/header.php');

if (!empty($_POST['register'])) {
    // Check brugernavn
    if (empty($_POST['username'])) {
        echo 'Indtast venligst brugernavn';
    } else {
        $username = $_POST['username'];
    }

    // Check password
    if (empty($_POST['password'])) {
        echo 'Indtast venligst password';
    } else {
        $password = $_POST['password'];
    }

    // Slut POST check

    // lav variabler 
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $pass = password_hash($password, PASSWORD_BCRYPT);

    // lav sql
    $sql = "INSERT INTO users(name, password) VALUES('$username','$pass')";

    // Gem i databasen
    if (mysqli_query($conn, $sql)) {
        // Ved succes gå til index med logged in detaljer
        header('Location: ../index.php');
    } else {
        echo 'query error: ' . mysqli_error($conn);
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' type='text/css' href='../css/style.css' />
    <script src="https://kit.fontawesome.com/6f6a2b9d07.js" crossorigin="anonymous"></script>
    <title>Todo</title>
</head>
<body>
    <main>
        <div class="main-container b-radius">
            <div class="login-box">
                <h2 class="todo-title login-title">Opret bruger</h2>
                <div class="login-form">
                    <form action="" name="submit" method="POST">

                        <label>Brugernavn</label>
                        <input type="text" name="username" placeholder="Skal udfyldes" id="forminput">


                        <label>Password</label>
                        <input type="password" name="password" placeholder="Skal udfyldes">

                        <button type="submit" name="register" value="Registrer" class="submitBtn">Registrer</button>
                        <a href="../" class="signup-btn">Allerede bruger?</a>
                    </form>
                </div>
            </div>
        </div>
    </main>
</body>
</html>