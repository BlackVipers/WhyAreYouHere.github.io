<?php
require_once "connection.php";

$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";

if ($_SERVER['REQUEST_METHOD'] == "POST"){

    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Username cannot be blank";
    }
    else{
        $sql = "SELECT id FROM users WHERE username = ?";
        $stmt = mysqli_prepare($conn, $sql);
        if($stmt)
        {
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set the value of param username
            $param_username = trim($_POST['username']);

            // Try to execute this statement
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                if(mysqli_stmt_num_rows($stmt) == 1)
                {
                    $username_err = "Sorry! this username is already taken"; 
                }
                else{
                    $username = trim($_POST['username']);
                }
            }
            else{
                echo "Oops! Something went wrong";
            }
        }
    }

    mysqli_stmt_close($stmt);


// Check for password
if(empty(trim($_POST['password']))){
    $password_err = "You cannot fool me, Password cannot be blank";
}
elseif(strlen(trim($_POST['password'])) < 5){
    $password_err = "Password cannot be less than 5 characters";
}
else{
    $password = trim($_POST['password']);
}

// Check for confirm password field
if(trim($_POST['password']) !=  trim($_POST['confirm_password'])){
    $password_err = "Passwords should match";
}


// If there were no errors, go ahead and insert into the database
if(empty($username_err) && empty($password_err) && empty($confirm_password_err))
{
    $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    if ($stmt)
    {
        mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);

        // Set these parameters
        $param_username = $username;
        $param_password = password_hash($password, PASSWORD_DEFAULT);

        // Try to execute the query
        if (mysqli_stmt_execute($stmt))
        {
            header("location: Login.php");
        }
        else{
            echo "Oops! Something went wrong... cannot redirect!";
        }
    }
    mysqli_stmt_close($stmt);
}
mysqli_close($conn);
}

?>
<doctype html>
<html>
    <head>
    <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Create account</title>
    </head>
    <style>
        body{
            margin: 0;
            padding: 0;
            background: url(https://cdn.wallpapersafari.com/43/12/Vh8dFx.jpg);
            background-size: cover;
            background-position: center;
            font-family: sans-serif;
        }
        .loginbox{
            width: 320px;
            height: 420px;
            background: #000;
            color: #fff;
            top: 50%;
            left: 50%;
            position: absolute;
            transform: translate(-50%,-50%);
            box-sizing: content-box;
            padding: 70px 30px;
        }
        .avatar{
            width: 100px;
            height: 100px;
            border-radius: 50%;
            position: absolute;
            top: -50px;
            left: 35%;
        }
        h1{
            margin: 0;
            padding: 0 0 20px;
            text-align: center;
            font-size: 22px;
        }
        .loginbox p{
            margin: 0;
            padding: 0;
            font-weight: bold;
        }
        .loginbox input{
            width: 100px;
            margin-bottom: 20px;
        }
        .loginbox input[type="text"], input[type="password"]
        {
            border: none;
            border-bottom: 1 px solid rgb(102, 255, 0);
            background: transparent;
            outline: none;
            height: 40px;
            width: 150px;
            color: #fff;
            font-size: 16px;
        }
        .loginbox input[type="submit"]
        {
            border: none;
            outline: none;
            height: 40px;
            background: #fb2525;
            color: #fff;
            width: 250px;
            font-size: 18px;
            border-radius: 20px;
        }
        .loginbox input[type="submit"]:hover
        {
            cursor: pointer;
            background: #07ff07;
            text-shadow: #07f7ff;
            color: #000;
        }
        .loginbox a{
            text-decoration: none;
            font-size: 12px;
            line-height: 20px;
            color: darkgray;
        }
        .loginbox a:hover
        {
            color: #09ff00;
        }
    </style>
        <div class="loginbox">
            <img src="Login pg.png" class="avatar">
            <h1>Create Account</h1>
            <form action="" method="post">
                <p>Username</p>
                <input type="text" name="username" placeholder="Enter username">
                <p>Password</p>
                <input type="password" name="password" placeholder="Enter Password"><br>
                <p>Confirm Password</p>
                <input type="password" name="confirm_password" placeholder="Confirm Password"><br>
                <input type="Submit" name="" value="Create account"><br>
                <a href="#">Lost your password?</a><br>
                <a href="Login.php"> Already have an account? Then click this to Login</a>
            </form>
        </div>
        </body>
</html>