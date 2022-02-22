<?php
include('../db_conn.php');

    if(!empty($_POST['submit'])){
        // Set variables for post username and password 
        $username = $_POST['username'];
        $password = $_POST['password'];
        $sql = "SELECT * FROM users WHERE name ='$username' && password='$password'";
        $qry = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($qry);
        if($count == 1){
            header("Location: ../index.php");
        }
    }
    

    ?>

<div class="login-form">
    <form action="" name="submit" method="POST">
        <p>
            <label>Brugernavn</label>
            <input type="text" name="username" placeholder="Skal udfyldes">
        </p>
        <p>
            <label>Password</label>
            <input type="password" name="password" placeholder="Skal udfyldes">
        </p>
        <input type="submit" name="submit" value="Log in" />
    </form>
</div>
