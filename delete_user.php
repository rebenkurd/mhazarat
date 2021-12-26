<?php
include("configs/init.php");
if(empty($_GET['id'])){
    RedirectTo("users.php");
}else{
    $user=User::find_by_id($_GET['id']);
    if($user->delete_user()){
        $_SESSION['SuccessMessage']="بەسەرکەوتووی سڕایەوە";
        RedirectTo("users.php");
    }else{
        $_SESSION['SuccessMessage']="دووبارە هەوڵبدەرەوە";
        RedirectTo("users.php");
    }
}






?>