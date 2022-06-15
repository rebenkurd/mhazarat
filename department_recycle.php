<?php include('includes/header.php'); ?>
<?php include('includes/top_nav.php'); ?>
<?php
    if(isset($_GET['id'])){
        $department=Department::find_by_id(htmlspecialchars($_GET['id'], ENT_QUOTES, 'UTF-8'));
        htmlspecialchars($department->recycle=0, ENT_QUOTES, 'UTF-8');
        if($department->save()){
            $_SESSION['SuccessMessage']="بە سەرکەوتووی گەڕێندرایەوە";
            RedirectTo("departments.php");
        }else{
            $_SESSION['ErrorMessage']="تکایە دووبارە هەوڵبدەرەوە";
            RedirectTo("department_recycle.php");
        }
    }

?>
    <div class="main">
    <?php include('includes/side_nav.php'); ?>
    <div class="container">
        <h1>بەشەکان</h1>
        <div class="content">
        <?php echo htmlspecialchars($session->SuccessMessage(), ENT_QUOTES, 'UTF-8'); ?>
        <?php echo htmlspecialchars($session->ErrorMessage(), ENT_QUOTES, 'UTF-8'); ?>
        <div class="recents">
                <span>بینینی بەشە سڕدراوەکان</span>
                <table id="table" class="display" style="width:100%">
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
                                if($department->recycle==1){
                        ?>
                        <tr>
                            <td><?php echo htmlspecialchars($a++, ENT_QUOTES, 'UTF-8'); ?></td>
                            <td><?php echo htmlspecialchars($department->department_name, ENT_QUOTES, 'UTF-8'); ?></td>
                            <td>
                                <a style="font-size: 1rem;" href="department_recycle.php?id=<?php echo htmlspecialchars($department->id, ENT_QUOTES, 'UTF-8'); ?>"><i class="fas fa-recycle text-success" title="گەراندنەو"></i></a>    
                                <a onclick="btnOpenModel()" class="btn-submit btn-model"><i class="fas fa-trash text-danger" title="سڕینەوە"></i></a>
                            <div class="back-model">
                            <div class="model">
                                <div class="model-header">
                                    ئاگاداری
                                </div>
                                <div class="model-body">
                                    دڵنیایت لە سرینەوەی بەتەواوی<?php echo htmlspecialchars($department->department_name, ENT_QUOTES, 'UTF-8'); ?>
                            </div>
                                <div class="model-footer">
                                    <button class="btn btn-success"><a href="delete_department.php?id=<?php echo htmlspecialchars($department->id, ENT_QUOTES, 'UTF-8'); ?>" >بەڵێ</a></button>
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