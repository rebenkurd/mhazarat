<?php
include("configs/init.php");

    if(isset($_GET['teacher_id'])&&isset($_GET['month']) && !empty($_GET['month'])){
    $teacher=Teacher::find_by_id(intval(htmlspecialchars($_GET['teacher_id'], ENT_QUOTES, 'UTF-8')));
    if($teacher->contract !=0){
?>
    <a href="report_out.php?id=<?php echo htmlspecialchars($teacher->id, ENT_QUOTES, 'UTF-8'); ?>&month=<?php echo htmlspecialchars($_GET['month'], ENT_QUOTES, 'UTF-8');?>" onclick="window.open('report_sign_out.php?id=<?php echo htmlspecialchars($teacher->id, ENT_QUOTES, 'UTF-8'); ?>&month=<?php echo htmlspecialchars($_GET['month'], ENT_QUOTES, 'UTF-8');?>')" target="blank" class="btn btn-success w-50"> ڕاپۆرتی دەرەکی</a>
    <?php }} ?>
    
<?php
    if(isset($_GET['teacher_id'])&&isset($_GET['month']) && !empty($_GET['month'])){
    $teacher=Teacher::find_by_id(intval(htmlspecialchars($_GET['teacher_id'], ENT_QUOTES, 'UTF-8')));
    if($teacher->contract !=1){

?>
    <a href="report_in.php?id=<?php echo htmlspecialchars($teacher->id, ENT_QUOTES, 'UTF-8'); ?>&month=<?php echo htmlspecialchars($_GET['month'], ENT_QUOTES, 'UTF-8');?>" target="blank" class="btn btn-success w-50"> پێشاندانی ڕاپۆرت</a>
    <?php }} ?>

<?php
    if(isset($_GET['teacher_id'])&&isset($_GET['month']) && !empty($_GET['month'])){
    $teacher=Teacher::find_by_id(intval(htmlspecialchars($_GET['teacher_id'], ENT_QUOTES, 'UTF-8')));
    if($teacher->contract !=1){

?>
<br>
<br>
    <a href="report_one_teacher.php?id=<?php echo htmlspecialchars($teacher->id, ENT_QUOTES, 'UTF-8'); ?>&month=<?php echo htmlspecialchars($_GET['month'], ENT_QUOTES, 'UTF-8');?>" target="blank" class="btn btn-primary w-50"> پێشاندانی ڕاپۆرتی مانگ</a>
    <?php }} ?>

