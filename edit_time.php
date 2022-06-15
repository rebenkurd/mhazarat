<?php include('includes/header.php'); ?>
<?php 
if(empty($_GET['id'])){
    RedirectTo("times.php");
}else{
    $time=Time::find_by_id(htmlspecialchars($_GET['id'], ENT_QUOTES, 'UTF-8'));
    if(isset($_POST['submit'])){
        htmlspecialchars($time->the_time=trim(filter_var($_POST['times'],FILTER_SANITIZE_NUMBER_INT)), ENT_QUOTES, 'UTF-8');
        htmlspecialchars($time->times=trim(filter_var(date('h:i A',strtotime($time->the_time)),FILTER_SANITIZE_NUMBER_INT)), ENT_QUOTES, 'UTF-8');
        htmlspecialchars($time->time_type=trim(filter_var($_POST['time_type'],FILTER_SANITIZE_NUMBER_INT)), ENT_QUOTES, 'UTF-8');
        if($time->save()){
            $_SESSION['SuccessMessage']="بە سەرکەوتوی زیادکرا";
            RedirectTo("times.php");
        }else{
            // $_SESSION['ErrorMessage']=join("<br>",$user->errors);
            RedirectTo("add_new_time.php");
        }
    }
}
?>
<?php include('includes/top_nav.php'); ?>
    <div class="main">
    <?php include('includes/side_nav.php'); ?>
    <div class="container">
        <h1>گۆڕینی کات</h1>
        <div class="content">

        <form action="" class="form" method="POST">
        <?php echo htmlspecialchars($session->SuccessMessage(), ENT_QUOTES, 'UTF-8'); ?>
        <?php echo htmlspecialchars($session->ErrorMessage(), ENT_QUOTES, 'UTF-8'); ?>
                <div class="groups">
                <div class="input-group">
                    <label for="times">کات</label>
                    <input class="form-controll" value="<?php echo htmlspecialchars($time->times, ENT_QUOTES, 'UTF-8'); ?>" type="time" placeholder="کات" name="times" id="times">
                </div>
                <div class="input-group">
                    <label for="time_type">جۆری کات</label>
                    <select name="time_type" class="form-controll" id="time_type">
                        <option value="AM">AM</option>
                        <option value="PM">PM</option>
                    </select> 
                  </div>        
                 </div>
                <button type="submit" name="submit" class="btn btn-success width-25">پاشەکەوتکردن</button>
            </form>

        </div>
    </div>

<?php include('includes/footer.php'); ?>