<?php include('includes/header.php'); ?>
<?php 
    if(isset($_POST['submit'])){
        $department=new Department();
        $department->department_name=$_POST['department_name'];
        $department->recycle=0;
        if($department->save()){
            $_SESSION['SuccessMessage']="بە سەرکەوتوی زیادکرا";
            RedirectTo("departments.php");
        }else{
            // $_SESSION['ErrorMessage']=join("<br>",$teacher->errors);
            RedirectTo("add_new_department.php");
        }
    }
?>
<?php include('includes/top_nav.php'); ?>
    <div class="main">
    <?php include('includes/side_nav.php'); ?>
    <div class="container">
        <h1>زیادکردنی بەش</h1>
        <div class="content">

        <form action="" class="form" method="POST">
        <?php echo $session->SuccessMessage(); ?>
        <?php echo $session->ErrorMessage(); ?>
                <div class="input-group">
                    <label for="department_name">ناوی بەش </label>
                    <input class="form-controll" type="text" placeholder="ناوی بەش" name="department_name" id="department_name">
                </div>
                <button type="submit" name="submit" class="btn btn-primary width-25">زیادکردن</button>
            </form>

        </div>
    </div>

<?php include('includes/footer.php'); ?>
