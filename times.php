<?php include('includes/header.php'); ?>
<?php include('includes/top_nav.php'); ?>

<?php
    if(isset($_GET['id'])){
        $time=Time::find_by_id(htmlspecialchars($_GET['id'], ENT_QUOTES, 'UTF-8'));
        htmlspecialchars($time->recycle=1, ENT_QUOTES, 'UTF-8');
        if($time->save()){
            $_SESSION['SuccessMessage']="بە سەرکەوتوی چوو بۆ بەشی سڕاوەکان";
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
        <?php echo htmlspecialchars($session->SuccessMessage(), ENT_QUOTES, 'UTF-8'); ?>
        <?php echo htmlspecialchars($session->ErrorMessage(), ENT_QUOTES, 'UTF-8'); ?>
        <div class="recents">
                <span>بینینی هەموو کاتەکان</span>
                <table id="table" class="display" style="width:100%">
                <a href="add_new_time.php" class="btn btn-primary left mx-1"><i class="fas fa-plus"></i> زیادکردنی کات</a>
                <a href="time_recycle.php" class="btn btn-danger left mx-1"><i class="fas fa-trash"></i> کاتە سڕاوەکان</a>
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
                                if($time->recycle==0){
                        ?>
                        <tr>
                            <td><?php echo htmlspecialchars($a++, ENT_QUOTES, 'UTF-8'); ?></td>
                            <td><?php echo htmlspecialchars($time->times, ENT_QUOTES, 'UTF-8'); ?></td>
                            <td><?php echo htmlspecialchars($time->time_type, ENT_QUOTES, 'UTF-8'); ?></td>
                            <td>
                                <a style="font-size: 1rem;" href="edit_time.php?id=<?php echo htmlspecialchars($time->id, ENT_QUOTES, 'UTF-8'); ?>"><i class="fas fa-edit text-primary" title="دەستکاریکردن"></i></a>    
                                <!-- <a onclick="btnOpenModel()" class="btn-submit btn-model"><i class="fas fa-trash text-danger" title="سڕینەوە"></i></a> -->
                                <a href="times.php?id=<?php echo htmlspecialchars($time->id, ENT_QUOTES, 'UTF-8'); ?>" class="btn-submit"><i class="fas fa-trash text-danger" title="سڕینەوە"></i></a>
                                
                            </td>
                        </tr>
                        <!-- <div class="back-model">
                            <div class="model">
                                <div class="model-header">
                                    ئاگاداری
                                </div>
                                <div class="model-body">
                                    دڵنیایت لە سرینەوەی <?php //echo $time->times.$time->time_type; ?>
                            </div>
                                <div class="model-footer">
                                    <button class="btn btn-success"><a href="times.php?id=<?php // echo $time->id; ?>" >بەڵێ</a></button>
                                    <button class="btn btn-danger close" onclick="btnCloseModel()">نەخێر</button>
                                </div>
                            </div>
                        </div> -->
                        <?php } } ?>
                    </tbody>
                </table>
            </div>
        </div>
        </div>
    </div>

<?php include('includes/footer.php'); ?>