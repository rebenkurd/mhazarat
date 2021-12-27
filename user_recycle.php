<?php include('includes/header.php'); ?>
<?php include('includes/top_nav.php'); ?>
<?php
    if(isset($_GET['id'])){
        $user=User::find_by_id($_GET['id']);
        $user->recycle=0;
        if($user->save()){
            $_SESSION['SuccessMessage']="بە سەرکەوتوی چوو بۆ بەشی سڕاوەکان";
            RedirectTo("user_recycle.php");
        }else{
            $_SESSION['ErrorMessage']="تکایە دووبارە هەوڵبدەرەوە";
            RedirectTo("user_recycle.php");
        }
    }

?>
    <div class="main">
    <?php include('includes/side_nav.php'); ?>
    <div class="container">
        <h1>بەکارهێنەرە سڕدراوەکان</h1>
        <div class="content">
            <?php echo $session->SuccessMessage(); ?>
            <?php echo $session->ErrorMessage(); ?>
        <div class="recents">
                <span>بینینی هەموو بەکارهێنەرەکان</span>
                <table id="table" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>ژمارە</th>
                            <th>وێنە</th>
                            <th>بەکارهێنەر</th>
                            <th>ئیمەیڵ</th>
                            <th>ناوی یەکەم</th>
                            <th>ناوی دووەم</th>
                            <th>کردارەکان</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $users = User::find_all();
                            $a=1;
                            foreach($users as $user){
                                if($user->recycle==1){
                        ?>
                        <tr>
                            <td><?php echo $a++; ?></td>
                            <td><img src="<?php echo $user->image_path_and_placeholder(); ?>" class="image-flued"></td>
                            <td><?php echo $user->username; ?></td>
                            <td><?php echo $user->email; ?></td>
                            <td><?php echo $user->first_name; ?></td>
                            <td><?php echo $user->last_name; ?></td>
                            <td>
                                <a style="font-size: 1rem;" href="edit_user.php?id=<?php echo $user->id; ?>"><i class="fas fa-edit text-primary" title="دەستکاریکردن"></i></a>    
                                <a style="font-size: 1rem;" href="user_recycle.php?id=<?php echo $user->id; ?>"><i class="fas fa-recycle text-success" title="گەراندنەو"></i></a>    
                                <a onclick="btnOpenModel()" class="btn-submit btn-model"><i class="fas fa-trash text-danger" title="سڕینەوە"></i></a>
                            <div class="back-model">
                            <div class="model">
                                <div class="model-header">
                                    ئاگاداری
                                </div>
                                <div class="model-body">
                                 دڵنیایت لە سرینەوەی بەتەواوی <?php echo $user->username; ?>
                            </div>
                                <div class="model-footer">
                                    <a href="delete_user.php?id=<?php echo $user->id; ?>" class="btn btn-success">بەڵێ</a>
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