<?php
session_start();
include("../include/connection.php");
if (isset($_SESSION['logged_as_user'])) {
?>

    
<?php
}
if (isset($_SESSION['logged_as_admin'])) {
?>
    <script>
        let text = "Your are already logged in as  <?php echo $_SESSION['Admin_name']; ?>! if you want login another account you must need to logout First. want to logout ?";
        let isExecuted = confirm(text);

        if (isExecuted) {
            location.href = "../include/logout.php";
        } else {
            location.href = "home.php";
        }
    </script>
    <?php
}

if ($_SERVER['REQUEST_METHOD'] == "POST" &&  $_POST['uname'] != "" && $_POST['pass'] != "") {
    $uname = $_POST['uname'];
    $password = $_POST['pass'];

    $id_search = "SELECT * FROM `user` WHERE BINARY user_id='$uname' AND BINARY PasswordT = '$password';";
    $query = mysqli_query($con, $id_search);
    $id_count = mysqli_num_rows($query);
    $row1 = mysqli_fetch_assoc($query);

    $id_search_Admin = "SELECT * FROM `admin` WHERE BINARY admin_id='$uname' AND BINARY PasswordT = '$password';";
    $query_Admin = mysqli_query($con, $id_search_Admin);
    $id_count_Admin = mysqli_num_rows($query_Admin);


    if ($id_count > 0) {

        $_SESSION['logged_as_user'] = true;
        $_SESSION['uname'] = $uname;
        $_SESSION['ticketsendmail'] = $row1['Email'];

        header('Location: home.php');
    } elseif ($id_count_Admin > 0) {
        $_SESSION['logged_as_admin'] = true;
        $_SESSION['Admin_name'] = $uname;
        header('Location: home.php');
    } else {

    ?>

        <script>
            alert('Your Username or Password is Incorrect !!!');
        </script>
    <?php

    }
} else if ($_SERVER['REQUEST_METHOD'] == "POST") {
    ?>
    <script>
        alert('Enter Your Login Details..');
    </script>
<?php
}


?>

<html>

<head>
    <link rel="stylesheet" href="../css/signin.css">
    <script src="../js/time.js"></script>
    <link rel="stylesheet" href="../css/allinone.css">
    <title>sign in</title>
</head>

<body>
    <h2>Join us</h2>
    <div class="container" id="container">
        <div class="form-container sign-in-container">
            <form action="#" method="POST">
                <h1>Sign in</h1>
                <br>
                <input type="text" placeholder="User id" name="uname" />
                <input type="password" placeholder="Password" name="pass" />
                <a href="forgot.php" class="labelsignin">Forgot your password?</a>
                <button name="login">Sign In</button>
                
                <a href="../php/home.php"><img src="../img/homebt.png" height="40px" width="40px"></a>Home
            </form>
            <a style="margin-left: 59%; width: 100%; position: absolute;" href="../php/signup.php" class="labelsignin">Not a Member yet? Click Here!</a>
        </div>
    </div>
</body>
<?php

?>

</html>