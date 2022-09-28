<?php
    session_start();
    function check_login()
    {
        if (isset($_COOKIE['email']))
        {
            if(!isset($_SESSION['email']))
            {
                $_SESSION['email']  =   $_COOKIE['email'];
                $_SESSION['username']  =   $_COOKIE['username'];
            }
            return true;
        }
        else if (isset($_SESSION['email']))
        {
            return true;
        }
        return false;
    }
?>