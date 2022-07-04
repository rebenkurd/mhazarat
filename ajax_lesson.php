<?php
include("configs/init.php");
$lessonId=Lesson::find_by_deptartment_id($_GET['ds']);
$lessons=Lesson::find_all();
if(!empty($_GET['ds'])){
foreach($lessons as $lesson):
if($lesson->department_id==$_GET['ds']){
?>
<option  value="<?php echo $lesson->lesson; ?>"><?php echo htmlspecialchars($lesson->lesson, ENT_QUOTES, 'UTF-8'); ?>
</option>
<?php }endforeach; }?>
