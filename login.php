<?php ob_start(); ?>
<?php include("configs/init.php"); ?>
<?php
    if($session->is_signed_in()){
        RedirectTo("index.php");
    }
    
    if(isset($_POST['login'])){
        $username=trim(filter_var($_POST['username'],FILTER_DEFAULT));
        $password=trim(filter_var(md5($_POST['password']),FILTER_DEFAULT));
      
        // Create Method to check database 
        
        if(empty($username) || empty($password)){
            $_SESSION['ErrorMessage']="نازناو و وشەی تیپەڕ بە تەواوی پڕبکەرەوە";
        
        }else{
           $user_found=User::verify_user($username,$password);
            $session->login($user_found);
            RedirectTo("index.php");
            $_SESSION['SuccessMessage']="بەخیربێیت";
            
        }
    }


 
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mhazarat</title>
    <link rel="stylesheet" href="assets/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="assets/css/all.min.css">
    <link rel="stylesheet" href="assets/css/rtl.css">
</head>
<body class="light" id="btnBody">
<div class="login_content">
    <form action="login.php" method="POST">
            <?php echo htmlspecialchars($session->SuccessMessage(), ENT_QUOTES, 'UTF-8'); ?>
            <?php echo htmlspecialchars($session->ErrorMessage(), ENT_QUOTES, 'UTF-8'); ?>
        <div class="img-login">
        <img src="img/login.svg">
        </div>
        <span>فۆڕمی چوونەژوورەوە</span>
        <div class="input-group">
            <label for="username">بەکارهێنەر</label>
            <input type="text" placeholder="بەکارهێنەر" name="username" id="username">
        </div>
        <div class="input-group">
            <label for="password">وشەی تێپەر</label>
            <input type="text" placeholder="وشەی تێپەر" name="password" id="password">
        </div>
        <button type="submit" name="login" class="btn btn-primary width-50">چوونەژوورەوە</button>
    </form>
</div>
<script src="assets/lib/jquery.min.js"></script>
<script src="assets/lib/all.min.js"></script>
<script src="assets/lib/jquery.dataTables.min.js"></script>
<script src="assets/lib/main.js"></script>
<script>
    $(document).ready( function () {
    $('#table').DataTable();
} );
</script>
</body>
</html>
