<?php
//this will control login
session_start();

//now this is gonna check wether the user has already been logged in
if(isset($_SESSION['username']))
{
    header("location: skill it.php");
    exit;
}
require_once "connection.php";

$username = $password = "";
$err = "";

// if request method is post
if ($_SERVER['REQUEST_METHOD'] == "POST"){
    if(empty(trim($_POST['username'])) || empty(trim($_POST['password'])))
    {
        $err = "Please enter username + password";
    }
    else{
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
    }

if(empty($err))
{
    $sql = "SELECT id, username, password FROM users WHERE username = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $param_username);
    $param_username = $username;

    // Try to execute this statement
    if(mysqli_stmt_execute($stmt)){
        mysqli_stmt_store_result($stmt);
                if(mysqli_stmt_num_rows($stmt) == 1)
                {
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt))
                    {
                        if(password_verify($password, $hashed_password))
                        {
                            //this means that the password is correct and im gonna allow <him>
                            session_start();
                            $_SESSION["user"] = $username;
                            $_SESSION["id"] = $id;
                            $_SESSION["loggedin"] = true;
                            
                            //Redirecting user to my website
                            header("location: skill it.php");
                        }
                    }
                }
    }
}
}

?>
<doctype html>
<html>
    <head>
    <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Login</title>
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
            <h1>Login</h1>
            <form action="" method="post">
                <p>Username</p>
                <input type="text" name="username" placeholder="Enter Username">
                <p>Password</p>
                <input type="password" name="password" placeholder="Enter Password"><br>
                <input type="Submit" name="" value="Login"><br>
                <a href="#">Lost your password?</a><br>
                <a href="Create account.php">Click to Create Account</a>
            </form>
        </div>
        </body>
</html>