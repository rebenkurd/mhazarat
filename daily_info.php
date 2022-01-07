<?php require_once("configs/init.php"); ?>
<div class="table-board">

<div class="table-info">
<form action="" method="get">
    <div class="table-select my-1">
        <label for="teachers">گەڕان : </label>
        <div class="teachers">
            <?php                     
                $teachers=Teacher::find_all();
                foreach($teachers as $teacher){
            ?>
            <a href="index.php?teacher_id=<?php echo $teacher->id; ?>"><?php echo $teacher->fullname; ?></a>

            <?php } ?>

        </div>
    </div>
</form>
<?php
    if(isset($_GET['teacher_id'])){
    $teacher=Teacher::find_by_id(intval($_GET['teacher_id']));
?>
<div class="teacher-code my-1">
    <label for="">کۆدی وانەبێژ : </label>
    <input type="text" class="form-controll" id="teacher-id" disabled value="<?php echo $teacher->id; ?>"
        placeholder="کۆدی وانەبێژ">
    <input type="text" class="form-controll" id="teacher-contract" disabled
        value="<?php echo $teacher->contract; ?>" placeholder="">
</div>
<div class="fullname my-1">
    <label for="">ناوی سیانی وانەبێژ : </label>
    <input type="text" class="form-controll" id="teacher-fullname" disabled
        value="<?php echo $teacher->fullname; ?>" placeholder="ناوی سیانی وانەبێژ">
</div>
<?php }else{ ?>
<div class="teacher-code my-1">
    <label for="">کۆدی وانەبێژ : </label>
    <input type="text" class="form-controll" id="teacher-id" disabled value="" placeholder="کۆدی وانەبێژ">
    <input type="text" class="form-controll" id="teacher-contract" disabled value="" placeholder="">
</div>
<div class="fullname my-1">
    <label for="">ناوی سیانی وانەبێژ : </label>
    <input type="text" class="form-controll" id="teacher-fullname" disabled value=""
        placeholder="ناوی سیانی وانەبێژ">
</div>

<?php } ?>
</div>
<div class="date-board">
<div class="day mx-1">
    <label for="day">ڕۆژ : </label>
    <?php                     
        $days=Day::find_all();
        if(isset($_GET['teacher_id'])){
            foreach($days as $day){
    ?>
    <a href="index.php?teacher_id=<?php echo $_GET['teacher_id']; ?>&day=<?php echo $day->day; if(isset($_GET['year'])){ echo "&year=".$_GET['year'];}; ?>"><?php echo $day->day; ?></a>
    <?php }
  }else{ 
    $days=Day::find_all();
        foreach($days as $day){
      ?>

    <a href=""><?php echo $day->day; ?></a>
  
    <?php }} ?>
</div>
<div class="year mx-1">
    <label for="year">ساڵ : </label>
    <?php                     
        $years=Year::find_all();
        if(isset($_GET['teacher_id'])){
        foreach($years as $year){
    ?>
    <a href="index.php?teacher_id=<?php echo $_GET['teacher_id']; if(isset($_GET['day'])){ echo "&day=".$_GET['day'];} ?>&year=<?php echo $year->year; ?>"><?php echo $year->year; ?></a>
    <?php }}else{
        $years=Year::find_all();
        foreach($years as $year){
        ?>
    <a href=""><?php echo $year->year; ?></a>
<?php }} ?>
</div>
</div>

<div class="month-report">
<div class="show-report">
    <button onclick="btnOpenModel()" class="btn btn-success w-50">پێشاندانی ڕاپۆرت</button>
    <div class="back-model">
        <div class="model">
            <form action="">
                <div class="model-header">
                    ڕاپۆرت
                </div>
                <div class="model-body">
                    <div class="input-gropu">
                        <label for="">ڕۆژی یەکەم داخڵ بکە</label>
                        <input type="text" class="form-controll" placeholder="ڕۆژی یەکەم داخڵ بکە">
                    </div>
                    <div class="input-gropu">
                        <label for="">ڕۆژی کۆتایی داخڵ بکە</label>
                        <input type="text" class="form-controll" placeholder="ڕۆژی کۆتای داخڵ بکە">
                    </div>
                </div>
                <div class="model-footer">
                    <button type="submit" class="btn btn-success">باشە</button>
                    <button class="btn btn-danger close" onclick="btnCloseModel()">لابردن</button>
                </div>
            </form>
        </div>
    </div>
</div>
<button onclick="btnOpenModel()" class="btn btn-primary w-50">ڕاپۆرتی مانگ</button>
<div class="back-model">
    <div class="model">
        <form action="">
            <div class="model-header">
                ڕاپۆرتی مـانگانە
            </div>
            <div class="model-body">
                <div class="input-gropu">
                    <label for="">ڕۆژی یەکەم داخڵ بکە</label>
                    <input type="text" class="form-controll" placeholder="ڕۆژی یەکەم داخڵ بکە">
                </div>
                <div class="input-gropu">
                    <label for="">ڕۆژی کۆتایی داخڵ بکە</label>
                    <input type="text" class="form-controll" placeholder="ڕۆژی کۆتای داخڵ بکە">
                </div>
            </div>
            <div class="model-footer">
                <button type="submit" class="btn btn-success">باشە</button>
                <button class="btn btn-danger close" onclick="btnCloseModel()">لابردن</button>
            </div>
        </form>
    </div>
</div>

</div>
</div>
<table id="table" class="display" style="width:100%">
        <thead>
            <tr>
                <th>کۆدی وانەبێژ</th>
                <th>بەرواری هاتن</th>
                <th>ڕۆژی هاتن</th>
                <th>ژ.هەفتە</th>
                <th>ناوی سیانی وانەبێژ</th>
                <th>بەشی زانستی</th>
                <th>قۆناغ</th>
                <th>ناوی وانە</th>
                <th>کاتی دەستپێک</th>
                <th>کاتی تەواوبوون</th>
                <th>تێبینی</th>
                <th>کردارەکان</th>
            </tr>
        </thead>

        <tbody>


            <?php
if(!empty($_GET['teacher_id']) && empty($_GET['day']) && empty($_GET['year'])){
$teacher=Teacher::find_by_id($_GET['teacher_id']);

$daily_infos=Daily_Info::find_daily_info($teacher->id);
foreach($daily_infos as $daily_info):
?>
<tr>
<td><?php echo $daily_info->teacher_id; ?></td>
<td><?php echo $daily_info->date; ?></td>
<td><?php echo $daily_info->week; ?></td>
<td><?php echo $daily_info->num_week; ?></td>
<td><?php echo $daily_info->fullname; ?></td>
<td><?php echo $daily_info->department; ?></td>
<td><?php echo $daily_info->stage; ?></td>
<td><?php echo $daily_info->lesson_name; ?></td>
<td><?php echo $daily_info->start_time; ?></td>
<td><?php echo $daily_info->end_time; ?></td>
<td><?php echo $daily_info->note; ?></td>
<td><a
        href="delete_dayle_info.php?id=<?php echo $daily_info->id; ?>&teacher_id=<?php echo $daily_info->teacher_id; ?>"><i
        class="fas fa-trash text-danger"></i></a></td>
</tr>
<?php  endforeach; 
}else if(!empty($_GET['teacher_id']) && !empty($_GET['day'])){
    
$teacher=Teacher::find_by_id($_GET['teacher_id']);
$daily_infos=Daily_Info::find_daily_info_day($teacher->id,$_GET['day']);
foreach($daily_infos as $daily_info): ?>
<tr>
<td><?php echo $daily_info->teacher_id; ?></td>
<td><?php echo $daily_info->date; ?></td>
<td><?php echo $daily_info->week; ?></td>
<td><?php echo $daily_info->num_week; ?></td>
<td><?php echo $daily_info->fullname; ?></td>
<td><?php echo $daily_info->department; ?></td>
<td><?php echo $daily_info->stage; ?></td>
<td><?php echo $daily_info->lesson_name; ?></td>
<td><?php echo $daily_info->start_time; ?></td>
<td><?php echo $daily_info->end_time; ?></td>
<td><?php echo $daily_info->note; ?></td>
<td><a
        href="delete_dayle_info.php?id=<?php echo $daily_info->id; ?>&teacher_id=<?php echo $daily_info->teacher_id; ?>"><i
            class="fas fa-trash text-danger"></i></a></td>

</tr>

<?php endforeach; 
}else if(!empty($_GET['teacher_id']) && !empty($_GET['year'])){
    
$teacher=Teacher::find_by_id($_GET['teacher_id']);
$daily_infos=Daily_Info::find_daily_info_year($teacher->id,$_GET['year']);
foreach($daily_infos as $daily_info): ?>
<tr>
<td><?php echo $daily_info->teacher_id; ?></td>
<td><?php echo $daily_info->date; ?></td>
<td><?php echo $daily_info->week; ?></td>
<td><?php echo $daily_info->num_week; ?></td>
<td><?php echo $daily_info->fullname; ?></td>
<td><?php echo $daily_info->department; ?></td>
<td><?php echo $daily_info->stage; ?></td>
<td><?php echo $daily_info->lesson_name; ?></td>
<td><?php echo $daily_info->start_time; ?></td>
<td><?php echo $daily_info->end_time; ?></td>
<td><?php echo $daily_info->note; ?></td>
<td><a
        href="delete_dayle_info.php?id=<?php echo $daily_info->id; ?>&teacher_id=<?php echo $daily_info->teacher_id; ?>"><i
            class="fas fa-trash text-danger"></i></a></td>

</tr>

<?php endforeach; 
}else if(!empty($_GET['teacher_id']) && !empty($_GET['day']) && !empty($_GET['year'])){
    
$teacher=Teacher::find_by_id($_GET['teacher_id']);
$daily_infos=Daily_Info::find_daily_info_day_year($teacher->id,$_GET['day'],$_GET['year']);
foreach($daily_infos as $daily_info): ?>
<tr>
<td><?php echo $daily_info->teacher_id; ?></td>
<td><?php echo $daily_info->date; ?></td>
<td><?php echo $daily_info->week; ?></td>
<td><?php echo $daily_info->num_week; ?></td>
<td><?php echo $daily_info->fullname; ?></td>
<td><?php echo $daily_info->department; ?></td>
<td><?php echo $daily_info->stage; ?></td>
<td><?php echo $daily_info->lesson_name; ?></td>
<td><?php echo $daily_info->start_time; ?></td>
<td><?php echo $daily_info->end_time; ?></td>
<td><?php echo $daily_info->note; ?></td>
<td><a
    href="delete_dayle_info.php?id=<?php echo $daily_info->id; ?>&teacher_id=<?php echo $daily_info->teacher_id; ?>"><i
    class="fas fa-trash text-danger"></i></a></td>
</tr>

<?php endforeach;} ?>
<?php include("add_new_info.php"); ?>


</tbody>
</table>