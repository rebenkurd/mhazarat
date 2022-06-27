<?php
include("configs/init.php");
$lesson=Lesson::find_by_deptartment_id($_GET['ds']);
?>
<option  value="<?php echo htmlspecialchars($lesson->lesson, ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars($lesson->lesson, ENT_QUOTES, 'UTF-8'); ?>
</option>
