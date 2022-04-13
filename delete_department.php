<?php
include("configs/init.php");
if(empty($_GET['id'])){
    RedirectTo("departments.php");
}else{
    $department=Department::find_by_id($_GET['id']);
    if($department->delete()){
        $_SESSION['SuccessMessage']="بەسەرکەوتووی سڕایەوە";
        RedirectTo("index.php?department_id=".$_GET['department_id']);
    }else{
        $_SESSION['SuccessMessage']="دووبارە هەوڵبدەرەوە";
        RedirectTo("index.php?department_id=".$_GET['department_id']);
    }
}


?>