<?php
include("configs/init.php");
if(empty($_GET['id'])){
    RedirectTo("teachers.php");
}else{
    $teacher=Teacher::find_by_id(htmlspecialchars($_GET['id'], ENT_QUOTES, 'UTF-8'));
    $teacher->delete();
}


?>