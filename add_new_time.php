<?php include('includes/header.php'); ?>
<?php 
    if(isset($_POST['submit'])){
        $time=new Time();
        $time->the_time=trim(filter_var($_POST['times'],FILTER_SANITIZE_NUMBER_INT));
        $time->times=date('h:i A',strtotime($time->the_time));
        $time->time_type=trim(filter_var($_POST['time_type'],FILTER_SANITIZE_NUMBER_INT));
        if($time->save()){
            $_SESSION['SuccessMessage']="بە سەرکەوتوی زیادکرا";
            RedirectTo("times.php");
        }else{
            // $_SESSION['ErrorMessage']=join("<br>",$user->errors);
            RedirectTo("add_new_time.php");
        }
    }
?>
<?php include('includes/top_nav.php'); ?>
    <div class="main">
    <?php include('includes/side_nav.php'); ?>
    <div class="container">
        <h1>زیادکردنی کات</h1>
        <div class="content">

        <form action="" class="form" method="POST">
        <?php echo htmlspecialchars($session->SuccessMessage(), ENT_QUOTES, 'UTF-8'); ?>
        <?php echo htmlspecialchars($session->ErrorMessage(), ENT_QUOTES, 'UTF-8'); ?>
                <div class="groups">
                <div class="input-group">
                    <label for="times">کات</label>
                    <input class="form-controll" type="time" placeholder="کات" name="times" id="times">
                </div>
                <div class="input-group">
                    <label for="time_type">جۆری کات</label>
                    <select name="time_type" class="form-controll" id="time_type">
                        <option value="AM">AM</option>
                        <option value="PM">PM</option>
                    </select> 
                  </div>        
                 </div>
                <button type="submit" name="submit" class="btn btn-primary width-25">زیادکردن</button>
            </form>

        </div>
    </div>

<?php include('includes/footer.php'); ?>