<?php

require_once("configs/init.php"); ?>
<div class="table-board">

<div class="table-info">
<form action="" method="get">
    <div class="table-select my-1">
        <label for="teachers">گەڕان : </label>
        <div class="teachers">
            <select name="" id="fullname_teacher" class="form-controll" onchange="getTeacher();">
            <option value="" disabled selected>ناوی وانەبێژ</option>
            <?php                     
                $teachers=Teacher::find_all();
                foreach($teachers as $teacher){
            ?>
            <option id="item" value="<?php echo $teacher->id; ?>"><?php echo $teacher->fullname; ?></option>
            <?php } ?> 
            </select>
<a href="" class="btn btn-success" id="teacher_value">گەڕان</a>
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
    <select name="" id="day" class="form-controll" onchange="getDayandYear()">
    <option value="" selected>ڕۆژ</option>
    <?php                     
        $days=Day::find_all();
        foreach($days as $day){
    ?>
    <option value="<?php echo $day->day; ?>"><?php echo $day->day; ?></option>
    <?php } ?>
    </select>

</div>



<div class="year mx-1">
    <label for="year">ساڵ : </label>
    <select name="" id="year" class="form-controll" onchange="getDayandYear()">
        <option value="" selected>ساڵ</option>
    <?php                     
        $years=Year::find_all();
        foreach($years as $year){
    ?>
    <option value="<?php echo $year->year; ?>"><?php echo $year->year; ?></option>
    <?php } ?>
    </select>
</div>

<a href="" id="both_value" class="btn btn-success">باشە</a>

</div>

<div class="month-report">
<div class="show-report my-5">


<?php
    if(isset($_GET['teacher_id'])){
    $teacher=Teacher::find_by_id(intval($_GET['teacher_id']));
?>
    <a href="report_out.php?id=<?php echo $teacher->id; ?>" target="blank" class="btn btn-success w-50"> ڕاپۆرتی دەرەکی</a>
    <?php }?>

    
    <br>
    <br>


<?php
    if(isset($_GET['teacher_id'])){
    $teacher=Teacher::find_by_id(intval($_GET['teacher_id']));
?>
    <a href="report_one_teacher.php?id=<?php echo $teacher->id; ?>" onclick="window.open('report_in.php?id=<?php echo $teacher->id; ?>');" target="blank" class="btn btn-success w-50"> پێشاندانی ڕاپۆرت</a>
    <?php }?>


</div>

<a href="" class="btn btn-primary w-50">ڕاپۆرتی مانگ</a>
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



<script>

function getTeacher(){
   var selectedTeacher= document.getElementById("fullname_teacher").value;
        document.getElementById("teacher_value").href="index.php?teacher_id="+selectedTeacher;
}
getTeacher();
getDayandYear();


<?php if(isset($_GET['teacher_id'])){ ?>

function getDayandYear(){
    var selectedDay=document.getElementById("day").value; 
    var selectedYear=document.getElementById("year").value; 
    var selectedTeach= <?php echo $_GET['teacher_id']; ?>;
    
    if(selectedDay.value!="" && selectedYear!=""){
        document.getElementById("both_value").href="index.php?teacher_id="+selectedTeach+"&day="+selectedDay+"&year="+selectedYear;
    }else if (selectedDay.value!="" && selectedYear==""){
        document.getElementById("both_value").href="index.php?teacher_id="+selectedTeach+"&day="+selectedDay;
    }else if(selectedDay.value=="" && selectedYear!=""){
        document.getElementById("both_value").href="index.php?teacher_id="+selectedTeach+"&year="+selectedYear;
    }else{
        document.getElementById("both_value").href="index.php?teacher_id="+selectedTeach;
    }

}

<?php } ?>


</script>
