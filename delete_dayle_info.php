<?php
include("configs/init.php");
if(empty($_GET['id'])){
    RedirectTo("times.php");
}else{
    $daily_info=Daily_Info::find_by_id(htmlspecialchars($_GET['id'], ENT_QUOTES, 'UTF-8'));
    $daily_info->delete();
}


?>