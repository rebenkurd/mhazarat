<?php include('includes/header.php'); ?>
<?php include('includes/top_nav.php'); ?>
<?php
    if(isset($_GET['id'])){
        $staff=Staff::find_by_id(htmlspecialchars($_GET['id'], ENT_QUOTES, 'UTF-8'));
        htmlspecialchars($staff->recycle=0, ENT_QUOTES, 'UTF-8');
        if($staff->save()){
            $_SESSION['SuccessMessage']="بە سەرکەوتوی گەڕێندرایەوە";
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
        <?php echo htmlspecialchars($session->SuccessMessage(), ENT_QUOTES, 'UTF-8'); ?>
        <?php echo htmlspecialchars($session->ErrorMessage(), ENT_QUOTES, 'UTF-8'); ?>
        <div class="recents">
                <span>بینینی هەموو ستافەکان</span>
                <table id="table" class="display" style="width:100%">
                <a href="staff.php" class="btn btn-primary left mx-1"><i class="fas fa-plus"></i> ستافەکان</a>
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
                                if($staff->recycle==1){
                        ?>
                        <tr id="tr_staff_<?php echo $staff->id;?>">
                            <td><?php echo $a++; ?></td>
                            <td><?php echo $staff->name; ?></td>
                            <td><?php echo $staff->email; ?></td>
                            <td><?php echo $staff->phone; ?></td>
                            <td>
                                <?php 
                                
                                $responsibility=Responsibility::find_by_id(htmlspecialchars($staff->responsibility_id, ENT_QUOTES, 'UTF-8'));
                                echo htmlspecialchars($responsibility->name, ENT_QUOTES, 'UTF-8');
                                ?>
                            </td>
                            <td>
                                <a  href="staff_recycle.php?id=<?php echo htmlspecialchars($staff->id, ENT_QUOTES, 'UTF-8'); ?>"><button class="btn btn-success"><i class="fas fa-recycle" title="گەراندنەو"></i></button></a>  
                                <button class='btn btn-danger ' id="btn-model"><i disabled class="fas fa-trash"></i></button>
                            <div class="back-model">
                            <div class="model">
                                <div class="model-header">
                                    ئاگاداری
                                </div>
                                <div class="model-body">
                                    دڵنیایت لە سرینەوەی <?php echo htmlspecialchars($staff->name, ENT_QUOTES, 'UTF-8'); ?>
                            </div>
                                <div class="model-footer">
                                <button type="button" class="btn btn-success" onclick="staffDelete(<?php echo htmlspecialchars($staff->id, ENT_QUOTES, 'UTF-8'); ?>)">بەڵێ</button>
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