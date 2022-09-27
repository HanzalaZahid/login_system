<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/style.css">
    <title>Login</title>
</head>
<body>
    <?php include "./inc/conn.php" ?>
    <div class="login_container">
        <form action="" method="post" class="login_form">
            <input type="text" name="username" id="username" placeholder="Enter username or email" required>
            <input type="password" name="password" id="password" placeholder="Enter password">
            <button type="submit" name="submit">Login</button>
        </form>
    </div>
</body>
</html>