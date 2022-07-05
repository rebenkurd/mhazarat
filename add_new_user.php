<?php include('includes/header.php'); ?>
<?php 
    if(isset($_POST['submit'])){
        $user=new User();
        $user->username=trim(filter_var($_POST['username'],FILTER_DEFAULT));
        $user->email=trim(filter_var($_POST['email'],FILTER_SANITIZE_EMAIL));
        $user->first_name=trim(filter_var($_POST['first_name'],FILTER_DEFAULT));
        $user->last_name=trim(filter_var($_POST['last_name'],FILTER_DEFAULT));
        $user->password=trim(filter_var(md5($_POST['password']),FILTER_DEFAULT));
        $user->set_file($_FILES['user_image']);
        if($user->save()){
            $_SESSION['SuccessMessage']="بە سەرکەوتوی زیادکرا";
            RedirectTo("users.php");
        }else{
            RedirectTo("add_new_user.php");
            $_SESSION['ErrorMessage']=join("<br>",$user->errors);
        }
    }
?>
<?php include('includes/top_nav.php'); ?>
    <div class="main">
    <?php include('includes/side_nav.php'); ?>
    <div class="container">
        <h1>زیادکردنی بەکارهێنەر</h1>
        <div class="content">

        <form action="" class="form" method="POST" enctype="multipart/form-data">
        <?php echo $session->SuccessMessage(); ?>
        <?php echo $session->ErrorMessage(); ?>
                <div class="groups">
                <div class="input-group">
                    <label for="first_name">ناوی یەکەم</label>
                    <input class="form-controll" type="text" placeholder="ناوی یەکەم" name="first_name" id="first_name">
                </div>
                <div class="input-group">
                    <label for="last_name">ناوی دووەم</label>
                    <input class="form-controll" type="text" placeholder="ناوی دووەم" name="last_name" id="last_name">
                </div>
            </div>
                <div class="input-group">
                    <label for="username">بەکارهێنەر</label>
                    <input class="form-controll" type="text" placeholder="بەکارهێنەر" name="username" id="username">
                </div>
                <div class="input-group">
                    <label for="email">ئیمەڵ</label>
                    <input class="form-controll" type="text" placeholder="ئیمەیڵی بەکارهێنەر" name="email" id="email">
                </div>
                <div class="input-group">
                    <label for="password">وشەی تێپەر</label>
                    <input class="form-controll" type="password" placeholder="وشەی تێپەر" name="password" id="password">
                </div>
                <div class="input-group">
                    <label for="user_image">وێنە</label>
                    <input class="form-controll" type="file" name="user_image" id="user_image">
                </div>
                <button type="submit" name="submit" class="btn btn-primary width-25">زیادکردن</button>
            </form>

        </div>
    </div>

<?php include('includes/footer.php'); ?>