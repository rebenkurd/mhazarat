

<?php include('configs/init.php'); ?>
<form method="POST">
    <td>
        <?php 
    if(isset($_GET['teacher_id'])){
        $teacher=Teacher::find_by_id(htmlspecialchars($_GET['teacher_id'], ENT_QUOTES, 'UTF-8')); ?>
        <input class="form-controll" style="width: 90px;" type="text" name="" id="teacher_id" value="<?php echo htmlspecialchars($teacher->id, ENT_QUOTES, 'UTF-8') ; ?>" placeholder="کۆدی وانەبێژ">
        <?php }else{ ?>
        <input class="form-controll" style="width: 90px;" type="text" name="" id="teacher_id" placeholder="کۆدی وانەبێژ">
        <?php }?>
    </td>
    <td><input class="form-controll" style="width: 100px;" type="date" name="" id="date"
            placeholder="بەرواری هاتن"></td>
    <td><input class="form-controll" style="width: 100px;" type="text" name="" id="day"
            placeholder="ڕۆژی هاتن"> </td>
    <td><input class="form-controll" style="width: 100px;" type="text" name="" id="num_week"
            placeholder="ژ.هەفتە"></td>
    <td>
        <?php 
    if(isset($_GET['teacher_id'])){
        $teacher=Teacher::find_by_id(htmlspecialchars($_GET['teacher_id'], ENT_QUOTES, 'UTF-8')); ?>
        <input class="form-controll" style="width: 150px;" type="text" name="" id="fullname"
            value="<?php echo htmlspecialchars($teacher->fullname, ENT_QUOTES, 'UTF-8'); ?>" placeholder="ناوی سیانی وانەبێژ">
        <?php }else{ ?>
        <input class="form-controll" style="width: 150px;" type="text" name="" id="fullname"
            placeholder="ناوی سیانی وانەبێژ">
        <?php }?>
    </td>

    <td>
        <select name="" id="department" style="width:180px;" class="form-controll" id="">
        <option value="" disabled selected>بەشێک هەڵبژێرە</option>
            <?php
        $departments=Department::find_all();
        foreach($departments as $department): 
    ?>
            <option value="<?php echo htmlspecialchars($department->id, ENT_QUOTES, 'UTF-8'); ?>">
                <?php echo htmlspecialchars($department->department_name, ENT_QUOTES, 'UTF-8'); ?>
            </option>
            <?php endforeach; ?>
        </select>
    </td>

    <td>
        <select name="" class="form-controll" id="stage">
            <option value=""></option>
            <option value="1">1</option>
            <option value="2">2</option>
        </select>
    </td>

    <td >
        <select name="" id="lesson" class="form-controll" style="width:180px;" >
            <option value="" disabled selected>وانەیەک هەڵبژێرە</option>
        </select>

    </td>
    <td>
        <select name="" class="form-controll" id="start_time">
            <option value=""></option>
            <?php
        $times=Time::find_all();
        foreach($times as $time): 
    ?>
            <option value="<?php echo htmlspecialchars($time->times, ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars($time->times, ENT_QUOTES, 'UTF-8'); ?></option>
            <?php endforeach; ?>
        </select>
    </td>

    <td>
        <select name="" class="form-controll" id="end_time">
            <option value=""></option>
            <?php
        $times=Time::find_all();
        foreach($times as $time): 
    ?>
            <option value="<?php echo htmlspecialchars($time->times, ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars($time->times, ENT_QUOTES, 'UTF-8'); ?></option>
            <?php endforeach; ?>
        </select>
    </td>
    <td>
        <textarea name="" style="width:180px;" class="form-controll" id="note" rows="1"></textarea>
    </td>
    <td><button type="button" onclick="submit()" name="" id="add_info" class="btn btn-primary">زیادکردن</button></td>
</form>
