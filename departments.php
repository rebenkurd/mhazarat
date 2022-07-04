<?php

use JetBrains\PhpStorm\Deprecated;

include('includes/header.php'); ?>
<?php include('includes/top_nav.php'); ?>

<?php
    if(isset($_GET['id'])){
        $department=Department::find_by_id(htmlspecialchars($_GET['id'], ENT_QUOTES, 'UTF-8'));
        htmlspecialchars($department->recycle=1, ENT_QUOTES, 'UTF-8');
        if($department->save()){
            $_SESSION['SuccessMessage']="بە سەرکەوتوی چوو بۆ بەشی سڕاوەکان";
            RedirectTo("departments.php");
        }else{
            $_SESSION['ErrorMessage']="تکایە دووبارە هەوڵبدەرەوە";
            RedirectTo("departments.php");
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
                <span>بینینی هەموو بەشەکان</span>
                <table id="table" class="display" style="width:100%">
                <a href="add_new_department.php" class="btn btn-primary left mx-1"><i class="fas fa-plus"></i> زیادکردنی بەش</a>
                <a href="department_recycle.php" class="btn btn-danger left mx-1"><i class="fas fa-trash"></i> بەشە سڕاوەکان</a>
                    <thead>
                        <tr>
                            <th>ژمارە</th>
                            <th>بەشی زانستی</th>
                            <th>کردارەکان</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        <?php 
                            $departments = Department::find_all();
                            $a=1;
                            foreach($departments as $department){
                                if($department->recycle==0){
                        ?>
                        <tr>
                            <td><?php echo htmlspecialchars($a++, ENT_QUOTES, 'UTF-8'); ?></td>
                            <td><?php echo htmlspecialchars($department->department_name, ENT_QUOTES, 'UTF-8'); ?></td>
                            <td>
                                <a  href="edit_department.php?id=<?php echo htmlspecialchars($department->id, ENT_QUOTES, 'UTF-8'); ?>"><button class="btn btn-primary"><i class="fas fa-edit" title="دەستکاریکردن"></i></button></a>  
                                <button class='btn btn-danger ' id="btn-model"><i disabled class="fas fa-trash"></i></button>
                            <div class="back-model">
                            <div class="model">
                                <div class="model-header">
                                    ئاگاداری
                                </div>
                                <div class="model-body">
                                    دڵنیایت لە سرینەوەی <?php echo $department->department_name; ?>
                            </div>
                                <div class="model-footer">
                                    <a href="departments.php?id=<?php echo htmlspecialchars($department->id, ENT_QUOTES, 'UTF-8'); ?>"><button class="btn btn-success">بەڵێ</button></a>
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