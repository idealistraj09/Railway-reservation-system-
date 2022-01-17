<?php

session_start();
include("../include/connection.php");


    if(isset($_SESSION['logged_as_user']) || $_SESSION['logged_as_admin'])
    {
        session_destroy();
        ?>
        <script>
        alert('You are logged out successfully !!!');
        location.href = "../php/home.php";
        </script>
        <?php
    }
    else{
        ?>
        <script>
        alert('You are already logged out !!!');
        location.href = "../php/home.php";
        </script>
        <?php
    }
    
?>