<?php include('includes/header.php'); ?>
<?php 
if(empty($_GET['id'])){
    RedirectTo("users.php");
}else{
    $user=User::find_by_id($_GET['id']);
    if(isset($_POST['update'])){
        htmlspecialchars($user->username=trim(filter_var($_POST['username'],FILTER_DEFAULT)), ENT_QUOTES, 'UTF-8');
        htmlspecialchars($user->email=trim(filter_var($_POST['email'],FILTER_SANITIZE_EMAIL)), ENT_QUOTES, 'UTF-8');
        htmlspecialchars($user->first_name=trim(filter_var($_POST['first_name'],FILTER_DEFAULT)), ENT_QUOTES, 'UTF-8');
        htmlspecialchars($user->last_name=trim(filter_var($_POST['last_name'],FILTER_DEFAULT)), ENT_QUOTES, 'UTF-8');

        $user->set_file($_FILES['user_image']);
        if($user->save()){
            $user->save_user();
            $_SESSION['SuccessMessage']="بە سەرکەوتوی پاشەکەوتکرا";
            RedirectTo("users.php");
        }else{
            $_SESSION['ErrorMessage']=join("<br>",$user->errors);
            RedirectTo("edit_user.php");
        }
    }
    if(isset($_POST['change_password'])){
    htmlspecialchars($user->password=trim(filter_var(md5($_POST['new_password']),FILTER_DEFAULT)), ENT_QUOTES, 'UTF-8');
    if($user->save()){
        $_SESSION['SuccessMessage']="بە سەرکەوتوی وسەی تێپەڕ گۆڕدرا";
        RedirectTo("users.php");
    }else{
        $_SESSION['ErrorMessage']="تکایە دووبارە هەوڵبدەرەوە";
        RedirectTo("edit_user.php");
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
        <?php echo $session->SuccessMessage(); ?>
        <?php echo $session->ErrorMessage(); ?>
                <div class="groups">
                <div class="input-group">
                    <label for="first_name">ناوی یەکەم</label>
                    <input type="text" class="form-controll" value="<?php echo htmlspecialchars($user->first_name, ENT_QUOTES, 'UTF-8'); ?>" placeholder="ناوی یەکەم" name="first_name" id="first_name">
                </div>
                <div class="input-group">
                    <label for="last_name">ناوی دووەم</label>
                    <input type="text" class="form-controll" value="<?php echo htmlspecialchars($user->last_name, ENT_QUOTES, 'UTF-8'); ?>" placeholder="ناوی دووەم" name="last_name" id="last_name">
                </div>
            </div>
                <div class="input-group">
                    <label for="username">بەکارهێنەر</label>
                    <input type="text" class="form-controll" value="<?php echo htmlspecialchars($user->username, ENT_QUOTES, 'UTF-8'); ?>" placeholder="بەکارهێنەر" name="username" id="username">
                </div>
                <div class="input-group">
                    <label for="email">ئیمەڵ</label>
                    <input type="text" class="form-controll" value="<?php echo htmlspecialchars($user->email, ENT_QUOTES, 'UTF-8'); ?>" placeholder="ئیمەیڵی بەکارهێنەر" name="email" id="email">
                </div>
                <div class="input-group">
                    <label for="">گۆڕینی وشەی تێپەڕ</label>
                    <button type="button" id="btn-model" class="btn btn-primary width-25 m-2">گۆڕین</button>
                    <div class="back-model">
                            <div class="model">
                                <div class="model-header">
                                    ئاگاداری
                                </div>
                                <div class="model-body">
                                        <div class="input-group">
                                            <label for="">وشەی تێپەڕی نوێ</label>
                                            <input type="password" name="new_password" class="form-controll">
                                        </div>
                                </div>
                                <div class="model-footer">
                                    <button class="btn btn-success" type="submit" name="change_password">بەڵێ</button>
                                    <button type="button" class="btn btn-danger" id="close-model">نەخێر</button>
                                </div>
                            </div>
                    </div>
                </div>
                <div class="input-group">
                    <img src="<?php echo htmlspecialchars($user->image_path(), ENT_QUOTES, 'UTF-8'); ?>" class="image-flued" alt="">
                    <label for="user_image">وێنە</label>
                    <input type="file" class="form-controll" name="user_image" id="user_image">
                </div>
                <button type="submit" name="update" class="btn btn-success width-25">پاشەکەوتکردن</button>
            </form>
        </div>
        </div>
    </div>

<?php include('includes/footer.php'); ?>