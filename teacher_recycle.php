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
        <?php echo htmlspecialchars($session->SuccessMessage(), ENT_QUOTES, 'UTF-8'); ?>
        <?php echo htmlspecialchars($session->ErrorMessage(), ENT_QUOTES, 'UTF-8'); ?>
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
                                <a style="font-size: 1rem;" href="teacher_recycle.php?id=<?php echo htmlspecialchars($teacher->id, ENT_QUOTES, 'UTF-8'); ?>"><i class="fas fa-recycle text-success" title="گەراندنەو"></i></a>    
                                <button type="button" onclick="teacherDelete(<?php echo $teacher->id; ?>)" class="btn btn-danger"><i class="fas fa-trash" title="سڕینەوە"></i></button>
                            <!-- <div class="back-model">
                            <div class="model">
                                <div class="model-header">
                                    ئاگاداری
                                </div>
                                <div class="model-body">
                                    دڵنیایت لە سرینەوەی <?php // echo htmlspecialchars($teacher->fullname, ENT_QUOTES, 'UTF-8'); ?>
                            </div>
                                <div class="model-footer">
                                    <button class="btn btn-success"><a href="teachers.php?id=<?php //echo htmlspecialchars($teacher->id, ENT_QUOTES, 'UTF-8'); ?>" >بەڵێ</a></button>
                                    <button class="btn btn-danger close" onclick="btnCloseModel()">نەخێر</button>
                                </div>
                            </div>
                        </div> -->
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