<?php include('includes/header.php'); ?>
<?php 
    if(isset($_POST['submit'])){
        $lesson=new Lesson();
        $lesson->lesson=$_POST['lesson'];
        $lesson->department_id=$_POST['department_id'];
        $lesson->recycle=0;
        if($lesson->save()){
            $_SESSION['SuccessMessage']="بە سەرکەوتوی زیادکرا";
            RedirectTo("lessons.php");
        }else{
            // $_SESSION['ErrorMessage']=join("<br>",$teacher->errors);
            RedirectTo("add_new_lesson.php");
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
                    <input class="form-controll" type="text" placeholder="ناوی وانە" name="lesson" id="lesson">
                </div>
                 <div class="input-group">
                    <label for="department_id">ناوی وانە</label>
                    <select class="form-controll"  id="department_id" name="department_id">
                        <?php 
                            $departments=Department::find_all();
                            foreach($departments as $department){
                                if($department->recycle==0){
                        ?>
                        <option value="<?php echo $department->id; ?>"><?php echo $department->department_name; ?></option>
                        <?php }} ?>
                    </select>
                </div>
                <button type="submit" name="submit" class="btn btn-primary width-25">زیادکردن</button>
            </form>

        </div>
    </div>

<?php include('includes/footer.php'); ?>