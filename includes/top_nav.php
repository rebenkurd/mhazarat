<div class="top-nav">
        <div class="logo">
            <a href="">پ.ت.دووکان</a>
        </div>
        <!-- <div class="search">
            <i class="icon fas fa-search"></i>
            <input type="text" placeholder="Search Here ..." name="search" id="search">
        </div> -->
        <div class="user">
            <?php 
            $user=User::find_by_id($_SESSION['user_id']);

?>
        <img src="<?php echo htmlspecialchars($user->image_path_and_placeholder(), ENT_QUOTES, 'UTF-8'); ?>" class="image-flued">
            <div class="dropdown">
                <ul>
                    <a href="profile.php"><li><i class="fas fa-user"></i> زانیاری</li></a>
                    <a href="profile_setting.php"><li><i class="fas fa-cog"></i> ڕێکخستن</li></a>
                    <a href="logout.php"><li><i class="fas fa-sign-out-alt"></i> چوونەدەرەوە</li></a>
                </ul>
            </div>
        </div>
        <div class="toggle toggle-btn">
            <i class="toggle-btn fas fa-bars " ></i>
        </div>
        <div class="theme-mode" onclick="switchTheme()">
            <i class="fas fa-sun light"></i>
            <i class="fas fa-moon dark"></i>
        </div>

    </div>