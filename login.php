<?php
    include "./inc/check_login.php";
    if (check_login())
    {
        header("location: dashboard.php");
    }
?>
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
    <?php include "./inc/conn.php";
    if (isset($_POST['submit']))
    {
        $email      =   $_POST['username'];
        $password   =   $_POST['password'];

        $sql        =   "select * from user_info where email    =   '$email' and password   =   '$password'";
        $result     =   $conn->query($sql);
        if ($result->num_rows   >   0)
        {
            echo "Login Successful";
            $data                   =   $result->fetch_assoc();
            $_SESSION['email']      =   $data['email'];
            $_SESSION['username']   =   $data['firstname']." ".$data['lastname'];
            if (isset($_POST['rememberme']))
            {
                setcookie("email",$_SESSION['email'], time()+867000);
                setcookie("username", $_SESSION['username'], time()+867000);
            }
            else
            {
                setcookie("email",$_SESSION['email'], time()-867000);
                setcookie("username", $_SESSION['username'], time()-867000);
            }
            header('Location: dashboard.php');

        }
        else
        {
            echo "login failed";
        }
    }
    ?>
    <div class="login_container">
        <form action="" method="post" class="login_form">
            <input type="text" name="username" id="username" placeholder="Enter username or email" required>
            <input type="password" name="password" id="password" placeholder="Enter password">
            <span>
            <input type="checkbox" name="rememberme" id="rememberme"><span>Remember Me</span>
            </span>
            <button type="submit" name="submit">Login</button>
        </form>
    </div>
</body>
</html>