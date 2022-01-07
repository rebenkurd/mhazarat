<?php
require_once("configs/init.php");
$session=new Session();
$session->logout();
RedirectTo("login.php");
?>

