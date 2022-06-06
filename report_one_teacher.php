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
            <span>فۆڕمی وانەبیژی </span>&nbsp;<span>٢٠٢١ - ٢٠٢٢</span>
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
             $daily_time= Daily_Info::find_daily_by_id($_GET['id']); 
        ?>
            <div>
                کۆی کاژێر  :  <span><?php echo round(abs(strtotime($daily_time->start_time)-strtotime($daily_time->end_time))/3600,2);?></span> کاژێر
            </div>

            <div>
            کاژێری زیادە  :  <span>  <?php  echo $teacher->one_day_money; ?> </span> کاژێر
            </div>
            <div>
            بڕی کرێی یەک کاژێر   :  <span>  <?php  echo $teacher->one_day_money; ?> </span> دینار
            </div>
            <div>
                کۆی گشتی :  <span>  <?php  echo $teacher->one_day_money*$daily_avalable; ?> </span> دینار
            </div>
        </div>
        </div>
    <div class="weekly_nums">
    <?php
        $teacher_infos=Daily_Info::find_all();
        foreach($teacher_infos as $teacher_info){
        $week=0;
        while($teacher_info->num_week!=$week ){
        ?>
        <span>ژمارەی هەفتە: </span>&nbsp;<span><?php echo $teacher_info->num_week; ?></span>
        <?php 
            $week=$teacher_info->num_week;
        }} ?>
    </div>
    <div class="weekly_info">
        <div>بەشی زانستی :&nbsp; <span></span> </div>
        <div><span>کۆی کاژێرەکانی وانەوتنەوە:&nbsp;<span>2</span> </span></div>
    </div>
    </div>

        <div class="r-main" style="margin-top: 10px !important;">
        <div>
        <?php
          echo $week=0;
        while($teacher_info->num_week!=$week){
            foreach($teacher_infos as $teacher_info){
            if($teacher_info->teacher_id==$_GET['id']){
        ?>
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

                <tr>
                    <td><?php echo $teacher_info->lesson_name; ?></td>
                    <td><?php echo $teacher_info->stage; ?></td>
                    <td><?php echo $teacher_info->day; ?></td>
                    <td><?php echo $teacher_info->date; ?></td>
                    <td><?php echo $teacher_info->start_time; ?></td>
                    <td><?php echo $teacher_info->end_time; ?></td>
                    <td><?php echo round(abs(strtotime($teacher_info->start_time)-strtotime($teacher_info->end_time))/3600,2);?></td>
                </tr> 
                
  
            </tbody>
            </table>
            <?php
                }
                }
                $week=21;
                } ?>
        <div class="weekly_info">
            <?php
                $teacher=Teacher::find_by_id($_GET['id']);
            ?>
        <div style="text-align: center;">تویژینەوەی زانستی <br> <span><?php echo $teacher->research; ?></span> </div>
        <div style="text-align: center;">کۆی کاێرەکانی هەفتە <br> <span>5</span> </div>
        <div style="text-align: center;">نصاب <br> <span><?php echo $teacher->a_houer_on_week; ?></span> </div>
        <div style="text-align: center;">کاژێری زیادە <br> <span>21</span> </div>
    </div>
  

            </div>
        </div>

        <div class="r-footer">
            <div class="r-footer-top">
                    <div>
                        ناوی مامۆستا
                        <br>
                        <span>فەرمان حسین احمد</span>
                    </div>
                    <div>
                        بڕیاردەری بەش
                        <br>
                        <span>فەرمان حسین احمد</span>
                    </div>
                    <div>
                        سەرۆکی بەش
                        <br>
                        <span>هێمن ابراهیم قادر</span>
                    </div>
                </div>
                <div class="r-footer-bottom">
                    <div>
                         لێپرسراوی دارای
                        <br>
                        <span>بێشوار عباس عمر</span>
                    </div>
                    <div>
                        لێپرسراوی زانستی
                        <br>
                        <span>محمد محمود عبدالله</span>
                    </div>
                    <div>
                        لێپرسراوی وردبینی
                        <br>
                        <span>حسن حمد حسن</span>
                    </div>
                    <div>
                         ڕاگر
                        <br>
                        <span>پ.ی.کاوە عبدالرضا محمد</span>
                    </div>
                </div>
        </div>

    </div>
</body>
</html>