<?php
include('../db_conn.php');

    // Hvis du er logget ind, gå til index
    if(isset($_COOKIE['uname'])){
        header("Location: ../index.php");
    }

    if(!empty($_POST['submit'])){

        // Set variables for post username and password 
        $username = $_POST['username'];
        $password = $_POST['password'];
        $sql = "SELECT * FROM users WHERE name ='$username' && password='$password'";
        
        // Lav query med sql sætningen
        $qry = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($qry);

        // Sætter cookie, som vi vil læse på og genere content med sql
        if($count == 1){
            header("Location: ../index.php");
            setcookie('uname',$username, time() + 86400, '/');
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
