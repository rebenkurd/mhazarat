<?php
include("configs/init.php");
if(empty($_GET['id'])){
    RedirectTo("times.php");
}else{
    $time=Time::find_by_id($_GET['id']);
    if($time->delete()){
        $_SESSION['SuccessMessage']="بەسەرکەوتووی سڕایەوە";
        RedirectTo("times.php");
    }else{
        $_SESSION['SuccessMessage']="دووبارە هەوڵبدەرەوە";
        RedirectTo("times.php");
    }
}


?>