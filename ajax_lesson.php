<?php
include("configs/init.php");

$lesson=Lesson::find_by_deptartment_id($_POST['ds']);
if($lesson->department_id==$_POST['ds']){
?>
<option  value="<?php echo htmlspecialchars($lesson->lesson, ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars($lesson->lesson, ENT_QUOTES, 'UTF-8'); ?>
</option>
<?php }else{?>
 <option value="" disabled>هیچ وانەیەک نییە</option>
<?php }?>