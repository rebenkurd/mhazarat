<?php
include("configs/init.php");
if(empty($_GET['id'])){
    RedirectTo("departments.php");
}else{
    $department=Department::find_by_id(htmlspecialchars($_GET['id'], ENT_QUOTES, 'UTF-8'));
    if($department->delete()){
        $_SESSION['SuccessMessage']="بەسەرکەوتووی سڕایەوە";
        RedirectTo("index.php?department_id=".htmlspecialchars($_GET['department_id'], ENT_QUOTES, 'UTF-8'));
    }else{
        $_SESSION['SuccessMessage']="دووبارە هەوڵبدەرەوە";
        RedirectTo("index.php?department_id=".htmlspecialchars($_GET['department_id'], ENT_QUOTES, 'UTF-8'));
    }
}


?>