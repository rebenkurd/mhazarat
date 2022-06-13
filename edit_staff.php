<?php include('includes/header.php'); ?>
<?php 
if(empty($_GET['id'])){
  RedirectTo('staff.php');  
}else{
        $staff=Staff::find_by_id($_GET['id']);
    if(isset($_POST['update'])){
        $staff->name=$_POST['name'];
        $staff->phone=$_POST['phone'];
        $staff->responsibility_id=$_POST['responsibility'];
        $staff->email=$_POST['email'];
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
                   <option value="<?php echo $res->id;?>"><?php echo $res->name;?></option>
<?php }?>
                   </select>
                </div>
                 <div class="input-group">
                    <label for="phone">ژمارەی مۆبایل</label>
                    <input class="form-controll" value="<?php echo $staff->phone; ?>" type="text" placeholder="ژمارەی مۆبایل" name="phone" id="phone">
                </div>
                 <div class="input-group">
                    <label for="email">ئیمەیڵ</label>
                    <input class="form-controll" value="<?php echo $staff->email; ?>" type="text" placeholder="ئیمەیڵ" name="phone" id="email">
                </div>
                <button type="submit" name="update" class="btn btn-primary width-25">نویکردنەوە</button>
            </form>
            

        </div>
    </div>

<?php include('includes/footer.php'); ?>