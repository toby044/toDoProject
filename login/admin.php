<?php 

include('../db_conn.php');

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
    <title>Admin</title>
    <link rel='stylesheet' type='text/css' href='css/style.css' />
</head>
<body>
    <div class="container-admin">
        <div class="row-admin">
            <?php foreach($data as $databyte){?>
            <div class="col-admin">
                <div class="user-admin">
                    <div class="user-content-admin">
                        <h5><?php echo htmlspecialchars($databyte['name']); ?></h5>
                        <h6><?php echo htmlspecialchars($databyte['id']); ?></h6>
                    </div>
                </div>
            </div>    
            <?php } ?>
        </div>
    </div>
    
    
</body>
</html>