<?php

include("configs/init.php");

$daily_info=new Daily_Info();
if(isset($_POST['submit'])){
    htmlspecialchars($daily_info->teacher_id=trim(filter_var($_POST['teacher_id'],FILTER_SANITIZE_NUMBER_INT)), ENT_QUOTES, 'UTF-8');
    htmlspecialchars($daily_info->date=trim(filter_var($_POST['date'],FILTER_SANITIZE_NUMBER_INT)), ENT_QUOTES, 'UTF-8');
    htmlspecialchars($daily_info->day=trim(filter_var(date('d',strtotime($_POST['date'])),FILTER_SANITIZE_NUMBER_INT)), ENT_QUOTES, 'UTF-8');
    htmlspecialchars($daily_info->week=trim(filter_var(date('D',strtotime($_POST['date'])),FILTER_SANITIZE_NUMBER_INT)), ENT_QUOTES, 'UTF-8');
    htmlspecialchars($daily_info->year=trim(filter_var(date('Y',strtotime($_POST['date'])),FILTER_SANITIZE_NUMBER_INT)), ENT_QUOTES, 'UTF-8');
    htmlspecialchars($daily_info->month=trim(filter_var(date('m',strtotime($_POST['date'])),FILTER_SANITIZE_NUMBER_INT)), ENT_QUOTES, 'UTF-8');
    htmlspecialchars($daily_info->num_week=trim(filter_var($_POST['num_week'],FILTER_SANITIZE_NUMBER_INT)), ENT_QUOTES, 'UTF-8');
    htmlspecialchars($daily_info->fullname=trim(filter_var($_POST['fullname'],FILTER_DEFAULT)), ENT_QUOTES, 'UTF-8');
    htmlspecialchars($daily_info->department=trim(filter_var($_POST['department'],FILTER_SANITIZE_NUMBER_INT)), ENT_QUOTES, 'UTF-8');
    htmlspecialchars($daily_info->lesson_name=trim(filter_var($_POST['lesson'],FILTER_DEFAULT)), ENT_QUOTES, 'UTF-8');
    htmlspecialchars($daily_info->stage=trim(filter_var($_POST['stage'],FILTER_SANITIZE_NUMBER_INT)), ENT_QUOTES, 'UTF-8');
    htmlspecialchars($daily_info->start_time=trim(filter_var($_POST['start_time'],FILTER_SANITIZE_NUMBER_INT)), ENT_QUOTES, 'UTF-8');
    htmlspecialchars($daily_info->end_time=trim(filter_var($_POST['end_time'],FILTER_SANITIZE_NUMBER_INT)), ENT_QUOTES, 'UTF-8');
    htmlspecialchars($daily_info->num_time=trim(filter_var(round(abs(strtotime($daily_info->start_time)-strtotime($daily_info->end_time))/3600,2),FILTER_SANITIZE_NUMBER_INT)), ENT_QUOTES, 'UTF-8');
    if($daily_info->save()){
        RedirectTo("index.php");
    }else{
        RedirectTo("index.php");
    }
}
?>