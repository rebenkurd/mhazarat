<?php include('includes/header.php'); ?>
<?php 
if(empty($_GET['id'])){
  RedirectTo('teachers.php');  
}else{
        $teacher=Teacher::find_by_id(htmlspecialchars($_GET['id'], ENT_QUOTES, 'UTF-8'));
    if(isset($_POST['update'])){
        htmlspecialchars($teacher->fullname=trim(filter_var($_POST['fullname'],FILTER_DEFAULT)), ENT_QUOTES, 'UTF-8');
        htmlspecialchars($teacher->certificate=trim(filter_var($_POST['certificate'],FILTER_SANITIZE_NUMBER_INT)), ENT_QUOTES, 'UTF-8');
        htmlspecialchars($teacher->nickname=trim(filter_var($_POST['nickname'],FILTER_DEFAULT)), ENT_QUOTES, 'UTF-8');
        htmlspecialchars($teacher->a_houer_on_week=trim(filter_var($_POST['a_houer_on_week'],FILTER_SANITIZE_NUMBER_INT)), ENT_QUOTES, 'UTF-8');
        htmlspecialchars($teacher->research=trim(filter_var($_POST['research'],FILTER_SANITIZE_NUMBER_INT)), ENT_QUOTES, 'UTF-8');
        htmlspecialchars($teacher->one_houer_money=trim(filter_var($_POST['one_houer_money'],FILTER_SANITIZE_NUMBER_INT)), ENT_QUOTES, 'UTF-8');
        htmlspecialchars($teacher->contract=trim(filter_var($_POST['contract'],FILTER_SANITIZE_NUMBER_INT)), ENT_QUOTES, 'UTF-8');
        htmlspecialchars($teacher->one_day_money=trim(filter_var($_POST['one_day_money'],FILTER_SANITIZE_NUMBER_INT)), ENT_QUOTES, 'UTF-8');
        htmlspecialchars($teacher->recycle=0, ENT_QUOTES, 'UTF-8');
        if($teacher->save()){
            $_SESSION['SuccessMessage']="بە سەرکەوتوی زیادکرا";
            RedirectTo("teachers.php");
        }else{
            // $_SESSION['ErrorMessage']=join("<br>",$teacher->errors);
            RedirectTo("edit_teacher.php");
        }
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
                    <label for="fullname">ناوی سیانی</label>
                    <input class="form-controll" value="<?php echo htmlspecialchars($teacher->fullname, ENT_QUOTES, 'UTF-8'); ?>" type="text" placeholder="ناوی سیانی" name="fullname" id="fullname">
                </div>
                <div class="input-group">
                    <label for="nickname">نازناو</label>
                    <input class="form-controll" value="<?php echo htmlspecialchars($teacher->nickname, ENT_QUOTES, 'UTF-8'); ?>" type="text" placeholder="نازناو" name="nickname" id="nickname">
                </div>
            </div>
                <div class="groups">

                <div class="input-group">
                    <label for="a_houer_on_week">ماوەی کارکردن</label>
                    <input class="form-controll" value="<?php echo htmlspecialchars($teacher->a_houer_on_week, ENT_QUOTES, 'UTF-8'); ?>" type="text" placeholder="ماوەی کارکردن" name="a_houer_on_week" id="a_houer_on_week">
                </div>
                <div class="input-group">
                    <label for="research">ژمارەی توێژینەوە</label>
                    <input class="form-controll" value="<?php echo htmlspecialchars($teacher->research, ENT_QUOTES, 'UTF-8'); ?>"  type="text" placeholder="ژمارەی توێژینەوە" name="research" id="research">
                </div>
            </div>
                 <div class="groups">
                <div class="input-group">
                    <label for="one_houer_money">پارەی یەک کاتژمێر</label>
                    <input class="form-controll" value="<?php echo htmlspecialchars($teacher->one_houer_money, ENT_QUOTES, 'UTF-8'); ?>" type="text" placeholder="پارەی یەک کاتژمێر" name="one_houer_money" id="one_houer_money">
                </div>
                <div class="input-group">
                    <label for="one_day_money">پارەی یەک ڕۆژ</label>
                    <input class="form-controll" value="<?php echo htmlspecialchars($teacher->one_day_money, ENT_QUOTES, 'UTF-8'); ?>" type="text" placeholder="پارەی یەک ڕۆژ" name="one_day_money" id="one_day_money">
                </div>
            </div>
            <div class="groups">
            <div class="input-group">
                    <label for="certificate">بڕوانامە</label>
                    <select name="certificate" class="form-controll" id="certificate">
                        <option value="0">دیبلۆم</option>
                        <option value="1">بکالۆریۆس</option>
                        <option value="2">ماجستێر</option>
                        <option value="3">دکتۆرا</option>
                    </select>
                </div>
            <div class="input-group">
             <label for="contract">میلاک</label>
             <select name="contract" class="form-controll" id="contract">
                <option value="0">بەڵێ</option>
                <option value="1">نەخێر</option>
             </select>
            </div>

            </div>
                <button type="submit" name="update" class="btn btn-success width-25">پاشەکەوتکردن</button>
            </form>

        </div>
    </div>

<?php include('includes/footer.php'); ?>