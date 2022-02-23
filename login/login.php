<?php
//include ('../db_conn.php');
// include 'register.php';

// Hvis du er logget ind, gå til index
if (isset($_COOKIE['uname'])) {
    header("Location: ../index.php");
}

if (!empty($_POST['submit'])) {

    // Opret forbindelse til databasen

    // Set variables for post username and password 
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM users WHERE name ='$username'";

    // Lav query med sql sætningen
    $qry = mysqli_query($conn, $sql);
    $arr = $qry->fetch_array(MYSQLI_ASSOC);
    $userid = $arr['id'];

    $count = mysqli_num_rows($qry);
    // Sætter cookie, som vi vil læse på og genere content med sql
    if ($count == 1) {
        if (password_verify($password, $arr['password']) === true) {
            if ($username == 'admin') {
                header("Location: ./admin.php");
            } else {
                header("Location: ./");
                setcookie('uname', $username, time() + 60 * 60 * 24 * 30, '/');
                setcookie('userid', $userid, time() + 60 * 60 * 24 * 30, '/');
            }
        }
    }
}


?>


<div class="login-box">
    <h2 class="todo-title login-title">Log ind</h2>
    <div class="login-form">
        <form action="" name="submit" method="POST">

            <label>Brugernavn</label>
            <input type="text" name="username" placeholder="Skal udfyldes" id="forminput">


            <label>Password</label>
            <input type="password" name="password" placeholder="Skal udfyldes">

            <button type="submit" name="submit" value="Log in" class="submitBtn">Log in</button>
            <a href="./login/register.php" class="signup-btn">Opret bruger</a>
        </form>
    </div>
</div>