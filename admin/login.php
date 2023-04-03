<?php
    // include('../config/constants.php');
    include('./config/constants.php');
    
    include('./partials/function.php');


    if (isset($_SESSION['user'])) {
        redirect_to('index.php');
        exit();
    }
?> 

<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
        <title>Login - Food Order System</title>
        <link rel="stylesheet" href="../css/admin.css">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

        <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900'>
        <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Montserrat:400,700'>
        <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>
        <link rel="stylesheet" href="../css/login.css">
    </head>

    <body>
        <br><br><br>
        <div class="form">
            <div class="thumbnail"><img src="../images/manager.png"/></div>
            <br><br>

            <?php 
                
                if(isset($_SESSION['login']))
                {
                    echo $_SESSION['login'];
                    unset($_SESSION['login']);
                }

                if(isset($_SESSION['no-login-message']))
                {
                    echo $_SESSION['no-login-message'];
                    unset($_SESSION['no-login-message']);
                }
            ?>

            <!-- Login Form Starts Here -->
            <form action="" method="POST" class="text-center">
            <!-- Username: <br> -->
            <input type="text" name="username" placeholder="Enter Username"><br>

            <!-- Password: <br> -->
            <input type="password" name="password" placeholder="Enter Password"><br><br>

            <input type="submit" name="submit" value="Login" class="btn-primary">
            <br><br>
            </form>
            <!-- Login Form Ends HEre -->

            <p class="text-center">Created By - <a href="#">Team 3</a></p>
        </div>

        
    </body>
</html>

<?php 

    //Check whether the Submit Button is Clicked or NOt
    if(isset($_POST['submit']))
    {
        //Process for Login
        //1. Get the Data from Login form
        // $username = $_POST['username'];
        // $password = md5($_POST['password']);
        // $username = mysqli_real_escape_string($conn, $_POST['username']);
        $username = $db->escapeString($_POST['username']);
        
        $raw_password = md5($_POST['password']);
        // $password = mysqli_real_escape_string($conn, $raw_password);
        $password = $db->escapeString($raw_password);

        //2. SQL to check whether the user with username and password exists or not
        // $sql = "SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'";

        // //3. Execute the Query
        // $res = mysqli_query($conn, $sql);

        // //4. Count rows to check whether the user exists or not
        // $count = mysqli_num_rows($res);

        $sql = $db->query("SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'");
        $count = $db->querySingle("SELECT COUNT(*) FROM tbl_admin WHERE username='$username' AND password='$password'");

        if($count==1)
        {
            //User Available and Login Success
            $_SESSION['login'] = "<div class='success'>Login Successful.</div>";
            $_SESSION['user'] = $username; //TO check whether the user is logged in or not and logout will unset it

            //Redirect to HOme Page/Dashboard
            redirect_to('index.php');
        }
        else
        {
            //User not Available and Login Fail
            $_SESSION['login'] = "<div class='error text-center'>Username or Password did not match.</div>";
            //Redirect to Home Page/Dashboard
            redirect_to('login.php');
        }


    }

?>