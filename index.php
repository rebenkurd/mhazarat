<?php include('includes/header.php'); ?>
<?php



$daily_info=new Daily_Info();
if(isset($_POST['submit'])){
    htmlspecialchars($daily_info->teacher_id=trim(filter_var($_POST['teacher_id'],FILTER_SANITIZE_NUMBER_INT)), ENT_QUOTES, 'UTF-8');
    htmlspecialchars($daily_info->date=trim(filter_var($_POST['date'],FILTER_SANITIZE_NUMBER_INT)), ENT_QUOTES, 'UTF-8');
    htmlspecialchars($daily_info->day=trim(filter_var(date('d',strtotime($_POST['date'])),FILTER_SANITIZE_NUMBER_INT)), ENT_QUOTES, 'UTF-8');
    htmlspecialchars($daily_info->week=trim(filter_var(date('D',strtotime($_POST['date'])),FILTER_SANITIZE_NUMBER_INT)), ENT_QUOTES, 'UTF-8');
    htmlspecialchars($daily_info->year=trim(filter_var(date('Y',strtotime($_POST['date'])),FILTER_SANITIZE_NUMBER_INT)), ENT_QUOTES, 'UTF-8');
    htmlspecialchars($daily_info->month=trim(filter_var(date('m',strtotime($_POST['date'])),FILTER_SANITIZE_NUMBER_INT)), ENT_QUOTES, 'UTF-8');
    htmlspecialchars($daily_info->num_week=trim(filter_var($_POST['num_week'],FILTER_SANITIZE_NUMBER_INT)), ENT_QUOTES, 'UTF-8');
    htmlspecialchars($daily_info->fullname=trim(filter_var($_POST['fullname'],FILTER_DEFAULT)), ENT_QUOTES, 'UTF-8');
    htmlspecialchars($daily_info->department=trim(filter_var($_POST['department'],FILTER_SANITIZE_NUMBER_INT)), ENT_QUOTES, 'UTF-8');
    htmlspecialchars($daily_info->lesson_name=trim(filter_var($_POST['lesson'],FILTER_DEFAULT)), ENT_QUOTES, 'UTF-8');
    htmlspecialchars($daily_info->stage=trim(filter_var($_POST['stage'],FILTER_SANITIZE_NUMBER_INT)), ENT_QUOTES, 'UTF-8');
    htmlspecialchars($daily_info->start_time=trim(filter_var($_POST['start_time'],FILTER_SANITIZE_NUMBER_INT)), ENT_QUOTES, 'UTF-8');
    htmlspecialchars($daily_info->end_time=trim(filter_var($_POST['end_time'],FILTER_SANITIZE_NUMBER_INT)), ENT_QUOTES, 'UTF-8');
    htmlspecialchars($daily_info->num_time=trim(filter_var(round(abs(strtotime($daily_info->start_time)-strtotime($daily_info->end_time))/3600,2),FILTER_SANITIZE_NUMBER_INT)), ENT_QUOTES, 'UTF-8');
    if($daily_info->save()){
        RedirectTo("index.php?teacher_id=".htmlspecialchars($daily_info->teacher_id, ENT_QUOTES, 'UTF-8'));
    }else{
        RedirectTo("index.php");
    }
}

?>
<?php include('includes/top_nav.php'); ?>

<div class="main">
    <?php include('includes/side_nav.php'); ?>

    <div class="container">

        
    <h1>زانیارییەکان</h1>
    <?php echo htmlspecialchars($session->SuccessMessage(), ENT_QUOTES, 'UTF-8'); ?>
    <?php echo htmlspecialchars($session->ErrorMessage(), ENT_QUOTES, 'UTF-8'); ?>
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