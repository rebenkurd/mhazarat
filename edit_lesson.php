<?php include('includes/header.php'); ?>
<?php 
if(empty($_GET['id'])){
    RedirectTo("lessons.php");
}else{
    $lesson=Lesson::find_by_id(htmlspecialchars($_GET['id'], ENT_QUOTES, 'UTF-8'));
    if(isset($_POST['update'])){
        htmlspecialchars($lesson->lesson=trim(filter_var($_POST['lesson'],FILTER_DEFAULT)), ENT_QUOTES, 'UTF-8');
        htmlspecialchars($lesson->department_id=trim(filter_var($_POST['department_id'],FILTER_SANITIZE_NUMBER_INT)), ENT_QUOTES, 'UTF-8');
        htmlspecialchars($lesson->recycle=0, ENT_QUOTES, 'UTF-8');
        if($lesson->save()){
            $_SESSION['SuccessMessage']="بە سەرکەوتوی زیادکرا";
            RedirectTo("lessons.php");
        }else{
            // $_SESSION['ErrorMessage']=join("<br>",$teacher->errors);
            RedirectTo("edit_lesson.php");
        }
    }
}
?>
<?php include('includes/top_nav.php'); ?>
    <div class="main">
    <?php include('includes/side_nav.php'); ?>
    <div class="container">
        <h1>زیادکردنی وانە</h1>
        <div class="content">

        <form action="" class="form" method="POST">
        <?php echo $session->SuccessMessage(); ?>
        <?php echo $session->ErrorMessage(); ?>
                <div class="input-group">
                    <label for="lesson">ناوی وانە</label>
                    <input class="form-controll" value="<?php echo htmlspecialchars($lesson->lesson, ENT_QUOTES, 'UTF-8'); ?>" type="text" placeholder="ناوی وانە" name="lesson" id="lesson">
                </div>
                <div class="input-group">
                    <label for="department_id">ناوی وانە</label>
                    <select class="form-controll" id="department_id" name="department_id">
                        <?php 
                            $departments=Department::find_all();
                            foreach($departments as $department){
                                if($department->recycle==0){
                        ?>
                        <option value="<?php echo htmlspecialchars($department->id, ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars($department->department_name, ENT_QUOTES, 'UTF-8'); ?></option>
                        <?php }} ?>
                    </select>
                </div>
                <button type="submit" name="update" class="btn btn-success width-25">پاشەکەوتکردن</button>
            </form>

        </div>
    </div>

<?php include('includes/footer.php'); ?>