<?php include('includes/header.php'); ?>
<?php 
if(empty($_GET['id'])){
    RedirectTo("lessons.php");
}else{
    $lesson=Lesson::find_by_id($_GET['id']);
    if(isset($_POST['update'])){
        $lesson->lesson=$_POST['lesson'];
        $lesson->recycle=0;
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
                    <input class="form-controll" value="<?php echo $lesson->lesson; ?>" type="text" placeholder="ناوی وانە" name="lesson" id="lesson">
                </div>
                <button type="submit" name="update" class="btn btn-success width-25">پاشەکەوتکردن</button>
            </form>

        </div>
    </div>

<?php include('includes/footer.php'); ?>