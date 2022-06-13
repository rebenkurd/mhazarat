<?php include('includes/header.php'); ?>
<?php include('includes/top_nav.php'); ?>

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
                        <tr>
                            <td><?php echo $a++; ?></td>
                            <td><?php echo $staff->name; ?></td>
                            <td><?php echo $staff->email; ?></td>
                            <td><?php echo $staff->phone; ?></td>
                            <td>
                                <?php 
                                
                                $responsibility=Responsibility::find_by_id($staff->responsibility_id);
                                echo $responsibility->name;
                                ?>
                            </td>
                            <td>
                                <!-- <a onclick="btnOpenModel()" class="btn-submit btn-model"><i class="fas fa-trash text-danger" title="سڕینەوە"></i></a> -->
                                <a href="delete_staff.php?id=<?php echo $staff->id; ?>" class="btn-submit"><i class="fas fa-trash text-danger" title="سڕینەوە"></i></a>
                                
                            </td>
                        </tr>
                        <!-- <div class="back-model">
                            <div class="model">
                                <div class="model-header">
                                    ئاگاداری
                                </div>
                                <div class="model-body">
                                    دڵنیایت لە سرینەوەی <?php //echo $time->times.$time->time_type; ?>
                            </div>
                                <div class="model-footer">
                                    <button class="btn btn-success"><a href="times.php?id=<?php // echo $time->id; ?>" >بەڵێ</a></button>
                                    <button class="btn btn-danger close" onclick="btnCloseModel()">نەخێر</button>
                                </div>
                            </div>
                        </div> -->
                        <?php } } ?>
                    </tbody>
                </table>
            </div>
        </div>
        </div>
    </div>

<?php include('includes/footer.php'); ?>