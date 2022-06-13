<?php
include("configs/init.php");
if(empty($_GET['id'])){
    RedirectTo("staff.php");
}else{
    $staff=Staff::find_by_id($_GET['id']);
    if($staff->delete()){
        $_SESSION['SuccessMessage']="بەسەرکەوتووی سڕایەوە";
        RedirectTo("staff.php");
    }else{
        $_SESSION['SuccessMessage']="دووبارە هەوڵبدەرەوە";
        RedirectTo("staff.php");
    }
}


?>