<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' type='text/css' href='css/style.css' />
    <script src="https://kit.fontawesome.com/71b85ed9fc.js" crossorigin="anonymous"></script>
    <title>Todo</title>
</head>

<body>
    <?php include "./modules/header.php"; ?>
        <main>
            <div class="main-container b-radius">
                <?php echo '<h1>Bruger anmodninger</h1>';?>
                <div class="flexStart">
                    <?php echo '<p style="width: 50%;" class="noMargin">NielsCool69</p>';?>
                    <form class="flexEnd" method="post" style="width: 50%;">
                        <?php 
                        echo '<input name="accepted" class="accepted" type="submit"></input>';
                        echo '<input name="notAccepted" class="notAccepted" type="submit"></input>';
                        ?>
                    </form>
                </div>
                <?php echo '<hr>';?>
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