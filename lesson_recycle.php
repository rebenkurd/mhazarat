<?php include('includes/header.php'); ?>
<?php include('includes/top_nav.php'); ?>

<?php
    if(isset($_GET['id'])){
        $lesson=Lesson::find_by_id($_GET['id']);
        $lesson->recycle=1;
        if($lesson->save()){
            $_SESSION['SuccessMessage']="بە سەرکەوتوی چوو بۆ بەشی سڕاوەکان";
            RedirectTo("lessons.php");
        }else{
            $_SESSION['ErrorMessage']="تکایە دووبارە هەوڵبدەرەوە";
            RedirectTo("lessons.php");
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
                <span>بینینی هەموو وانەکان</span>
                <table id="table" class="display" style="width:100%">
                <a href="add_new_lesson.php" class="btn btn-primary left mx-1"><i class="fas fa-plus"></i> زیادکردنی وانە</a>
                <a href="lesson_recycle.php" class="btn btn-success left mx-1"><i class="fas fa-plus"></i> وانە سڕاوەکان</a>
                    <thead>
                        <tr>
                            <th>ژمارە</th>
                            <th>وانە</th>
                            <th>کردارەکان</th>
                        </tr>
                    </thead>
                    
                  <tbody>
                        <?php 
                            $lessons = Lesson::find_all();
                            $a=1;
                            foreach($lessons as $lesson){
                                if($lesson->recycle==1){
                        ?>
                        <tr>
                            <td><?php echo $a++; ?></td>
                            <td><?php echo $lesson->lesson; ?></td>
                            <td>
                                <a onclick="btnOpenModel()" class="btn-submit btn-model"><i class="fas fa-trash text-danger" title="سڕینەوە"></i></a>
                            <div class="back-model">
                            <div class="model">
                                <div class="model-header">
                                    ئاگاداری
                                </div>
                                <div class="model-body">
                                    دڵنیایت لە سرینەوەی بە تەواوی<?php echo $lesson->lesson; ?>
                            </div>
                                <div class="model-footer">
                                    <button class="btn btn-success"><a href="delete_lesson.php?id=<?php echo $lesson->id; ?>" >بەڵێ</a></button>
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