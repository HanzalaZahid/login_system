<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/style.css">
    <title>Sign Up</title>
</head>
<body>
    <?php
        include "./inc/conn.php";

        if (isset($_POST['submit']))
        {
            $firstname  =   $_POST['firstname'];
            $lastname   =   $_POST['lastname'];
            $email      =   $_POST['email'];
            $password   =   $_POST['password'];

            
            // echo $result->num_rows;
            function check_existing_user($email)
            {
                $sql        =   "select * from user_info where email    =   '$email'";
                $conn       =   $GLOBALS['conn'];
                $result     =   $conn->query($sql);
                if  ($result->num_rows  ==   0)
                {
                    return true;
                }
                else
                {
                    return false;
                }
            }

            if  (check_existing_user($email))
            {
                $sql    =   "INSERT INTO `user_info`(`firstname`, `lastname`, `email`, `password`) VALUES ('$firstname','$lastname','$email','$password')";
                if ($conn->query($sql)  === TRUE)
                {
                    "User Added";
                }
                else
                {
                    "User Failed";
                }
            }
            else
            {
                echo "Email Already Exists";
            }
        }
    ?>
    <div class="signup_container">
        <form action="" method="post" class="signup_form">
            <input type="text" name="firstname" id="firstname" class="firstname" placeholder="Enter Firstname">
            <input type="text" name="lastname" id="lastname" class="lastname" placeholder="Enter Lastname">
            <input type="email" name="email" id="email" class="email" placeholder="Enter Email" required>
            <span class="not_ok">Email Already Taken</span>
            <span class="ok">Email Available</span>
            <input type="password" name="password" id="password" class="password" placeholder="Enter Password">
            <button type="submit" name="submit">Sign Up</button>
        </form>
    </div>
    <script>
        let email   =   document.querySelector('.email');
        let ok   =   document.querySelector('.ok');
        let notok   =   document.querySelector('.not_ok');
        // console.log(email);
        email.addEventListener("keyup", (event)=>
        {
            // console.log("KeyPressed");
            const xhttp =   new XMLHttpRequest();
            xhttp.onload =   function()
            {
                let response   =   this.responseText;
                if (response == 0)
                {
                    ok.style.display    =   "block";
                    notok.style.display    =   "none";
                }
                if (response == 1)
                {
                    ok.style.display    =   "none"
                    notok.style.display    =   "block"
                }
            }
        xhttp.open("POST", "./ajax_calls/check_email.php?email="+email.value);
        xhttp.send();

        })
    </script>
</body>
</html>