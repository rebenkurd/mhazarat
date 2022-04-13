<?php include('includes/header.php'); ?>
<?php include('includes/top_nav.php'); ?>

<?php
    if(isset($_GET['id'])){
        $teacher=Teacher::find_by_id($_GET['id']);
        $teacher->recycle=0;
        if($teacher->save()){
            $_SESSION['SuccessMessage']="بە سەرکەوتوی چوو بۆ بەشی سڕاوەکان";
            RedirectTo("teacher_recycle.php");
        }else{
            $_SESSION['ErrorMessage']="تکایە دووبارە هەوڵبدەرەوە";
            RedirectTo("teacher_recycle.php");
        }
    }

?>
    <div class="main">
    <?php include('includes/side_nav.php'); ?>
    <div class="container">
        <h1>بەکارهێنەرەکان</h1>
        <div class="content">
        <?php echo $session->SuccessMessage(); ?>
        <?php echo $session->ErrorMessage(); ?>
        <div class="recents">
                <span>بینینی هەموو وانەبێژەکان</span>
                <table id="table" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>ژمارە</th>
                            <th>ناوی سیانی</th>
                            <th>بڕوانامە</th>
                            <th>نازناو</th>
                            <th>کرێی یەک ڕۆژ</th>
                            <th>ماوەی کارکردن</th>
                            <th>ژمارەی توێژینەوە</th>
                            <th>نرخی یەک کاژیر</th>
                            <th>میلاک</th>
                            <th>کردارەکان</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $teachers = Teacher::find_all();
                            $a=1;
                            foreach($teachers as $teacher){
                                if($teacher->recycle==1){
                        ?>
                        <tr>
                            <td><?php echo $a++; ?></td>
                            <td><?php echo $teacher->fullname; ?></td>
                            <td><?php
                                if($teacher->certificate==0){
                                    echo "دبلۆم";
                                }elseif($teacher->certificate==1){
                                    echo "بکالۆریۆس";
                                }elseif($teacher->certificate==2){
                                    echo "ماجستێر";
                                }else{
                                    echo "دکتۆرا";
                                }
                            ?></td>
                            <td><?php echo $teacher->nickname; ?></td>
                            <td><?php echo $teacher->one_day_money; ?></td>
                            <td><?php echo $teacher->a_houer_on_week; ?></td>
                            <td><?php echo $teacher->research; ?></td>
                            <td><?php echo $teacher->one_houer_money; ?></td>
                            <td><?php 
                            if($teacher->contract==0){
                                echo "بەڵێ";
                            }else{
                                echo "نەخێر";
                            }
                            ?></td>
                            <td>
                                <a style="font-size: 1rem;" href="edit_teacher.php?id=<?php echo $teacher->id; ?>"><i class="fas fa-edit text-primary" title="دەستکاریکردن"></i></a>    
                                <a onclick="btnOpenModel()" class="btn-submit btn-model"><i class="fas fa-trash text-danger" title="سڕینەوە"></i></a>
                            <div class="back-model">
                            <div class="model">
                                <div class="model-header">
                                    ئاگاداری
                                </div>
                                <div class="model-body">
                                    دڵنیایت لە سرینەوەی <?php echo $teacher->fullname; ?>
                            </div>
                                <div class="model-footer">
                                    <button class="btn btn-success"><a href="teachers.php?id=<?php echo $teacher->id; ?>" >بەڵێ</a></button>
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