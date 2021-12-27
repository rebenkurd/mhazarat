<?php include('includes/header.php'); ?>
<?php 
    if(isset($_POST['submit'])){
        $teacher=new Teacher();
        $teacher->fullname=$_POST['fullname'];
        $teacher->certificate=$_POST['certificate'];
        $teacher->nickname=$_POST['nickname'];
        $teacher->a_houer_on_week=$_POST['a_houer_on_week'];
        $teacher->research=$_POST['research'];
        $teacher->one_houer_money=$_POST['one_houer_money'];
        $teacher->contract=$_POST['contract'];
        $teacher->one_day_money=$_POST['one_day_money'];
        $teacher->recycle=0;
        if($teacher->save()){
            $_SESSION['SuccessMessage']="بە سەرکەوتوی زیادکرا";
            RedirectTo("teachers.php");
        }else{
            // $_SESSION['ErrorMessage']=join("<br>",$teacher->errors);
            RedirectTo("add_new_teacher.php");
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
                    <input class="form-controll" type="text" placeholder="ناوی سیانی" name="fullname" id="fullname">
                </div>
                <div class="input-group">
                    <label for="nickname">نازناو</label>
                    <input class="form-controll" type="text" placeholder="نازناو" name="nickname" id="nickname">
                </div>
            </div>
                <div class="groups">

                <div class="input-group">
                    <label for="a_houer_on_week">ماوەی کارکردن</label>
                    <input class="form-controll" type="text" placeholder="ماوەی کارکردن" name="a_houer_on_week" id="a_houer_on_week">
                </div>
                <div class="input-group">
                    <label for="research">ژمارەی توێژینەوە</label>
                    <input class="form-controll" type="text" placeholder="ژمارەی توێژینەوە" name="research" id="research">
                </div>
            </div>
                 <div class="groups">
                <div class="input-group">
                    <label for="one_houer_money">پارەی یەک کاتژمێر</label>
                    <input class="form-controll" type="text" placeholder="پارەی یەک کاتژمێر" name="one_houer_money" id="one_houer_money">
                </div>
                <div class="input-group">
                    <label for="one_day_money">پارەی یەک ڕۆژ</label>
                    <input class="form-controll" type="text" placeholder="پارەی یەک ڕۆژ" name="one_day_money" id="one_day_money">
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
                <button type="submit" name="submit" class="btn btn-primary width-25">زیادکردن</button>
            </form>

        </div>
    </div>

<?php include('includes/footer.php'); ?>