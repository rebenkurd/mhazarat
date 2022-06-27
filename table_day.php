
<?php
include("configs/init.php");




if(!empty($_GET['teacher_id']) && empty($_GET['day']) && empty($_GET['year']) && empty($_GET['month'])){
$teacher=Teacher::find_by_id(htmlspecialchars($_GET['teacher_id'], ENT_QUOTES, 'UTF-8'));

$daily_infos=Daily_Info::find_daily_info(htmlspecialchars($teacher->id, ENT_QUOTES, 'UTF-8'));
foreach($daily_infos as $daily_info):
?>
<tr>
<td><?php echo htmlspecialchars($daily_info->teacher_id, ENT_QUOTES, 'UTF-8'); ?></td>
<td><?php echo htmlspecialchars($daily_info->date, ENT_QUOTES, 'UTF-8'); ?></td>
<td><?php echo htmlspecialchars($daily_info->week, ENT_QUOTES, 'UTF-8'); ?></td>
<td><?php echo htmlspecialchars($daily_info->num_week, ENT_QUOTES, 'UTF-8'); ?></td>
<td><?php echo htmlspecialchars($daily_info->fullname, ENT_QUOTES, 'UTF-8'); ?></td>
<td>
<?php 
$department=Department::find_by_id(htmlspecialchars($daily_info->department, ENT_QUOTES, 'UTF-8'));
echo htmlspecialchars($department->department_name, ENT_QUOTES, 'UTF-8'); 
?>
</td>
<td><?php echo htmlspecialchars($daily_info->stage, ENT_QUOTES, 'UTF-8'); ?></td>
<td><?php echo htmlspecialchars($daily_info->lesson_name, ENT_QUOTES, 'UTF-8'); ?></td>
<td><?php echo htmlspecialchars($daily_info->start_time, ENT_QUOTES, 'UTF-8'); ?></td>
<td><?php echo htmlspecialchars($daily_info->end_time, ENT_QUOTES, 'UTF-8'); ?></td>
<td><?php echo htmlspecialchars($daily_info->note, ENT_QUOTES, 'UTF-8'); ?></td>
<td><a
href="delete_dayle_info.php?id=<?php echo htmlspecialchars($daily_info->id, ENT_QUOTES, 'UTF-8'); ?>&teacher_id=<?php echo htmlspecialchars($daily_info->teacher_id, ENT_QUOTES, 'UTF-8'); ?>"><i
class="fas fa-trash text-danger"></i></a></td>
</tr>
<?php  endforeach; 
}else if(!empty($_GET['teacher_id']) && !empty($_GET['day'])){

$teacher=Teacher::find_by_id(htmlspecialchars($_GET['teacher_id'], ENT_QUOTES, 'UTF-8'));
$daily_infos=Daily_Info::find_daily_info_day(htmlspecialchars($teacher->id, ENT_QUOTES, 'UTF-8'),htmlspecialchars($_GET['day'], ENT_QUOTES, 'UTF-8'));
foreach($daily_infos as $daily_info): ?>
<tr>
<td><?php echo htmlspecialchars($daily_info->teacher_id, ENT_QUOTES, 'UTF-8'); ?></td>
<td><?php echo htmlspecialchars($daily_info->date, ENT_QUOTES, 'UTF-8'); ?></td>
<td><?php echo htmlspecialchars($daily_info->week, ENT_QUOTES, 'UTF-8'); ?></td>
<td><?php echo htmlspecialchars($daily_info->num_week, ENT_QUOTES, 'UTF-8'); ?></td>
<td><?php echo htmlspecialchars($daily_info->fullname, ENT_QUOTES, 'UTF-8'); ?></td>
<td>
<?php 
$department=Department::find_by_id(htmlspecialchars($daily_info->department, ENT_QUOTES, 'UTF-8'));
echo htmlspecialchars($department->department_name, ENT_QUOTES, 'UTF-8'); 
?>
</td>
<td><?php echo htmlspecialchars($daily_info->stage, ENT_QUOTES, 'UTF-8'); ?></td>
<td><?php echo htmlspecialchars($daily_info->lesson_name, ENT_QUOTES, 'UTF-8'); ?></td>
<td><?php echo htmlspecialchars($daily_info->start_time, ENT_QUOTES, 'UTF-8'); ?></td>
<td><?php echo htmlspecialchars($daily_info->end_time, ENT_QUOTES, 'UTF-8'); ?></td>
<td><?php echo htmlspecialchars($daily_info->note, ENT_QUOTES, 'UTF-8'); ?></td>
<td><a
href="delete_dayle_info.php?id=<?php echo htmlspecialchars($daily_info->id, ENT_QUOTES, 'UTF-8'); ?>&teacher_id=<?php echo htmlspecialchars($daily_info->teacher_id, ENT_QUOTES, 'UTF-8'); ?>"><i
class="fas fa-trash text-danger"></i></a></td>
</tr>

<?php endforeach; 
}else if(!empty($_GET['teacher_id']) && !empty($_GET['year'])){

$teacher=Teacher::find_by_id(htmlspecialchars($_GET['teacher_id'], ENT_QUOTES, 'UTF-8'));
$daily_infos=Daily_Info::find_daily_info_year($teacher->id,$_GET['year'], ENT_QUOTES, 'UTF-8');
foreach($daily_infos as $daily_info): ?>
<tr>
<td><?php echo htmlspecialchars($daily_info->teacher_id, ENT_QUOTES, 'UTF-8'); ?></td>
<td><?php echo htmlspecialchars($daily_info->date, ENT_QUOTES, 'UTF-8'); ?></td>
<td><?php echo htmlspecialchars($daily_info->week, ENT_QUOTES, 'UTF-8'); ?></td>
<td><?php echo htmlspecialchars($daily_info->num_week, ENT_QUOTES, 'UTF-8'); ?></td>
<td><?php echo htmlspecialchars($daily_info->fullname, ENT_QUOTES, 'UTF-8'); ?></td>
<td>
<?php 
$department=Department::find_by_id(htmlspecialchars($daily_info->department, ENT_QUOTES, 'UTF-8'));
echo htmlspecialchars($department->department_name, ENT_QUOTES, 'UTF-8'); 
?>
</td>
<td><?php echo htmlspecialchars($daily_info->stage, ENT_QUOTES, 'UTF-8'); ?></td>
<td><?php echo htmlspecialchars($daily_info->lesson_name, ENT_QUOTES, 'UTF-8'); ?></td>
<td><?php echo htmlspecialchars($daily_info->start_time, ENT_QUOTES, 'UTF-8'); ?></td>
<td><?php echo htmlspecialchars($daily_info->end_time, ENT_QUOTES, 'UTF-8'); ?></td>
<td><?php echo htmlspecialchars($daily_info->note, ENT_QUOTES, 'UTF-8'); ?></td>
<td><a
href="delete_dayle_info.php?id=<?php echo htmlspecialchars($daily_info->id, ENT_QUOTES, 'UTF-8'); ?>&teacher_id=<?php echo htmlspecialchars($daily_info->teacher_id, ENT_QUOTES, 'UTF-8'); ?>"><i
class="fas fa-trash text-danger"></i></a></td>

</tr>

<?php endforeach; 
}else if(!empty($_GET['teacher_id']) && !empty($_GET['month'])){

$teacher=Teacher::find_by_id($_GET['teacher_id']);
$daily_infos=Daily_Info::find_daily_info_month($teacher->id,$_GET['month']);
foreach($daily_infos as $daily_info): ?>
<tr>
<td><?php echo htmlspecialchars($daily_info->teacher_id, ENT_QUOTES, 'UTF-8'); ?></td>
<td><?php echo htmlspecialchars($daily_info->date, ENT_QUOTES, 'UTF-8'); ?></td>
<td><?php echo htmlspecialchars($daily_info->week, ENT_QUOTES, 'UTF-8'); ?></td>
<td><?php echo htmlspecialchars($daily_info->num_week, ENT_QUOTES, 'UTF-8'); ?></td>
<td><?php echo htmlspecialchars($daily_info->fullname, ENT_QUOTES, 'UTF-8'); ?></td>
<td>
<?php 
$department=Department::find_by_id(htmlspecialchars($daily_info->department, ENT_QUOTES, 'UTF-8'));
echo htmlspecialchars($department->department_name, ENT_QUOTES, 'UTF-8'); 
?>
</td>
<td><?php echo htmlspecialchars($daily_info->stage, ENT_QUOTES, 'UTF-8'); ?></td>
<td><?php echo htmlspecialchars($daily_info->lesson_name, ENT_QUOTES, 'UTF-8'); ?></td>
<td><?php echo htmlspecialchars($daily_info->start_time, ENT_QUOTES, 'UTF-8'); ?></td>
<td><?php echo htmlspecialchars($daily_info->end_time, ENT_QUOTES, 'UTF-8'); ?></td>
<td><?php echo htmlspecialchars($daily_info->note, ENT_QUOTES, 'UTF-8'); ?></td>
<td><a
href="delete_dayle_info.php?id=<?php echo $daily_info->id; ?>&teacher_id=<?php echo $daily_info->teacher_id; ?>"><i
class="fas fa-trash text-danger"></i></a></td>

</tr>

<?php endforeach; 
}else if(!empty($_GET['teacher_id']) && !empty($_GET['day']) && !empty($_GET['year'])){

$teacher=Teacher::find_by_id($_GET['teacher_id']);
$daily_infos=Daily_Info::find_daily_info_day_month_year($teacher->id,$_GET['day'],$_GET['year'],$_GET['month']);
foreach($daily_infos as $daily_info): ?>
<tr>
<td><?php echo htmlspecialchars($daily_info->teacher_id, ENT_QUOTES, 'UTF-8'); ?></td>
<td><?php echo htmlspecialchars($daily_info->date, ENT_QUOTES, 'UTF-8'); ?></td>
<td><?php echo htmlspecialchars($daily_info->week, ENT_QUOTES, 'UTF-8'); ?></td>
<td><?php echo htmlspecialchars($daily_info->num_week, ENT_QUOTES, 'UTF-8'); ?></td>
<td><?php echo htmlspecialchars($daily_info->fullname, ENT_QUOTES, 'UTF-8'); ?></td>
<td>
<?php 
$department=Department::find_by_id(htmlspecialchars($daily_info->department, ENT_QUOTES, 'UTF-8'));
echo htmlspecialchars($department->department_name, ENT_QUOTES, 'UTF-8'); 
?>
</td>
<td><?php echo htmlspecialchars($daily_info->stage, ENT_QUOTES, 'UTF-8'); ?></td>
<td><?php echo htmlspecialchars($daily_info->lesson_name, ENT_QUOTES, 'UTF-8'); ?></td>
<td><?php echo htmlspecialchars($daily_info->start_time, ENT_QUOTES, 'UTF-8'); ?></td>
<td><?php echo htmlspecialchars($daily_info->end_time, ENT_QUOTES, 'UTF-8'); ?></td>
<td><?php echo htmlspecialchars($daily_info->note, ENT_QUOTES, 'UTF-8'); ?></td>
<td><a
href="delete_dayle_info.php?id=<?php echo htmlspecialchars($daily_info->id, ENT_QUOTES, 'UTF-8'); ?>&teacher_id=<?php echo htmlspecialchars($daily_info->teacher_id, ENT_QUOTES, 'UTF-8'); ?>"><i
class="fas fa-trash text-danger"></i></a></td>
</tr>

<?php endforeach;} ?>