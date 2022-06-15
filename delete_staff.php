<?php
include("configs/init.php");
if(empty($_GET['id'])){
    RedirectTo("staff.php");
}else{
    $staff=Staff::find_by_id(htmlspecialchars($_GET['id'], ENT_QUOTES, 'UTF-8'));
    if($staff->delete()){
        $_SESSION['SuccessMessage']="بەسەرکەوتووی سڕایەوە";
        RedirectTo("staff.php");
    }else{
        $_SESSION['SuccessMessage']="دووبارە هەوڵبدەرەوە";
        RedirectTo("staff.php");
    }
}


?>