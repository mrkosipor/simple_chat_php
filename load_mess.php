<?php
session_start();

$db = mysqli_connect('localhost','root','','test2');

$res=mysqli_query($db,"SELECT message, username, vision FROM chat, chat_users where chat.sender_userid=chat_users.userid ORDER BY timestamp  DESC");
$res_0 = mysqli_query($db, "SELECT message, username, vision FROM chat, chat_users where chat.sender_userid=chat_users.userid and vision=1 ORDER BY timestamp DESC");

if (isset($_SESSION['userid']) && $_SESSION['userid']!=0){
    while($d=mysqli_fetch_array($res))
    {
        echo "<b>".$d['username'].":&nbsp;".$d['message']."<br>";
    }
}
else {
        while($unreg=mysqli_fetch_array($res_0))
        {
            echo "<b>".$unreg['username'].":&nbsp;".$unreg['message']."<br>";
        }
}


/*echo session_status ();
echo $_SESSION['userid'];*/
?>