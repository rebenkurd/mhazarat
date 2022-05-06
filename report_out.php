<?php
require_once("configs/init.php");



$teacher=Teacher::find_by_id($_GET['id']);
if($teacher->contract !=1){
    RedirectTo("report_in.php?id=".$_GET['id']);
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
            <span>پەیمانگای تەکنیکی دوکان</span>
            <br>
            <span>فۆڕمی وانەبیژی دەرەکی</span>
            <br>
            <span>٢٠٢١ - ٢٠٢٢</span>
        </div>
        <?php
            
            $teacher=Teacher::find_by_id($_GET['id']);

        ?>
        <div class="r-header-bottom">
            <div class="rhb-right">
            <div>
                کۆدی مامۆستا: <span> <?php echo $teacher->id; ?> </span>
            </div>
            <div>
                ناوی مامۆستا : <span> <?php echo $teacher->fullname; ?>  </span>
            </div>
            <div>
                نازناو :  <span> <?php echo $teacher->nickname; ?> </span>
            </div>
            <div>
                بڕوانامە  :  <span> <?php echo $teacher->certificate; ?> </span>
            </div>
        </div>
        <div class="rhb-left">
        <?php 
        
            $daily_avalable= Daily_Info::daily_avalable($_GET['id']); 
        ?>
            <div>
                ژمارەی سەردان :  <span><?php echo $daily_avalable; ?></span> ڕۆژ
            </div>

            <div>
                بری کریی یەک سەردان  :  <span>  <?php echo $teacher->one_day_money; ?> </span> دینار
            </div>
            <div>
                کۆی گشتی :  <span>  <?php echo $teacher->one_day_money*$daily_avalable; ?> </span> ڕۆژ
            </div>
        </div>
        </div>
        </div>

        <div class="r-main">
            <div>بەشی زانستی : <span></span> </div>
            <table>
            <thead>
                <th>زنجیرە</th>
                <th>ڕۆژ</th>
                <th>بەروار</th>
                <th>ناوی وانە</th>
                <th>قۆناغ</th>
            </thead>
            <tbody>     
            <?php
                $teacher_infos=Daily_Info::find_all();
                $a=1;
                foreach($teacher_infos as $teacher_info){
                    if($teacher_info->teacher_id==$_GET['id']){
            ?>
                <tr>
                    <td><?php echo $a++; ?></td>
                    <td><?php echo $teacher_info->week; ?></td>
                    <td><?php echo $teacher_info->date; ?></td>
                    <td><?php echo $teacher_info->lesson_name; ?></td>
                    <td><?php echo $teacher_info->stage; ?></td>
                </tr>
                <?php }} ?>
            </tbody>
            </table>
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