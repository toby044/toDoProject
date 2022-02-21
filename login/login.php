<?php
    include('db.php');

    // Query
    $sql = 'SELECT * FROM users';
    
    // Resultat af query
    $result = mysqli_query($conn, $sql);

    // Fetch resultater
    $data = mysqli_fetch_all($result, MYSQLI_ASSOC);

    // Frisæt resultat fra hukommelsen
    mysqli_free_result($result);
    
    // Luk forbindelse
    mysqli_close($conn);
    
    print_r($data);
    