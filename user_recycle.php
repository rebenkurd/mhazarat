<?php include('includes/header.php'); ?>
<?php include('includes/top_nav.php'); ?>
<?php
    if(isset($_GET['id'])){
        $user=User::find_by_id(htmlspecialchars($_GET['id'], ENT_QUOTES, 'UTF-8'));
        htmlspecialchars($user->recycle=0, ENT_QUOTES, 'UTF-8');
        if($user->save()){
            $_SESSION['SuccessMessage']="بە سەرکەوتووی گەڕێندرایەوە";
            RedirectTo("users.php");
        }else{
            $_SESSION['ErrorMessage']="تکایە دووبارە هەوڵبدەرەhtmlspecialchars(, ENT_QUOTES, 'UTF-8')وە";
            RedirectTo("user_recycle.php");
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
                <span>بینینی بەکارهێنەرە سڕدراوەکان</span>
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
                            <td><?php echo htmlspecialchars($a++, ENT_QUOTES, 'UTF-8'); ?></td>
                            <td><img src="<?php echo htmlspecialchars($user->image_path_and_placeholder(), ENT_QUOTES, 'UTF-8'); ?>" class="image-flued"></td>
                            <td><?php echo htmlspecialchars($user->username, ENT_QUOTES, 'UTF-8'); ?></td>
                            <td><?php echo htmlspecialchars($user->email, ENT_QUOTES, 'UTF-8'); ?></td>
                            <td><?php echo htmlspecialchars($user->first_name, ENT_QUOTES, 'UTF-8'); ?></td>
                            <td><?php echo htmlspecialchars($user->last_name, ENT_QUOTES, 'UTF-8'); ?></td>
                            <td>
                                <a  href="user_recycle.php?id=<?php echo htmlspecialchars($user->id, ENT_QUOTES, 'UTF-8'); ?>"><button class="btn btn-success"><i class="fas fa-recycle" title="گەراندنەو"></i></button></a>  
                                <button class='btn btn-danger ' id="btn-model"><i disabled class="fas fa-trash"></i></button>
                            <div class="back-model">
                            <div class="model">
                                <div class="model-header">
                                    ئاگاداری
                                </div>
                                <div class="model-body">
                                    دڵنیایت لە سرینەوەی <?php echo htmlspecialchars($user->username, ENT_QUOTES, 'UTF-8'); ?>
                            </div>
                                <div class="model-footer">
                                    <a href="delete_user.php?id=<?php echo htmlspecialchars($user->id, ENT_QUOTES, 'UTF-8'); ?>"><button class="btn btn-success">بەڵێ</button></a>
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