<?php include('includes/header.php'); ?>
<?php 
    if(isset($_POST['submit'])){
        $staff=new Staff();
        $staff->name=trim(filter_var($_POST['name']));
        $staff->email=trim(filter_var($_POST['email'],FILTER_SANITIZE_EMAIL));
        $staff->phone=trim(filter_var($_POST['phone'],FILTER_VALIDATE_INT));
        $staff->responsibility_id=trim(filter_var($_POST['responsibility'],FILTER_VALIDATE_INT));
        $staff->recycle=0;
        if($staff->save()){
            $_SESSION['SuccessMessage']="بە سەرکەوتوی زیادکرا";
            RedirectTo("staff.php");
        }else{
            // $_SESSION['ErrorMessage']=join("<br>",$teacher->errors);
            RedirectTo("add_new_staff.php");
        }
    }
?>
<?php include('includes/top_nav.php'); ?>
    <div class="main">
    <?php include('includes/side_nav.php'); ?>
    <div class="container">
        <h1>زیادکردنی ستاف</h1>
        <div class="content">

        <form action="" class="form" method="POST">
                <?php echo $session->SuccessMessage(); ?>
                <?php echo $session->ErrorMessage(); ?>
                 <div class="input-group">
                    <label for="name">ناوی ستاف</label>
                    <input class="form-controll" type="text" placeholder="ناوی وانە" name="name" id="name">
                </div>
                 <div class="input-group">
                    <label for="responsibility">بەرپرسیارێتی</label>
                   <select name="responsibility" class="form-controll" id="responsibility">
                   <?php
                        $responsibilitys=Responsibility::find_all();
                        foreach($responsibilitys as $res){
                   ?>
                   <option value="<?php echo $res->id;?>"><?php echo $res->name;?></option>
<?php }?>
                   </select>
                </div>
                 <div class="input-group">
                    <label for="phone">ژمارەی مۆبایل</label>
                    <input class="form-controll" type="text" placeholder="ژمارەی مۆبایل" name="phone" id="phone">
                </div>
                 <div class="input-group">
                    <label for="email">ئیمەیڵ</label>
                    <input class="form-controll" type="email" placeholder="ئیمەیڵ" name="phone" id="email">
                </div>
                <button type="submit" name="submit" class="btn btn-primary width-25">زیادکردن</button>
            </form>

        </div>
    </div>

<?php include('includes/footer.php'); ?>