<?php


require_once("configs/init.php");


$teacher=Teacher::find_by_id($_GET['id']);
if($teacher->contract !=0){
    $_SESSION['ErrorMessage']="تکایە دووبارە هەوڵبدەرەوە";
    RedirectTo("index.php?teacher_id=".$_GET['id']);
}else if(!isset($_GET['month'])){
    $_SESSION['ErrorMessage']="تکایە مانگێک دیاری بکە";
    RedirectTo("index.php?teacher_id=".$_GET['id']);
}
$teacher_infos=Daily_Info::find_all();


?>




<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ڕاپۆرت</title>
    <link rel="stylesheet" href="assets/css/rtl.css">
</head>
<body>
    
    <div class="report-page">

        <div class="r-header">

        <div class="r-header-top">
            <span>فۆڕمی وانەبیژی </span>&nbsp;<span><?php echo date("Y")." - ".date("Y")-1; ?></span>
        </div>


        <?php
            
             $teacher=Teacher::find_by_id($_GET['id']);

        ?>

        <div class="r-header-bottom">
            <div class="rhb-right">
            <div>
                کۆدی مامۆستا: <span> <?php  echo $teacher->id; ?> </span>
            </div>
            <div>
                ناوی مامۆستا : <span> <?php  echo $teacher->fullname; ?>  </span>
            </div>
            <div>
                نازناو :  <span> <?php  echo $teacher->nickname; ?> </span>
            </div>
            <div>
                بڕوانامە  :  <span> <?php  echo $teacher->certificate; ?> </span>
            </div>
            <div>
                نصاب  :  <span> <?php  echo $teacher->a_houer_on_week; ?> </span>
            </div>
        </div>


        <div class="rhb-left">
        <?php 
        
             $daily_avalable= Daily_Info::daily_avalable($_GET['id']); 
             foreach($teacher_infos as $times){
             $sum_all_times=Daily_Info::sum_num_time_a_month($_GET['id'],$times->num_time,$_GET['month']);
        ?>    
            <div>
                کۆی کاژێر  :  <span> <?php echo $sum_all_times;?> </span> کاژێر
            </div>
            <?php break; }?>
            <div>
            کاژێری زیادە  :  <span> </span> کاژێر
            </div>
            <div>
            بڕی کرێی یەک کاژێر   :  <span>  <?php  echo number_format($teacher->one_day_money,0); ?> </span> دینار
            </div>
            <div>
                کۆی گشتی :  <span>  <?php  echo number_format($teacher->one_day_money*$daily_avalable,0); ?> </span> دینار
            </div>
        </div>


        </div>

        </div>
        <?php
        $i=1;
        foreach($teacher_infos as $weeks){
            while($i<=$weeks->num_week){
                if($weeks->teacher_id==$_GET['id'] && $weeks->month==$_GET['month']&& $weeks->num_week==$i){
?>
    <div class="weekly_nums">
        <span>ژمارەی هەفتە: </span>&nbsp;<span><?php  echo $weeks->num_week; ?></span>
    </div>

    <div class="weekly_info">
        <?php
         $department_name=Department::find_by_id($weeks->department);
?>
        <div>بەشی زانستی :&nbsp; <span><?php echo $department_name->department_name; ?></span> </div>
        <div><span>کۆی کاژێرەکانی وانەوتنەوە:&nbsp;<span><?php echo Daily_Info::sum_num_time($weeks->num_time,$i); ?></span> </span></div>
    

    </div>

    <div class="r-main" style="margin-top: 10px !important;">

        <table style="margin-top: 10px !important;">
            <thead>
                <th>ناوی وانە</th>
                <th>قۆناغ</th>
                <th>ڕۆژ</th>
                <th>بەروار</th>
                <th>کاتی دەستپێک </th>
                <th>کاتی کۆتا </th>
                <th>ژمارەی کاژێر</th>
            </thead>
            <tbody>   
                <?php 
                    foreach($teacher_infos as $teacher_info){
                        if($teacher_info->teacher_id==$_GET['id']){
                            if($teacher_info->num_week==$i && $teacher_info->month==$_GET['month']){
                ?>
                <tr>
                    <td><?php echo $teacher_info->lesson_name; ?></td>
                    <td><?php echo $teacher_info->stage; ?></td>
                    <td><?php echo $teacher_info->day; ?></td>
                    <td><?php echo $teacher_info->date; ?></td>
                    <td><?php echo $teacher_info->start_time; ?></td>
                    <td><?php echo $teacher_info->end_time; ?></td>
                    <td><?php echo $teacher_info->num_time; ?></td>
                </tr> 
                <?php } } } ?>
            </tbody>
            </table>

        <div class="weekly_info">
            <?php
                $teacher=Teacher::find_by_id($_GET['id']);
            ?>
        <div style="text-align: center;">تویژینەوەی زانستی <br> <span><?php echo $teacher->research; ?></span> </div>
        <div style="text-align: center;">کۆی کاژێرەکانی هەفتە <br> <span><?php echo Daily_Info::sum_num_time($weeks->num_time,$i); ?></span> </div>
        <div style="text-align: center;">نصاب <br> <span><?php echo $teacher->a_houer_on_week; ?></span> </div>
        <div style="text-align: center;">کاژێری زیادە <br> <span><?php echo Daily_Info::sum_num_time($weeks->num_time,$i); ?></span> </div>
    </div>
  
        </div>            <br>
<br>
        <?php
            }else{
            break;
        }
             $i++;
            }     
        }
        ?> 

<?php

        $staffs=Staff::find_all();
?>
        <div class="r-footer">
            <div class="r-footer-top">
                    <div>
                        ناوی مامۆستا
                        <br>
                        <span> <?php  echo $teacher->fullname; ?></span>
                    </div>
                    <div>
                        بڕیاردەری بەش
                        <br>
                        <?php foreach($staffs as $staff){ ?>
                        <span>
                             <?php if($staff->responsibility_id==2){echo $staff->name;}else{null;} ?>
                        </span>
                        <?php } ?>
                    </div>
                    <div>
                        سەرۆکی بەش
                        <br>
                        <?php foreach($staffs as $staff){ ?>
                        <span>
                             <?php if($staff->responsibility_id==3){echo $staff->name;}else{null;} ?>
                        </span>
                        <?php } ?>
                </div>
                </div>
                <div class="r-footer-bottom">
                    <div>
                         لێپرسراوی دارای
                        <br>
                        <?php foreach($staffs as $staff){ ?>
                        <span>
                             <?php if($staff->responsibility_id==4){echo $staff->name;}else{null;} ?>
                        </span>
                        <?php } ?>
                </div>
                    <div>
                        لێپرسراوی زانستی
                        <br>
                        <?php foreach($staffs as $staff){ ?>
                        <span>
                             <?php if($staff->responsibility_id==5){echo $staff->name;}else{null;} ?>
                        </span>
                        <?php } ?>
                </div>
                    <div>
                        لێپرسراوی وردبینی
                        <br>
                        <?php foreach($staffs as $staff){ ?>
                        <span>
                             <?php if($staff->responsibility_id==6){echo $staff->name;}else{null;} ?>
                        </span>
                        <?php } ?>
                </div>
                    <div>
                         ڕاگر
                        <br>
                        <?php foreach($staffs as $staff){ ?>
                        <span>
                             <?php if($staff->responsibility_id==1){echo $staff->name;}else{null;} ?>
                        </span>
                        <?php } ?>
                </div>
                </div>
        </div>
    </div>
</body>
</html>