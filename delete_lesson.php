<?php
include("configs/init.php");
if(empty($_GET['id'])){
    RedirectTo("lessons.php");
}else{
    $lesson=Lesson::find_by_id($_GET['id']);
    if($lesson->delete()){
        $_SESSION['SuccessMessage']="بەسەرکەوتووی سڕایەوە";
        RedirectTo("lessons.php");
    }else{
        $_SESSION['SuccessMessage']="دووبارە هەوڵبدەرەوە";
        RedirectTo("lessons.php");
    }
}


?>