



<?php
include("configs/init.php");

    if(isset($_GET['teacher_id'])){
    $teacher=Teacher::find_by_id(intval(htmlspecialchars($_GET['teacher_id'], ENT_QUOTES, 'UTF-8')));
?>
<div class="teacher-code my-1">
    <label for="">کۆدی وانەبێژ : </label>
    <input type="text" class="form-controll" id="teacher-id" disabled value="<?php echo htmlspecialchars($teacher->id, ENT_QUOTES, 'UTF-8'); ?>"
        placeholder="کۆدی وانەبێژ">
    <input type="text" class="form-controll" id="teacher-contract" disabled
        value="<?php echo htmlspecialchars($teacher->contract, ENT_QUOTES, 'UTF-8'); ?>" placeholder="">
</div>
<div class="fullname my-1">
    <label for="">ناوی سیانی وانەبێژ : </label>
    <input type="text" class="form-controll" id="teacher-fullname" disabled
        value="<?php echo htmlspecialchars($teacher->fullname, ENT_QUOTES, 'UTF-8'); ?>" placeholder="ناوی سیانی وانەبێژ">
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