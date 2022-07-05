<?php include('includes/header.php'); ?>
<?php include('includes/top_nav.php'); ?>

<?php
    if(isset($_GET['id'])){
        $teacher=Teacher::find_by_id(htmlspecialchars($_GET['id'], ENT_QUOTES, 'UTF-8'));
        htmlspecialchars($teacher->recycle=0, ENT_QUOTES, 'UTF-8');
        if($teacher->save()){
            $_SESSION['SuccessMessage']="بە سەرکەوتووی گەڕێندرایەوە";
            RedirectTo("teachers.php");
        }else{
            $_SESSION['ErrorMessage']="تکایە دووبارە هەوڵبدەرەوە";
            RedirectTo("teacher_recycle.php");
        }
    }

?>
    <div class="main">
    <?php include('includes/side_nav.php'); ?>
    <div class="container">
        <h1>وانەبێژەکان</h1>
        <div class="content">
        <?php echo $session->SuccessMessage(); ?>
        <?php echo $session->ErrorMessage(); ?>
        <div class="recents">
                <span>بینینی وانەبێژە سڕاوەکان</span>
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
                        <tr id="tr_teacher_<?php echo $teacher->id; ?>">
                            <td><?php echo htmlspecialchars($a++, ENT_QUOTES, 'UTF-8'); ?></td>
                            <td><?php echo htmlspecialchars($teacher->fullname, ENT_QUOTES, 'UTF-8'); ?></td>
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
                                <a  href="teacher_recycle.php?id=<?php echo htmlspecialchars($teacher->id, ENT_QUOTES, 'UTF-8'); ?>"><button class="btn btn-success"><i class="fas fa-recycle" title="گەراندنەو"></i></button></a>  
                                <button class='btn btn-danger ' id="btn-model"><i disabled class="fas fa-trash"></i></button>
                            <div class="back-model">
                            <div class="model">
                                <div class="model-header">
                                    ئاگاداری
                                </div>
                                <div class="model-body">
                                    دڵنیایت لە سرینەوەی <?php echo htmlspecialchars($teacher->fullname, ENT_QUOTES, 'UTF-8'); ?>
                            </div>
                                <div class="model-footer">
                                    <!-- <a href="delete_teacher.php?id=<?php echo htmlspecialchars($teacher->id, ENT_QUOTES, 'UTF-8'); ?>"> -->
                                    <button type="button" class="btn btn-success" onclick="teacherDelete(<?php echo htmlspecialchars($teacher->id, ENT_QUOTES, 'UTF-8'); ?>)">بەڵێ</button>
                                <!-- </a> -->
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