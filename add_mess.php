<?php
session_start();

if(isset($_POST['mess']) && $_POST['mess']!="" && $_POST['mess']!=" " && $_SESSION['userid']!=0)
{
    $mess = $_POST['mess'];
    $userid = $_SESSION['userid'];
    $vis = $_POST['a'];
    $db = mysqli_connect('localhost','root','','test2');
    $res = mysqli_query($db,"INSERT INTO chat (sender_userid, message, vision) VALUES ('$userid','$mess', '$vis') ");
}