<?php
    include "./inc/check_login.php";
    if (!check_login())
    {
        header("location: login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/style.css">
    <title>Dashboard</title>
</head>
<body>
    <div class="welcome_message">
        Welcome <span><?php echo $_SESSION['username']; ?></span>
    </div>
    <a href="./logout.php" class="logout_button">Logout</a>
</body>
</html>