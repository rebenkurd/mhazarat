<?php include('includes/header.php'); ?>
<?php include('includes/top_nav.php'); ?>

<?php
    if(isset($_GET['id'])){
        $time=Time::find_by_id(htmlspecialchars($_GET['id'], ENT_QUOTES, 'UTF-8'));
        htmlspecialchars($time->recycle=0, ENT_QUOTES, 'UTF-8');
        if($time->save()){
            $_SESSION['SuccessMessage']="بە سەرکەوتووی گەڕێندرایەوە";
            RedirectTo("times.php");
        }else{
            $_SESSION['ErrorMessage']="تکایە دووبارە هەوڵبدەرەوە";
            RedirectTo("times.php");
        }
    }

?>
    <div class="main">
    <?php include('includes/side_nav.php'); ?>
    <div class="container">
        <h1>کاتەکان</h1>
        <div class="content">
        <?php echo $session->SuccessMessage(); ?>
        <?php echo $session->ErrorMessage(); ?>
        <div class="recents">
                <span>بینینی کاتە سڕاوەکان</span>
                <table id="table" class="display" style="width:100%">
                <thead>
                        <tr>
                            <th>ژمارە</th>
                            <th>کات</th>
                            <th>جۆری کات</th>
                            <th>کردارەکان</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        <?php 
                            $times = Time::find_all();
                            $a=1;
                            foreach($times as $time){
                                if($time->recycle==1){
                        ?>
                        <tr id="tr_time_<?php echo $time->id; ?>">
                            <td><?php echo htmlspecialchars($a++, ENT_QUOTES, 'UTF-8'); ?></td>
                            <td><?php echo htmlspecialchars($time->times, ENT_QUOTES, 'UTF-8'); ?></td>
                            <td><?php echo htmlspecialchars($time->time_type, ENT_QUOTES, 'UTF-8'); ?></td>
                            <td>
                                <a  href="time_recycle.php?id=<?php echo htmlspecialchars($time->id, ENT_QUOTES, 'UTF-8'); ?>"><button class="btn btn-success"><i class="fas fa-recycle" title="گەراندنەو"></i></button></a>  
                                <button class='btn btn-danger ' id="btn-model"><i disabled class="fas fa-trash"></i></button>
                            <div class="back-model">
                            <div class="model">
                                <div class="model-header">
                                    ئاگاداری
                                </div>
                                <div class="model-body">
                                    دڵنیایت لە سرینەوەی <?php echo htmlspecialchars($time->times.$time->time_type, ENT_QUOTES, 'UTF-8'); ?>
                            </div>
                                <div class="model-footer">
                                <button type="button" class="btn btn-success" onclick="timeDelete(<?php echo htmlspecialchars($time->id, ENT_QUOTES, 'UTF-8'); ?>)">بەڵێ</button>
                                    <button type="button" class="btn btn-danger" id="close-model">نەخێر</button>
                                </div>
                            </div>
                        </div>
                            </td>
                        </tr>
                        <?php } } ?>
                    </tbody>
                </table>
            </div>
        </div>
        </div>
    </div>

<?php include('includes/footer.php'); ?>