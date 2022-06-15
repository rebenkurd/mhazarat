<?php include('includes/header.php'); ?>
<?php 
if(empty($_GET['id'])){
    RedirectTo("departments.php");
}else{
    $department=Department::find_by_id(htmlspecialchars($_GET['id'], ENT_QUOTES, 'UTF-8'));
    if(isset($_POST['update'])){
        htmlspecialchars($department->department_name=$_POST['department_name'], ENT_QUOTES, 'UTF-8');
        $department->recycle=0;
        if($department->save()){
            $_SESSION['SuccessMessage']="بە سەرکەوتوی زیادکرا";
            RedirectTo("departments.php");
        }else{
            // $_SESSION['ErrorMessage']=join("<br>",$teacher->errors);
            RedirectTo("edit_department.php");
        }
    }
}
?>
<?php include('includes/top_nav.php'); ?>
    <div class="main">
    <?php include('includes/side_nav.php'); ?>
    <div class="container">
        <h1>زیادکردنی بەشی زانستی</h1>
        <div class="content">

        <form action="" class="form" method="POST">
        <?php echo htmlspecialchars($session->SuccessMessage(), ENT_QUOTES, 'UTF-8'); ?>
        <?php echo htmlspecialchars($session->ErrorMessage(), ENT_QUOTES, 'UTF-8'); ?>
                 <div class="input-group">
                    <label for="department">ناوی بەش</label>
                    <input class="form-controll" value="<?php echo htmlspecialchars($department->department_name, ENT_QUOTES, 'UTF-8'); ?>" type="text" placeholder="ناوی بەش" name="department_name" id="department">
                </div>
                <button type="submit" name="update" class="btn btn-success width-25">پاشەکەوتکردن</button>
            </form>

        </div>
    </div>

<?php include('includes/footer.php'); ?>