<?php include('includes/header.php'); ?>
<?php

?>
<?php include('includes/top_nav.php'); ?>

<div class="main">
    <?php include('includes/side_nav.php'); ?>
    <div class="container">
    <h1>زانیارییەکان</h1>
    <?php echo $session->SuccessMessage(); ?>
    <?php echo $session->ErrorMessage(); ?> 
    <div id="alert"></div>
    <div class="details">
    <a href="departments.php">
    <div class="card">
                <div class="iconbx">
                    <i class="fas fa-building"></i>
                </div>
                <div>
                    <span class="card-name">بەشەکان</span>
                    <br>
                    <span class="numbers"><?php echo htmlspecialchars(Department::count_all(), ENT_QUOTES, 'UTF-8'); ?></span>
                </div>
            </div>
        </a>
        <a href="teachers.php">
            <div class="card">
                <div class="iconbx">
                    <i class="fas fa-user-graduate"></i>
                </div>
                <div>
                    <span class="card-name">وانەبێژەکان</span>
                    <br>
                    <span class="numbers"><?php echo htmlspecialchars(Teacher::count_all(), ENT_QUOTES, 'UTF-8'); ?></span>
                </div>
            </div>
        </a>
        <a href="lessons.php">
            <div class="card">
                <div class="iconbx">
                    <i class="fas fa-book"></i>
                </div>
                <div>
                    <span class="card-name">وانەکان</span>
                    <br>
                    <span class="numbers"><?php echo htmlspecialchars(Lesson::count_all(), ENT_QUOTES, 'UTF-8'); ?></span>
                </div>
            </div>
        </a>
        <a href="users.php">
            <div class="card">
                <div class="iconbx">
                    <i class="fas fa-users"></i>
                </div>
                <div>
                    <span class="card-name">بەکارهێنەرەکان</span>
                    <br>
                    <span class="numbers"><?php echo htmlspecialchars(User::count_all(), ENT_QUOTES, 'UTF-8'); ?></span>
                </div>
            </div>
        </a>
        </div>

        <div class="content">
            <div class="recents">
                <span>زانیاری ڕۆژانە</span>

                <?php include("daily_info.php"); ?>

            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>