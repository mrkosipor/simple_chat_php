<?php
session_start();
$db = mysqli_connect('localhost','root','','test2') ;

$username = isset($_POST['username']) ? trim(mysqli_real_escape_string($db, $_POST['username'])) : '';
$password = isset($_POST['password']) ? trim(mysqli_real_escape_string($db, $_POST['password'])) : '';
if (!empty($username)) {

    $result = mysqli_query($db,"SELECT * from chat_users where username='$username' AND password='$password'");
    $count = mysqli_num_rows($result);
    if ($count==1){
    	$row = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $row['username'];
        $_SESSION['userid'] = $row['userid'];
        echo "hi $username <br>";
        echo $_SESSION['userid'];
        echo $_SESSION['username'];
        echo "<br>Вы успешно авторизовались! <br>";
        echo '<br /><a href="chat.php">to chat</a>';
        header("location: index.php");
    }
    else  echo "<br><a href='index.php'>Ошибка ввода данных</a>";
}

/*include("chat.php");*/
/*header("location:chat.php");*/

