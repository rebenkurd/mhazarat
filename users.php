<?php include('includes/header.php'); ?>
<?php include('includes/top_nav.php'); ?>

<?php
    if(isset($_GET['id'])){
        $user=User::find_by_id(htmlspecialchars($_GET['id'], ENT_QUOTES, 'UTF-8'));
        htmlspecialchars($user->recycle=1, ENT_QUOTES, 'UTF-8') ;
        if($user->save()){
            $_SESSION['SuccessMessage']="بە سەرکەوتوی چوو بۆ بەشی سڕاوەکان";
            RedirectTo("users.php");
        }else{
            $_SESSION['ErrorMessage']="تکایە دووبارە هەوڵبدەرەوە";
            RedirectTo("users.php");
        }
    }

?>
    <div class="main">
    <?php include('includes/side_nav.php'); ?>
    <div class="container">
        <h1>بەکارهێنەرەکان</h1>
        <div class="content">
        <?php echo htmlspecialchars($session->SuccessMessage(), ENT_QUOTES, 'UTF-8'); ?>
        <?php echo htmlspecialchars($session->ErrorMessage(), ENT_QUOTES, 'UTF-8'); ?>
        <div class="recents">
                <span>بینینی هەموو بەکارهێنەرەکان</span>
                <table id="table" class="display" style="width:100%">
                <a href="add_new_user.php" class="btn btn-primary left mx-1"><i class="fas fa-plus"></i> زیادکردنی بەکارهێنەر</a>
                <a href="user_recycle.php" class="btn btn-danger left mx-1"><i class="fas fa-trash"></i> بەکارهێنەرە سڕاوەکان</a>

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
                                if($user->recycle==0){
                        ?>
                        <tr>
                            <td><?php echo htmlspecialchars($a++, ENT_QUOTES, 'UTF-8'); ?></td>
                            <td><img src="<?php echo htmlspecialchars($user->image_path_and_placeholder(), ENT_QUOTES, 'UTF-8'); ?>" class="image-flued"></td>
                            <td><?php echo htmlspecialchars($user->username, ENT_QUOTES, 'UTF-8'); ?></td>
                            <td><?php echo htmlspecialchars($user->email, ENT_QUOTES, 'UTF-8'); ?></td>
                            <td><?php echo htmlspecialchars($user->first_name, ENT_QUOTES, 'UTF-8'); ?></td>
                            <td><?php echo htmlspecialchars($user->last_name, ENT_QUOTES, 'UTF-8'); ?></td>
                            <td>
                                <a style="font-size: 1rem;" href="edit_user.php?id=<?php echo htmlspecialchars($user->id, ENT_QUOTES, 'UTF-8'); ?>"><i class="fas fa-edit text-primary" title="دەستکاریکردن"></i></a>    
                                <a onclick="btnOpenModel()" class="btn-submit btn-model"><i class="fas fa-trash text-danger" title="سڕینەوە"></i></a>
                            <div class="back-model">
                            <div class="model">
                                <div class="model-header">
                                    ئاگاداری
                                </div>
                                <div class="model-body">
                                    دڵنیایت لە سرینەوەی <?php echo htmlspecialchars($user->username, ENT_QUOTES, 'UTF-8'); ?>
                            </div>
                                <div class="model-footer">
                                    <button class="btn btn-success"><a href="users.php?id=<?php echo htmlspecialchars($user->id, ENT_QUOTES, 'UTF-8'); ?>" >بەڵێ</a></button>
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