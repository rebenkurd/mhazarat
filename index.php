<?php include('includes/header.php'); ?>
<?php



$daily_info=new Daily_Info();
if(isset($_POST['submit'])){
    $daily_info->teacher_id=trim($_POST['teacher_id']);
    $daily_info->date=trim($_POST['date']);
    $daily_info->day=trim(date('d',strtotime($_POST['date'])));
    $daily_info->week=trim(date('D',strtotime($_POST['date'])));
    $daily_info->year=trim(date('Y',strtotime($_POST['date'])));
    $daily_info->num_week=trim($_POST['num_week']);
    $daily_info->fullname=trim($_POST['fullname']);
    $daily_info->department=trim($_POST['department']);
    $daily_info->lesson_name=trim($_POST['lesson']);
    $daily_info->stage=trim($_POST['stage']);
    $daily_info->start_time=trim($_POST['start_time']);
    $daily_info->end_time=trim($_POST['end_time']);
    if($daily_info->save()){
        RedirectTo("index.php?teacher_id=$daily_info->teacher_id");
    }else{
        RedirectTo("index.php");
    }
}

?>
<?php include('includes/top_nav.php'); ?>

<div class="main">
    <?php include('includes/side_nav.php'); ?>

    <div class="container">
        <h1>Dashboard</h1>
        <div class="details">
            <div class="card">
                <div class="iconbx">
                    <i class="fas fa-eye"></i>
                </div>
                <div>
                    <span class="card-name">View</span>
                    <br>
                    <span class="numbers">12,738</span>
                </div>
            </div>
            <div class="card">
                <div class="iconbx">
                    <i class="fas fa-users"></i>
                </div>
                <div>
                    <span class="card-name">Teachers</span>
                    <br>
                    <span class="numbers">128</span>
                </div>
            </div>
            <div class="card">
                <div class="iconbx">
                    <i class="fas fa-book"></i>
                </div>
                <div>
                    <span class="card-name">Books</span>
                    <br>
                    <span class="numbers">1238</span>
                </div>
            </div>
            <div class="card">
                <div class="iconbx">
                    <i class="fas fa-clock"></i>
                </div>
                <div>
                    <span class="card-name">Date</span>
                    <br>
                    <span class="numbers">12/12/2021</span>
                </div>
            </div>
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