<?php
require_once("configs/init.php");

$teacher=Teacher::find_by_id($_GET['id']);
if($teacher->contract !=0){
    RedirectTo("report_out.php?id=".$_GET['id']);
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
            <span>فۆڕمی واژووی وانەبیژ</span>
            <br>
            <span>٢٠٢١ - ٢٠٢٢</span>
        </div>
        <div class="r-header-bottom">
        <?php
            
            $teacher=Teacher::find_by_id($_GET['id']);

        ?>
            <div class="rhb-right">
            <div>
            کۆدی مامۆستا: <span> <?php echo $teacher->id; ?> </span>
            </div>
            <div>
            ناوی مامۆستا : <span> <?php echo $teacher->fullname; ?>  </span>
            </div>

        </div>
        <div class="rhb-left">

        <div>
        نازناو :  <span> <?php echo $teacher->nickname; ?> </span>
            </div>
            <div>
            بڕوانامە  :  <span> <?php echo $teacher->certificate; ?> </span>
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
    </div>
</body>
</html>