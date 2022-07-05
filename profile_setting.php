<?php include('includes/header.php'); ?>
<?php 

    $user=User::find_by_id(htmlspecialchars($_SESSION['user_id'], ENT_QUOTES, 'UTF-8'));
    if(isset($_POST['update'])){
        htmlspecialchars($user->first_name=trim(filter_var($_POST['first_name'],FILTER_DEFAULT)), ENT_QUOTES, 'UTF-8');
        htmlspecialchars($user->last_name=trim(filter_var($_POST['last_name'],FILTER_DEFAULT)), ENT_QUOTES, 'UTF-8');
        htmlspecialchars($user->bio=trim(filter_var($_POST['bio'],FILTER_DEFAULT)), ENT_QUOTES, 'UTF-8');
        if($user->save()){
            $_SESSION['SuccessMessage']="بە سەرکەوتوی دەستکاریکرا";
            RedirectTo("profile_setting.php");
        }else{
            RedirectTo("profile_setting.php");
        }
    }

?>
<?php include('includes/top_nav.php'); ?>
    <div class="main">
    <?php include('includes/side_nav.php'); ?>
    <div class="container">
        <h1>ڕێکخستن</h1>
        <div class="content">

        <form action="" class="form" method="POST" enctype="multipart/form-data">
        <?php echo $session->SuccessMessage(); ?>
        <?php echo $session->ErrorMessage(); ?>
                 <div class="groups">
                 <div class="input-group">
                    <label for="first_name">ناوی یەکەم</label>
                    <input class="form-controll" value="<?php echo htmlspecialchars($user->first_name, ENT_QUOTES, 'UTF-8'); ?>" type="text" placeholder="ناوی یەکەم" name="first_name" id="first_name">
                </div>
                <div class="input-group">
                    <label for="last_name">ناوی دووەم</label>
                    <input class="form-controll" value="<?php echo htmlspecialchars($user->last_name, ENT_QUOTES, 'UTF-8'); ?>" type="text" placeholder="ناوی دووەم" name="last_name" id="last_name">
                </div>
            </div>

            <textarea name="bio" class="form-controll" id="bio">
            <?php echo htmlspecialchars($user->bio, ENT_QUOTES, 'UTF-8'); ?>
            </textarea>
                <button type="submit"  name="update" class="btn btn-success width-25">پاشەکەوتکردن</button>
            </form>

        </div>
    </div>

<?php include('includes/footer.php'); ?>