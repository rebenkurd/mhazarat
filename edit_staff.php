<?php include('includes/header.php'); ?>
<?php 
if(empty($_GET['id'])){
  RedirectTo('staff.php');  
}else{
        $staff=Staff::find_by_id(htmlspecialchars($_GET['id'], ENT_QUOTES, 'UTF-8'));
    if(isset($_POST['update'])){
        htmlspecialchars($staff->name=trim(filter_var($_POST['name'],FILTER_DEFAULT)), ENT_QUOTES, 'UTF-8');
        htmlspecialchars($staff->phone=trim(filter_var($_POST['phone'],FILTER_SANITIZE_NUMBER_INT)), ENT_QUOTES, 'UTF-8');
        htmlspecialchars($staff->responsibility_id=trim(filter_var($_POST['responsibility'],FILTER_SANITIZE_NUMBER_INT)), ENT_QUOTES, 'UTF-8');
        htmlspecialchars($staff->email=trim(filter_var($_POST['email'],FILTER_SANITIZE_EMAIL)), ENT_QUOTES, 'UTF-8');
        if($staff->save()){
            $_SESSION['SuccessMessage']="بە سەرکەوتوی زیادکرا";
            RedirectTo("staff.php");
        }else{
            // $_SESSION['ErrorMessage']=join("<br>",$staff->errors);
            RedirectTo("edit_staff.php");
        }
    }
}
?>
<?php include('includes/top_nav.php'); ?>
    <div class="main">
    <?php include('includes/side_nav.php'); ?>
    <div class="container">
        <h1>دەستکاریکردنی ستاف</h1>
        <div class="content">

        <form action="" class="form" method="POST">
        <?php echo $session->SuccessMessage(); ?>
        <?php echo $session->ErrorMessage(); ?>
                 <div class="input-group">
                    <label for="name">ناوی ستاف</label>
                    <input class="form-controll" value="<?php echo $staff->name; ?>" type="text" placeholder="ناوی وانە" name="name" id="name">
                </div>
                 <div class="input-group">
                    <label for="responsibility">بەرپرسیارێتی</label>
                   <select name="responsibility" class="form-controll" id="responsibility">
                   <?php
                        $responsibilitys=Responsibility::find_all();
                        foreach($responsibilitys as $res){
                   ?>
                   <option value="<?php echo htmlspecialchars($res->id, ENT_QUOTES, 'UTF-8');?>"><?php echo htmlspecialchars($res->name, ENT_QUOTES, 'UTF-8');?></option>
<?php }?>
                   </select>
                </div>
                 <div class="input-group">
                    <label for="phone">ژمارەی مۆبایل</label>
                    <input class="form-controll" value="<?php echo htmlspecialchars($staff->phone, ENT_QUOTES, 'UTF-8'); ?>" type="text" placeholder="ژمارەی مۆبایل" name="phone" id="phone">
                </div>
                 <div class="input-group">
                    <label for="email">ئیمەیڵ</label>
                    <input class="form-controll" value="<?php echo htmlspecialchars($staff->email, ENT_QUOTES, 'UTF-8'); ?>" type="text" placeholder="ئیمەیڵ" name="phone" id="email">
                </div>
                <button type="submit" name="update" class="btn btn-primary width-25">نویکردنەوە</button>
            </form>
            

        </div>
    </div>

<?php include('includes/footer.php'); ?>