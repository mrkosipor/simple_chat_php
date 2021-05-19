<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <title>Chat</title>
</head>

<body>
<div id="content">

<?php
include("chat.php");
if (isset($_SESSION['username']) && isset($_SESSION['userid'])) {
    $db = mysqli_connect('localhost', 'root', '', 'test2');
    $username = $_SESSION['username'];
    $res = mysqli_query($db, "SELECT * FROM chat_users where username = '$username'");
    $name = mysqli_fetch_array($res);
} else echo '<div id="login" >
    <label>Регистрация </label>
    <form action="register.php" method="post">
        <input type="text" name="reg_username" placeholder="Username" required>
        <input type="password" name="reg_password" placeholder="Password" required>
        <input type="submit" value="Sign_In">
    </form>
</div>

<div id="auth">    
    <label>Авторизация</label>
    <form method="POST" action="login.php">
        <input name="username" type="text" required placeholder="Username">
        <input name="password" type="password" required placeholder="Password">
        <input type="submit" value="Log_In">
    </form>
</div>';
?>

</div>
<div id="video">
    <video width="100%" height="auto" src="video.mp4" autoplay loop preload="auto" muted></video>
</div>
</body>
</html>
