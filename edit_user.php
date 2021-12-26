<?php include('includes/header.php'); ?>
<?php 
if(empty($_GET['id'])){
    RedirectTo("users.php");
}else{
    $user=User::find_by_id($_GET['id']);
    if(isset($_POST['update'])){
        $user->username=$_POST['username'];
        $user->email=$_POST['email'];
        $user->first_name=$_POST['first_name'];
        $user->last_name=$_POST['last_name'];
        $user->password=$_POST['password'];
        $user->set_file($_FILES['user_image']);
        if($user){
            $user->save();
            $user->image_upload();
            $_SESSION['SuccessMessage']="بە سەرکەوتوی پاشەکەوتکرا";
            RedirectTo("users.php");
        }else{
            $_SESSION['ErrorMessage']=join("<br>",$user->errors);
            RedirectTo("add_new_user.php");
        }
    }
}
?>
<?php include('includes/top_nav.php'); ?>
    <div class="main">
    <?php include('includes/side_nav.php'); ?>
    <div class="container">
        <h1>دەستکاریکردنی بەکارهێنەر</h1>
        <div class="content">

        <form action="" class="form" method="POST" enctype="multipart/form-data">
                <?php echo SuccessMessage(); ?>
                <?php echo ErrorMessage(); ?>
                 <div class="groups">
                 <div class="input-group">
                    <label for="first_name">ناوی یەکەم</label>
                    <input type="text" value="<?php echo $user->first_name; ?>" placeholder="ناوی یەکەم" name="first_name" id="first_name">
                </div>
                <div class="input-group">
                    <label for="last_name">ناوی دووەم</label>
                    <input type="text" value="<?php echo $user->last_name; ?>" placeholder="ناوی دووەم" name="last_name" id="last_name">
                </div>
            </div>
                <div class="input-group">
                    <label for="username">بەکارهێنەر</label>
                    <input type="text" value="<?php echo $user->username; ?>" placeholder="بەکارهێنەر" name="username" id="username">
                </div>
                <div class="input-group">
                    <label for="email">ئیمەڵ</label>
                    <input type="text" value="<?php echo $user->email; ?>" placeholder="ئیمەیڵی بەکارهێنەر" name="email" id="email">
                </div>
                <div class="input-group">
                    <label for="password">وشەی تێپەر</label>
                    <input type="text" value="<?php echo $user->password; ?>" placeholder="وشەی تێپەر" name="password" id="password">
                </div>
                <div class="input-group">
                    <img src="<?php echo $user->image_path(); ?>" class="image-flued" alt="">
                    <label for="user_image">وێنە</label>
                    <input type="file" name="user_image" id="user_image">
                </div>
                <button type="submit" name="update" class="btn btn-success width-25">پاشەکەوتکردن</button>
            </form>
        </div>
    </div>

<?php include('includes/footer.php'); ?>