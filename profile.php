
<?php include('includes/header.php'); ?>


<?php include('includes/top_nav.php'); ?>
<div class="main">
    <?php include('includes/side_nav.php'); ?>

    <div class="container">
<h1>زانیاری</h1>
<div class="profile">
<?php
    $user=User::find_by_id($_SESSION['user_id']);
?>
<div class="phead">
    <div class="pimage">
        <img src="img/<?php echo $user->user_image; ?>" alt="">
    </div>
    <div class="pinfo">
        <span><?php echo $user->first_name." ".$user->last_name; ?></span>
        <br>
        <span><?php echo $user->username; ?>&#64;</span>
    </div>
</div>
<div class="pbody">
        <p>
        <?php 
        if($user->bio==""){
            echo '<span class="text-danger">هیچ زانیارییەک نییە</span>';
        }else{
            echo $user->bio; 
        }
        
        
        ?></p>
</div>
</div>
<?php include('includes/footer.php'); ?>