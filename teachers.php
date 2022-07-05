<?php include('includes/header.php'); ?>
<?php include('includes/top_nav.php'); ?>

<?php
    if(isset($_GET['id'])){
        $teacher=Teacher::find_by_id(htmlspecialchars($_GET['id'], ENT_QUOTES, 'UTF-8'));
        htmlspecialchars($teacher->recycle=1, ENT_QUOTES, 'UTF-8');
        if($teacher->save()){
            $_SESSION['SuccessMessage']="بە سەرکەوتوی چوو بۆ بەشی سڕاوەکان";
            RedirectTo("teachers.php");
        }else{
            $_SESSION['ErrorMessage']="تکایە دووبارە هەوڵبدەرەوە";
            RedirectTo("teachers.php");
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
                <a href="add_new_teacher.php" class="btn btn-primary left mx-1"><i class="fas fa-plus"></i> زیادکردنی وانەبێژ</a>
                <a href="teacher_recycle.php" class="btn btn-danger left mx-1"><i class="fas fa-trash"></i> وانەبێژە سڕاوەکان</a>
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
                                if($teacher->recycle==0){
                        ?>
                        <tr>
                            <td><?php echo $a++; ?></td>
                            <td><?php echo $teacher->fullname; ?></td>
                            <td><?php
                                if($teacher->certificate==0){
                                    echo htmlspecialchars("دبلۆم", ENT_QUOTES, 'UTF-8');
                                }elseif($teacher->certificate==1){
                                    echo htmlspecialchars("بکالۆریۆس", ENT_QUOTES, 'UTF-8');
                                }elseif($teacher->certificate==2){
                                    echo htmlspecialchars("ماجستێر", ENT_QUOTES, 'UTF-8');
                                }else{
                                    echo htmlspecialchars("دکتۆرا", ENT_QUOTES, 'UTF-8');
                                }
                            ?></td>
                            <td><?php echo htmlspecialchars($teacher->nickname, ENT_QUOTES, 'UTF-8'); ?></td>
                            <td><?php echo htmlspecialchars($teacher->one_day_money, ENT_QUOTES, 'UTF-8'); ?></td>
                            <td><?php echo htmlspecialchars($teacher->a_houer_on_week, ENT_QUOTES, 'UTF-8'); ?></td>
                            <td><?php echo htmlspecialchars($teacher->research, ENT_QUOTES, 'UTF-8'); ?></td>
                            <td><?php echo htmlspecialchars($teacher->one_houer_money, ENT_QUOTES, 'UTF-8'); ?></td>
                            <td><?php 
                            if($teacher->contract==0){
                                echo htmlspecialchars("بەڵێ", ENT_QUOTES, 'UTF-8');
                            }else{
                                echo htmlspecialchars("نەخێر", ENT_QUOTES, 'UTF-8');
                            }
                            ?></td>
                            <td>
                                <a  href="edit_teacher.php?id=<?php echo htmlspecialchars($teacher->id, ENT_QUOTES, 'UTF-8'); ?>"><button class="btn btn-primary"><i class="fas fa-edit" title="دەستکاریکردن"></i></button></a>  
                                <button class='btn btn-danger ' id="btn-model"><i disabled class="fas fa-trash"></i></button>
                            <div class="back-model">
                            <div class="model">
                                <div class="model-header">
                                    ئاگاداری
                                </div>
                                <div class="model-body">
                                    دڵنیایت لە سرینەوەی <?php echo $teacher->fullname; ?>
                            </div>
                                <div class="model-footer">
                                    <a href="teachers.php?id=<?php echo $teacher->id; ?>"><button class="btn btn-success">بەڵێ</button></a>
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