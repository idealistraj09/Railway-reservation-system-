<?php

session_start();
include("../include/connection.php");
session_destroy();
?>

    <script>
        alert('You are logged out succesfuly !!!');
        location.href = "../php/home.php";
    </script>
    <?php
?>