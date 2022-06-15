<?php
require_once("configs/init.php");



$teacher=Teacher::find_by_id(htmlspecialchars($_GET['id'], ENT_QUOTES, 'UTF-8'));
if($teacher->contract !=1){
    $_SESSION['ErrorMessage']="تکایە دووبارە هەوڵبدەرەوە";
    RedirectTo("index.php");
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
            <span><?php echo htmlspecialchars(date("Y")-1 ." - ".date("Y"), ENT_QUOTES, 'UTF-8') ?></span>

        </div>
        <?php
            
            $teacher=Teacher::find_by_id(htmlspecialchars($_GET['id'], ENT_QUOTES, 'UTF-8'));

        ?>
        <div class="r-header-bottom">
            <div class="rhb-right">
            <div>
                کۆدی مامۆستا: <span> <?php echo htmlspecialchars($teacher->id, ENT_QUOTES, 'UTF-8'); ?> </span>
            </div>
            <div>
                ناوی مامۆستا : <span> <?php echo htmlspecialchars($teacher->fullname, ENT_QUOTES, 'UTF-8'); ?>  </span>
            </div>
            <div>
                نازناو :  <span> <?php echo htmlspecialchars($teacher->nickname, ENT_QUOTES, 'UTF-8'); ?> </span>
            </div>
            <div>
                بڕوانامە  :  <span> <?php echo htmlspecialchars($teacher->certificate, ENT_QUOTES, 'UTF-8'); ?> </span>
            </div>
        </div>
        <div class="rhb-left">
        <?php 
        
            $daily_avalable= Daily_Info::daily_avalable(htmlspecialchars($_GET['id'], ENT_QUOTES, 'UTF-8')); 
        ?>
            <div>
                ژمارەی سەردان :  <span><?php echo htmlspecialchars($daily_avalable, ENT_QUOTES, 'UTF-8'); ?></span> ڕۆژ
            </div>

            <div>
                بری کریی یەک سەردان  :  <span>  <?php echo htmlspecialchars($teacher->one_day_money, ENT_QUOTES, 'UTF-8'); ?> </span> دینار
            </div>
            <div>
                کۆی گشتی :  <span>  <?php echo htmlspecialchars($teacher->one_day_money*$daily_avalable, ENT_QUOTES, 'UTF-8'); ?> </span> ڕۆژ
            </div>
        </div>
        </div>
        </div>

        <br>
        <br>
        <?php
        $teacher_infos=Daily_Info::find_all();
        $i=1;
        foreach($teacher_infos as $weeks){
            while($i<=$weeks->num_week){
                if($weeks->num_week==$i && $weeks->teacher_id==$_GET['id'] && $weeks->month==$_GET['month']) {
?>

    <div class="weekly_info">
        <?php
        if($weeks->month==$_GET['month']){
         $department_name=Department::find_by_id(htmlspecialchars($weeks->department, ENT_QUOTES, 'UTF-8'));
?>
        <div>بەشی زانستی :&nbsp; <span><?php echo htmlspecialchars($department_name->department_name, ENT_QUOTES, 'UTF-8'); ?></span> </div>    
<?php }else{?>
    <div>بەشی زانستی :&nbsp; <span></span> </div>    

<?php }?>
    </div>

    <div class="r-main" style="margin-top: 10px !important;">

        <table style="margin-top: 10px !important;">
        <thead>
                <th>زنجیرە</th>
                <th>ڕۆژ</th>
                <th>بەروار</th>
                <th>ناوی وانە</th>
                <th>قۆناغ</th>
            </thead>
            <tbody>   
                <?php 
                $a=1;
                    foreach($teacher_infos as $teacher_info){
                        if($teacher_info->teacher_id==$_GET['id']){
                            if($teacher_info->num_week==$i && $teacher_info->month==$_GET['month']){
                ?>
                <tr>
                    <td><?php echo htmlspecialchars($a++, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php echo htmlspecialchars($teacher_info->day, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php echo htmlspecialchars($teacher_info->date, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php echo htmlspecialchars($teacher_info->lesson_name, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php echo htmlspecialchars($teacher_info->stage, ENT_QUOTES, 'UTF-8'); ?></td>
                </tr> 
                <?php 
            
        } }
            } ?>
            </tbody> 
            </table>

  
        </div>           
        
        <br>
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
                        <span> <?php  echo htmlspecialchars($teacher->fullname, ENT_QUOTES, 'UTF-8'); ?></span>
                    </div>
                    <div>
                        بڕیاردەری بەش
                        <br>
                        <?php foreach($staffs as $staff){ ?>
                        <span>
                             <?php if($staff->responsibility_id==2){echo htmlspecialchars($staff->name, ENT_QUOTES, 'UTF-8');}else{null;} ?>
                        </span>
                        <?php } ?>
                    </div>
                    <div>
                        سەرۆکی بەش
                        <br>
                        <?php foreach($staffs as $staff){ ?>
                        <span>
                             <?php if($staff->responsibility_id==3){echo htmlspecialchars($staff->name, ENT_QUOTES, 'UTF-8');}else{null;} ?>
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
                             <?php if($staff->responsibility_id==4){echo htmlspecialchars($staff->name, ENT_QUOTES, 'UTF-8');}else{null;} ?>
                        </span>
                        <?php } ?>
                </div>
                    <div>
                        لێپرسراوی زانستی
                        <br>
                        <?php foreach($staffs as $staff){ ?>
                        <span>
                             <?php if($staff->responsibility_id==5){echo htmlspecialchars($staff->name, ENT_QUOTES, 'UTF-8');}else{null;} ?>
                        </span>
                        <?php } ?>
                </div>
                    <div>
                        لێپرسراوی وردبینی
                        <br>
                        <?php foreach($staffs as $staff){ ?>
                        <span>
                             <?php if($staff->responsibility_id==6){echo htmlspecialchars($staff->name, ENT_QUOTES, 'UTF-8');}else{null;} ?>
                        </span>
                        <?php } ?>
                </div>
                    <div>
                         ڕاگر
                        <br>
                        <?php foreach($staffs as $staff){ ?>
                        <span>
                             <?php if($staff->responsibility_id==1){echo htmlspecialchars($staff->name, ENT_QUOTES, 'UTF-8');}else{null;} ?>
                        </span>
                        <?php } ?>
                </div>
                </div>
        </div>

    </div>
</body>
</html>