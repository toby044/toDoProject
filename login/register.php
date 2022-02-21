<?php 

    // Database forbindelse
    include('../db_conn.php');

    if(!empty($_POST['submit'])){
        echo 'yo';
        // Check brugernavn
        if(empty($_POST['username'])){
            echo 'Indtast venligst brugernavn';
        } else {
            $username = $_POST['username'];
        }

         // Check password
         if(empty($_POST['password'])){
            echo 'Indtast venligst password';
        } else {
            $password = $_POST['password'];
        }

        // Slut POST check

        // lav variabler 
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);

         // lav sql
        $sql = "INSERT INTO users(name, password) VALUES('$username','$password')"; 
        
        // Gem i databasen
        if(mysqli_query($conn,$sql)){
            // Ved succes gå til index med logged in detaljer
            header('Location: ../index.php');
        } else {
            echo 'query error: ' . mysqli_error($conn);
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
        <input type="submit" name="submit" value="Registrer" />
    </form>
</div>

<?php 

?>