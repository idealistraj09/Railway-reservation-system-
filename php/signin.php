<?php
    session_start();
    include("../include/connection.php");

    if(isset($_POST['login']))
    {
        $uname=$_REQUEST['uname'];
        $pass=$_REQUEST['pass'];

        $sql= "SELECT * FROM passenger WHERE Admin_id='$uname' AND PasswordT='$pass' limit 1";
        $result=mysqli_query($con,$sql);
        $rows=mysqli_num_rows($result);
        echo "".mysqli_error($con);
        if(mysqli_num_rows($result)==1)
        {
            echo "<script>alert('You have sucessfuly loged in as admin ')</script>";
            $_SESSION['admin'] = $username;            
                header("Location:home.php");

        }
        else
        {
            echo "<script>alert('Email and Password is incorrect')</script>";
        }
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
                <input type="text" placeholder="User id" name="uname"  />
                <input type="password" placeholder="Password" name="pass"/>
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