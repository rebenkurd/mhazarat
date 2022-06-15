
<?php include('includes/header.php'); ?>


<?php include('includes/top_nav.php'); ?>
<div class="main">
    <?php include('includes/side_nav.php'); ?>

    <div class="container">
<h1>زانیاری</h1>
<div class="profile">
<?php
    $user=User::find_by_id(htmlspecialchars($_SESSION['user_id'], ENT_QUOTES, 'UTF-8'));
?>
<div class="phead">
    <div class="pimage">
        <img src="img/<?php echo htmlspecialchars($user->user_image, ENT_QUOTES, 'UTF-8'); ?>" alt="">
    </div>
    <div class="pinfo">
        <span><?php echo htmlspecialchars($user->first_name." ".$user->last_name, ENT_QUOTES, 'UTF-8'); ?></span>
        <br>
        <span><?php echo htmlspecialchars($user->username, ENT_QUOTES, 'UTF-8'); ?>&#64;</span>
    </div>
</div>
<div class="pbody">
        <p>
        <?php 
        if($user->bio==""){
            echo htmlspecialchars('<span class="text-danger">هیچ زانیارییەک نییە</span>', ENT_QUOTES, 'UTF-8');
        }else{
            echo $user->bio; 
        }
        
        
        ?></p>
</div>
</div>
<?php include('includes/footer.php'); ?>