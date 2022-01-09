<?php
    session_start();
    include("../include/connection.php");

    if (isset($_POST['login'])) {
        $uname = $_POST['uname'];
        $password = $_POST['pass'];

        $id_search = "SELECT * FROM `passenger` WHERE `Admin_id`= '$uname' ";
        $query = mysqli_query($con, $id_search);
        $id_count = mysqli_num_rows($query);

        if (strcasecmp($uname,$id_search)==0) {

            //$id_pass = mysqli_fetch_assoc($query);
            //$db_pass = $id_pass['PasswordT'];

            // if ($db_pass === $password) {
            //     session_start();
?>
    <script>
        alert("Log in succesfull ");
        location.replace("home.php");
    </script>
<?php
            } 
            else{
?>
    <script>
        alert("Password is incorrect ");
        
    </script>
<?php
            }
        }
        else{
?>
    <script>
        alert("Enter valid user id ");
    </script>
<?php
        }
    
    


?>

<html>

<head>
    <link rel="stylesheet" href="../css/signin.css">
    <script src="../js/time.js"></script>
    <title>sign in</title>
</head>

<body>
    <h2>Join us</h2>
    <div class="container" id="container">
        <div class="form-container sign-in-container">
            <form action="#" method="POST">
                <h1>Sign in</h1>
                <span>or use your account</span>
                <input type="text" placeholder="User id" name="uname" />
                <input type="password" placeholder="Password" name="pass" />
                <a href="#">Forgot your password?</a>
                <button name="login">Sign In</button>
            </form>
        </div>
        <div>
            <?php

            ?>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <form action="signup.php">
                        <h1>Welcome Back!</h1>
                        <p>To keep connected with us please login with your personal info</p>
                        <button class="ghost" id="signIn">Sign In</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Hello, Friend!</h1>
                    <p>Enter your personal details and start journey with us</p>
                    <button class="ghost" id="signUp">Sign Up</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>