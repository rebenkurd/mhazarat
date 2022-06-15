<?php
include("configs/init.php");
if(empty($_GET['id'])){
    RedirectTo("times.php");
}else{
    $daily_info=Daily_Info::find_by_id(htmlspecialchars($_GET['id'], ENT_QUOTES, 'UTF-8'));
    if($daily_info->delete()){
        $_SESSION['SuccessMessage']="بەسەرکەوتووی سڕایەوە";
        RedirectTo("index.php?teacher_id=".htmlspecialchars($_GET['teacher_id'], ENT_QUOTES, 'UTF-8'));
    }else{
        $_SESSION['SuccessMessage']="دووبارە هەوڵبدەرەوە";
        RedirectTo("index.php?teacher_id=".htmlspecialchars($_GET['teacher_id'], ENT_QUOTES, 'UTF-8'));
    }
}


?>