<?php
include("configs/init.php");
if(empty($_GET['id'])){
    RedirectTo("times.php");
}else{
    $daily_info=Daily_Info::find_by_id($_GET['id']);
    if($daily_info->delete()){
        $_SESSION['SuccessMessage']="بەسەرکەوتووی سڕایەوە";
        RedirectTo("index.php?teacher_id=".$_GET['teacher_id']);
    }else{
        $_SESSION['SuccessMessage']="دووبارە هەوڵبدەرەوە";
        RedirectTo("index.php?teacher_id=".$_GET['teacher_id']);
    }
}


?>