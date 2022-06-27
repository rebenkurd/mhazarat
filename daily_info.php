<?php

require_once("configs/init.php"); ?>
<div class="table-board">

<div class="table-info">
<form action="" method="get">
    <div class="table-select my-1">
        <label for="teachers">گەڕان : </label>
        <div class="teachers">
            <select name="" id="fullname_teacher" class="form-controll props" onchange="getTeacher();">
            <option value="" disabled selected>ناوی وانەبێژ</option>
            <?php                     
                $teachers=Teacher::find_all();
                foreach($teachers as $teacher){
                    if($teacher->recycle==0){
            ?>
            <option id="item" value="<?php echo htmlspecialchars($teacher->id, ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars($teacher->fullname, ENT_QUOTES, 'UTF-8'); ?></option>
            <?php }} ?> 
            </select>
        </div>
    </div>
</form>

<div class="" id="teacher_info">
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
</div>

</div>

<div class="date-board">
<div class="day mx-1">
    <label for="day">ڕۆژ : </label>
    <select name="" id="day" class="form-controll props" onchange="getDayandMonthandYear()">
    <option value="" selected>ڕۆژ</option>
    <?php                     
        $days=Day::find_all();
        foreach($days as $day){
    ?>
    <option value="<?php echo htmlspecialchars($day->day, ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars($day->day, ENT_QUOTES, 'UTF-8'); ?></option>
    <?php } ?>
    </select>

</div>

<div class="month mx-2">
    <label for="month">مانگ : </label>
    <select name="" id="month" class="form-controll props" onchange="getDayandMonthandYear()">
        <option value="" selected>مانگ</option>
    <?php                     
        $months=Month::find_all();
        foreach($months as $month){
    ?>
    <option value="<?php echo htmlspecialchars($month->month, ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars($month->name, ENT_QUOTES, 'UTF-8'); ?></option>
    <?php } ?>
    </select>
</div>

<div class="year mx-1">
    <label for="year">ساڵ : </label>
    <select name="" id="year" class="form-controll props" onchange="getDayandMonthandYear()">
        <option value="" selected>ساڵ</option>
    <?php                     
        $years=Year::find_all();
        foreach($years as $year){
    ?>
    <option value="<?php echo htmlspecialchars($year->year, ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars($year->year, ENT_QUOTES, 'UTF-8'); ?></option>
    <?php } ?>
    </select>
</div>



<a href="" id="thierd_value" class="btn btn-success mx-4">باشە</a>

</div>

<div class="month-report mr-5">
<div class="show-report my-5">
<?php

    if(isset($_GET['teacher_id'])&&isset($_GET['month'])){
    $teacher=Teacher::find_by_id(intval(htmlspecialchars($_GET['teacher_id'], ENT_QUOTES, 'UTF-8')));
    if($teacher->contract !=0){
?>
    <a href="report_out.php?id=<?php echo htmlspecialchars($teacher->id, ENT_QUOTES, 'UTF-8'); ?>&month=<?php echo htmlspecialchars($_GET['month'], ENT_QUOTES, 'UTF-8');?>" onclick="window.open('report_sign_out.php?id=<?php echo htmlspecialchars($teacher->id, ENT_QUOTES, 'UTF-8'); ?>&month=<?php echo htmlspecialchars($_GET['month'], ENT_QUOTES, 'UTF-8');?>')" target="blank" class="btn btn-success w-50"> ڕاپۆرتی دەرەکی</a>
    <?php }} ?>
    
<?php
    if(isset($_GET['teacher_id'])&&isset($_GET['month'])){
    $teacher=Teacher::find_by_id(intval(htmlspecialchars($_GET['teacher_id'], ENT_QUOTES, 'UTF-8')));
    if($teacher->contract !=1){

?>
    <a href="report_in.php?id=<?php echo htmlspecialchars($teacher->id, ENT_QUOTES, 'UTF-8'); ?>&month=<?php echo htmlspecialchars($_GET['month'], ENT_QUOTES, 'UTF-8');?>" target="blank" class="btn btn-success w-50"> پێشاندانی ڕاپۆرت</a>
    <?php }} ?>

<?php
    if(isset($_GET['teacher_id'])&&isset($_GET['month'])){
    $teacher=Teacher::find_by_id(intval(htmlspecialchars($_GET['teacher_id'], ENT_QUOTES, 'UTF-8')));
    if($teacher->contract !=1){

?>
<br>
<br>
    <a href="report_one_teacher.php?id=<?php echo htmlspecialchars($teacher->id, ENT_QUOTES, 'UTF-8'); ?>&month=<?php echo htmlspecialchars($_GET['month'], ENT_QUOTES, 'UTF-8');?>" target="blank" class="btn btn-primary w-50"> پێشاندانی ڕاپۆرتی مانگ</a>
    <?php }} ?>


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
        </thead>      <tr>
            <?php include("add_new_info.php"); ?>
        </tr>

        <tbody id="table_info">

  
        </tbody>
</table>



<script>

function getTeacher(){
   var selectedTeacher= document.getElementById("fullname_teacher").value;
        document.getElementById("teacher_value").href="index.php?teacher_id="+selectedTeacher;
}
getTeacher();
getDayandMonthandYear();


<?php if(isset($_GET['teacher_id'])){ ?>

function getDayandMonthandYear(){
    var selectedDay=document.getElementById("day").value; 
    var selectedYear=document.getElementById("year").value; 
    var selectedMonth=document.getElementById("month").value; 
    var selectedTeach= <?php echo $_GET['teacher_id']; ?>;
    
    if(selectedDay.value!="" && selectedYear!=""&& selectedMonth!=""){
        document.getElementById("thierd_value").href="index.php?teacher_id="+selectedTeach+"&day="+selectedDay+"&month="+selectedMonth+"&year="+selectedYear;
    }else if (selectedDay.value!="" && selectedYear=="" && selectedMonth==""){
        document.getElementById("thierd_value").href="index.php?teacher_id="+selectedTeach+"&day="+selectedDay;
    }else if(selectedYear!="" || selectedDay.value=="" && selectedMonth==""){
        document.getElementById("thierd_value").href="index.php?teacher_id="+selectedTeach+"&year="+selectedYear;
    }else if(selectedMonth !="" || selectedDay.value=="" && selectedYear ==""){
        document.getElementById("thierd_value").href="index.php?teacher_id="+selectedTeach+"&month="+selectedMonth;
    }else{
        document.getElementById("thierd_value").href="index.php?teacher_id="+selectedTeach;
    }

}

<?php } ?>


</script>
