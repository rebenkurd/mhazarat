<?php include('configs/init.php'); ?>
<div class="groups">
    <div class="input-group">
        <label for="teacher_id">کۆدی وانەبێژ</label>
        <?php 
    if(isset($_GET['teacher_id'])){
        $teacher=Teacher::find_by_id(htmlspecialchars($_GET['teacher_id'], ENT_QUOTES, 'UTF-8')); ?>
        <input class="form-controll" type="text" name="" id="teacher_id"
            value="<?php echo htmlspecialchars($teacher->id, ENT_QUOTES, 'UTF-8') ; ?>" placeholder="کۆدی وانەبێژ">
        <?php }else{ ?>
        <input class="form-controll" type="text" name="" id="teacher_id" placeholder="کۆدی وانەبێژ">
        <?php }?>
    </div>
    <div class="input-group">
        <label for="fullname">ناوی سیانی وانەبێژ</label>
        <?php 
    if(isset($_GET['teacher_id'])){
        $teacher=Teacher::find_by_id(htmlspecialchars($_GET['teacher_id'], ENT_QUOTES, 'UTF-8')); ?>
        <input class="form-controll" type="text" name="" id="fullname"
            value="<?php echo htmlspecialchars($teacher->fullname, ENT_QUOTES, 'UTF-8'); ?>"
            placeholder="ناوی سیانی وانەبێژ">
        <?php }else{ ?>
        <input class="form-controll" type="text" name="" id="fullname" placeholder="ناوی سیانی وانەبێژ">
        <?php }?>
    </div>
</div>
<div class="groups">
    <div class="input-group">
        <label for="dates">بەرواری هاتن</label>
        <input class="form-controll" type="date" onchange="change()" name="" id="dates" placeholder="بەرواری هاتن">
    </div>
    <div class="input-group">
        <label for="day_name">ڕۆژی هاتن</label>
        <input class="form-controll" type="text" name="" value="" id="day_name" placeholder="ڕۆژی هاتن">
    </div>
</div>
<div class="groups">
    <div class="input-group">
        <label for="department">بەشی زانستی</label>
        <select name="" id="department"  onchange="department()" class="form-controll" id="">
            <option value="">بەشێک هەڵبژێرە</option>
            <?php
        $departments=Department::find_all();
        foreach($departments as $department): 
    ?>
            <option value="<?php echo htmlspecialchars($department->id, ENT_QUOTES, 'UTF-8'); ?>">
                <?php echo htmlspecialchars($department->department_name, ENT_QUOTES, 'UTF-8'); ?>
            </option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="input-group">
        <label for="lesson">ناوی وانە</label>
        <select name="" id="lesson" class="form-controll">
            <option value="" selected>وانەیەک هەڵبژێرە</option>
        </select>
    </div>
</div>
<div class="groups">
    <div class="input-group">
        <label for="num_week">ژمارەی هەفتە</label>
        <input class="form-controll" title="ژ.هەفتە" type="text" name="" id="num_week">
    </div>
    <div class="input-group">
        <label for="stage">قۆناغ</label>
        <select name="" class="form-controll" id="stage">
            <option value=""></option>
            <option value="1">1</option>
            <option value="2">2</option>
        </select>
    </div>
</div>
<div class="groups">
    <div class="input-group">
        <label for="start_time">کاتی دەستپێک</label>
        <select name="" class="form-controll" id="start_time">
            <option value=""></option>
            <?php
        $times=Time::find_all();
        foreach($times as $time): 
    ?>
            <option value="<?php echo htmlspecialchars($time->times, ENT_QUOTES, 'UTF-8'); ?>">
                <?php echo htmlspecialchars($time->times, ENT_QUOTES, 'UTF-8'); ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="input-group">
        <label for="end_time">کاتی تەواوبوون</label>
        <select name="" class="form-controll" id="end_time">
            <option value=""></option>
            <?php
        $times=Time::find_all();
        foreach($times as $time): 
    ?>
            <option value="<?php echo htmlspecialchars($time->times, ENT_QUOTES, 'UTF-8'); ?>">
                <?php echo htmlspecialchars($time->times, ENT_QUOTES, 'UTF-8'); ?></option>
            <?php endforeach; ?>
        </select>
    </div>
</div>
<div class="input-group">
        <label for="note">تێبینی</label>
        <textarea name="" class="form-controll" id="note" rows="3"></textarea>
    </div>
