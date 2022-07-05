<?php include('includes/header.php'); ?>
<?php include('includes/top_nav.php'); ?>

<?php
    if(isset($_GET['id'])){
        $staff=Staff::find_by_id(htmlspecialchars($_GET['id'], ENT_QUOTES, 'UTF-8'));
        htmlspecialchars($staff->recycle=1, ENT_QUOTES, 'UTF-8');
        if($staff->save()){
            $_SESSION['SuccessMessage']="بە سەرکەوتوی چوو بۆ بەشی سڕاوەکان";
            RedirectTo("staff.php");
        }else{
            $_SESSION['ErrorMessage']="تکایە دووبارە هەوڵبدەرەوە";
            RedirectTo("staff.php");
        }
    }

?>
    <div class="main">
    <?php include('includes/side_nav.php'); ?>
    <div class="container">
        <h1>ستاف</h1>
        <div class="content">
        <?php echo $session->SuccessMessage(); ?>
        <?php echo $session->ErrorMessage(); ?>
        <div class="recents">
                <span>بینینی هەموو ستافەکان</span>
                <table id="table" class="display" style="width:100%">
                <a href="add_new_staff.php" class="btn btn-primary left mx-1"><i class="fas fa-plus"></i> زیادکردنی ستاف</a>
                <a href="staff_recycle.php" class="btn btn-danger left mx-1"><i class="fas fa-trash"></i> ستافە سڕاوەکان</a>
                    <thead>
                        <tr>
                            <th>ژمارە</th>
                            <th>ناو</th>
                            <th>ئیمەیڵ</th>
                            <th>ژمارەی مۆبایل</th>
                            <th>بەرپرسیارێتی</th>
                            <th>کردارەکان</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        <?php 
                            $staffs = Staff::find_all();
                            $a=1;
                            foreach($staffs as $staff){
                                if($staff->recycle==0){
                        ?>
                        <tr>
                            <td><?php echo htmlspecialchars($a++, ENT_QUOTES, 'UTF-8'); ?></td>
                            <td><?php echo htmlspecialchars($staff->name, ENT_QUOTES, 'UTF-8'); ?></td>
                            <td><?php echo htmlspecialchars($staff->email, ENT_QUOTES, 'UTF-8'); ?></td>
                            <td><?php echo htmlspecialchars($staff->phone, ENT_QUOTES, 'UTF-8'); ?></td>
                            <td>
                                <?php 
                                
                                $responsibility=Responsibility::find_by_id(htmlspecialchars($staff->responsibility_id, ENT_QUOTES, 'UTF-8'));
                                echo htmlspecialchars($responsibility->name, ENT_QUOTES, 'UTF-8');
                                ?>
                            </td>

                            <td>
                                <a  href="edit_staff.php?id=<?php echo htmlspecialchars($staff->id, ENT_QUOTES, 'UTF-8'); ?>"><button class="btn btn-primary"><i class="fas fa-edit" title="دەستکاریکردن"></i></button></a>  
                                <button class='btn btn-danger ' id="btn-model"><i disabled class="fas fa-trash"></i></button>
                            <div class="back-model">
                            <div class="model">
                                <div class="model-header">
                                    ئاگاداری
                                </div>
                                <div class="model-body">
                                    دڵنیایت لە سرینەوەی <?php echo $staff->name; ?>
                            </div>
                                <div class="model-footer">
                                    <a href="staff.php?id=<?php echo htmlspecialchars($staff->id, ENT_QUOTES, 'UTF-8'); ?>"><button class="btn btn-success">بەڵێ</button></a>
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