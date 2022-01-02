<?php include('includes/header.php'); ?>
<?php include('includes/top_nav.php'); ?>

<?php
    if(isset($_GET['id'])){
        $time=Time::find_by_id($_GET['id']);
        $time->recycle=1;
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
        <?php echo $session->SuccessMessage(); ?>
        <?php echo $session->ErrorMessage(); ?>
        <div class="recents">
                <span>بینینی هەموو کاتەکان</span>
                <table id="table" class="display" style="width:100%">
                <a href="add_new_time.php" class="btn btn-primary left mx-1"><i class="fas fa-plus"></i> زیادکردنی کات</a>
                <a href="time_recycle.php" class="btn btn-success left mx-1"><i class="fas fa-plus"></i> کاتە سڕاوەکان</a>
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
                        <tr>
                            <td><?php echo $a++; ?></td>
                            <td><?php echo $time->times; ?></td>
                            <td><?php echo $time->time_type; ?></td>
                            <td>
                                <a style="font-size: 1rem;" href="edit_time.php?id=<?php echo $time->id; ?>"><i class="fas fa-edit text-primary" title="دەستکاریکردن"></i></a>    
                                <a onclick="btnOpenModel()" class="btn-submit btn-model"><i class="fas fa-trash text-danger" title="سڕینەوە"></i></a>
                            <div class="back-model">
                            <div class="model">
                                <div class="model-header">
                                    ئاگاداری
                                </div>
                                <div class="model-body">
                                    دڵنیایت لە سرینەوەی <?php echo $time->times.$time->time_type; ?>
                            </div>
                                <div class="model-footer">
                                    <button class="btn btn-success"><a href="delete_time.php?id=<?php echo $time->id; ?>" >بەڵێ</a></button>
                                    <button class="btn btn-danger close" onclick="btnCloseModel()">نەخێر</button>
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