<?php
session_start();

unset($_SESSION['username']);
unset($_SESSION['userid']);
header("location: index.php");
?>
