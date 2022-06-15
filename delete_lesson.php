<?php
include("configs/init.php");
if(empty($_GET['id'])){
    RedirectTo("lessons.php");
}else{
    $lesson=Lesson::find_by_id(htmlspecialchars($_GET['id'], ENT_QUOTES, 'UTF-8'));
    if($lesson->delete()){
        $_SESSION['SuccessMessage']="بەسەرکەوتووی سڕایەوە";
        RedirectTo("lessons.php");
    }else{
        $_SESSION['SuccessMessage']="دووبارە هەوڵبدەرەوە";
        RedirectTo("lessons.php");
    }
}


?>