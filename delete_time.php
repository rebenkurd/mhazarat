<?php
include("configs/init.php");
if(empty($_GET['id'])){
    RedirectTo("times.php");
}else{
    $time=Time::find_by_id(htmlspecialchars($_GET['id'], ENT_QUOTES, 'UTF-8'));
    if($time->delete()){
        $_SESSION['SuccessMessage']="بەسەرکەوتووی سڕایەوە";
        RedirectTo("times.php");
    }else{
        $_SESSION['SuccessMessage']="دووبارە هەوڵبدەرەوە";
        RedirectTo("times.php");
    }
}


?>