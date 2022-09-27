<?php
    include "../inc/conn.php";
    $email      =   $_REQUEST['email'];
    // echo $email;
    $sql        =   "select * from user_info where email    =   '$email'";
                    $result     =   $conn->query($sql);
                    if  ($result->num_rows  ==   0)
                    {
                        echo "0";
                    }
                    else
                    {
                        echo "1";
                    }
?>