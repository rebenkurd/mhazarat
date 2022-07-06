<?php

require_once("configs/init.php");

?>

<div class="table-board">
<div class="table-info">
<form action="" method="get">
    <div class="table-select my-1">
        <label for="teachers">گەڕان : </label>
        <div class="teachers">
            <select name="" id="fullname_teacher" class="form-controll props">
            <option value="">ناوی وانەبێژ</option>
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
<div>
    
<div class="date-board">
<div class="month mx-2">
    <select name="" id="month" class="form-controll props">
        <option value="" selected>مانگ</option>
    <?php                     
        $months=Month::find_all();
        foreach($months as $month){
    ?>
    <option value="<?php echo htmlspecialchars($month->month, ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars($month->month, ENT_QUOTES, 'UTF-8'); ?></option>
    <?php } ?>
    </select>
</div>

<div class="year mx-1">
    <select name="" onchange="" id="year" class="form-controll props">
        <option value="" selected>ساڵ</option>
    <?php                     
        $years=Year::find_all();
        foreach($years as $year){
    ?>
    <option value="<?php echo htmlspecialchars($year->year, ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars($year->year, ENT_QUOTES, 'UTF-8'); ?></option>
    <?php } ?>
    </select>
</div>

</div>
<div class="month-report mr-5">
<div class="show-report my-5" id="show-report">
</div>
</div>
</div>

</div>
<div class="add-new-info m-2">
    <button class="btn btn-primary" id="btn-model" type="button"><i class="fas fa-plus"></i>  زیادکردنی زانیاری ڕۆژانە</button>
<div class="back-model">
    <div class="model">
        <div class="model-header">
            ئاگاداری
        </div>
        <div class="model-body" id="addInfo"></div>
    <div class="model-footer">
        <button class="btn btn-success" type="button" onclick="submit()" id="add_info" name="">بەڵێ</button>
        <button type="button" class="btn btn-danger" id="close-model">نەخێر</button>
    </div>
    </div>
</div>
</div>
<table id="tableInfo" style="width:100%" >
<thead>
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
</thead>
<tbody id="showTable"></tbody>
</table>
</div>
