<tr>
<form action="index.php?teacher_id=<?php echo $daily_info->teacher_id; ?>" method="POST">
    <td>
        <?php 
    if(isset($_GET['teacher_id'])){
        $teacher=Teacher::find_by_id($_GET['teacher_id']); ?>
        <input class="form-controll" style="width: 90px;" type="text" name="teacher_id" value="<?php echo $teacher->id; ?>" placeholder="کۆدی وانەبێژ">
        <?php }else{ ?>
        <input class="form-controll" style="width: 90px;" type="text" name="teacher_id" placeholder="کۆدی وانەبێژ">
        <?php }?>
    </td>
    <td><input class="form-controll" style="width: 100px;" type="date" name="date"
            placeholder="بەرواری هاتن"></td>
    <td><input class="form-controll" style="width: 100px;" type="text" name="day"
            placeholder="ڕۆژی هاتن"> </td>
    <td><input class="form-controll" style="width: 100px;" type="text" name="num_week"
            placeholder="ژ.هەفتە"></td>
    <td>
        <?php 
if(isset($_GET['teacher_id'])){
$teacher=Teacher::find_by_id($_GET['teacher_id']); ?>
        <input class="form-controll" style="width: 150px;" type="text" name="fullname"
            value="<?php echo $teacher->fullname; ?>" placeholder="ناوی سیانی وانەبێژ">
        <?php }else{ ?>
        <input class="form-controll" style="width: 150px;" type="text" name="fullname"
            placeholder="ناوی سیانی وانەبێژ">
        <?php }?>
    </td>

    <td>
        <select name="department" style="width:180px;" class="form-controll" id="">
            <option value=""></option>
            <?php
        $departments=Department::find_all();
        foreach($departments as $department): 
    ?>
            <option value="<?php echo $department->department_name; ?>">
                <?php echo $department->department_name; ?>
            </option>
            <?php endforeach; ?>
        </select>
    </td>

    <td>
        <select name="stage" class="form-controll" id="">
            <option value=""></option>
            <option value="1">1</option>
            <option value="2">2</option>
        </select>
    </td>

    <td >
        <select name="lesson" class="form-controll" style="width:180px;" id="">
            <option value=""></option>
            <?php
        $lessons=Lesson::find_all();
        foreach($lessons as $lesson): 
    ?>
            <option value="<?php echo $lesson->lesson; ?>"><?php echo $lesson->lesson; ?>
            </option>
            <?php endforeach; ?>
        </select>
    </td>

    <td>
        <select name="start_time" class="form-controll" id="">
            <option value=""></option>
            <?php
        $times=Time::find_all();
        foreach($times as $time): 
    ?>
            <option value="<?php echo $time->times; ?>"><?php echo $time->times; ?></option>
            <?php endforeach; ?>
        </select>
    </td>

    <td>
        <select name="end_time" class="form-controll" id="">
            <option value=""></option>
            <?php
        $times=Time::find_all();
        foreach($times as $time): 
    ?>
            <option value="<?php echo $time->times; ?>"><?php echo $time->times; ?></option>
            <?php endforeach; ?>
        </select>
    </td>
    <td>
        <textarea name="note" style="width:180px;" class="form-controll" id="" rows="1"></textarea>
    </td>
    <td><button type="submit" name="submit" class="btn btn-primary">زیادکردن</button></td>
</form>
</tr>