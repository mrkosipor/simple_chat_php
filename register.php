<?php
session_start();
echo "<link rel='stylesheet' href='styles.css'>";
$username = htmlspecialchars(trim($_POST['reg_username']));
$password = htmlspecialchars(trim($_POST['reg_password']));

$db = mysqli_connect('localhost','root','','test2');

$res=mysqli_query($db,"SELECT username FROM chat_users WHERE username='$username' ");
$data=mysqli_fetch_array($res);
if (!empty($data['username'])){
    echo("Такой логин уже существует!");
}
    $result=mysqli_query($db, "INSERT INTO chat_users (username, password) VALUES ('$username','$password')");
if ($result==true){
        echo "Вы успешно зарегистрированы! <br>
          Повторите авторизацию <a href='index.php'> на главной</a>";
}
else{
    /*echo "Error! ---->  ". mysqli_error($db);*/
    echo "<br> Вы успешно НЕ зарегистрированы! <br>
    <a href='index.php'>На главную</a>";
}
/*echo session_status ();*/
/*include("chat.php");*/

