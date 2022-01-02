<?php include('includes/header.php'); ?>
<?php include('includes/top_nav.php'); ?>
<?php


        $daily_info=new Daily_Info();
        if(isset($_POST['submit'])){
            $daily_info->teacher_id=trim($_POST['teacher_id']);
            $daily_info->date=trim($_POST['date']);
            $daily_info->day=trim($_POST['day']);
            $daily_info->week=trim($_POST['week']);
            $daily_info->num_week=trim($_POST['num_week']);
            $daily_info->fullname=trim($_POST['fullname']);
            $daily_info->department=trim($_POST['department']);
            $daily_info->lesson_name=trim($_POST['lesson']);
            $daily_info->stage=trim($_POST['stage']);
            $daily_info->start_time=trim($_POST['start_time']);
            $daily_info->end_time=trim($_POST['end_time']);
            if($daily_info->save()){
                RedirectTo("index.php?teacher_id=".$_GET['teacher_id']);
            }else{
                RedirectTo("index.php");
            }
        }
    



?>
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
                <div class="table-board">
                <div class="table-info">
                    <form action="" method="get">
                <div class="table-select my-1">
                    <label for="searching">گەڕان : </label>
                    <div class="form-controll" name="fullname-teacher" id="searching">
                        <?php                             
                                $teachers=Teacher::find_all();
                                foreach($teachers as $teacher):

                        ?>
                        <a href="index.php?teacher_id=<?php echo $teacher->id; ?>"><?php echo $teacher->fullname; ?></a>
                        <?php endforeach ?>
                        
                        </div>
                </div> 
                </form>
                <?php 
             
             if(isset($_GET['teacher_id'])){
                    $info=Teacher::find_by_id($_GET['teacher_id']);
         
                ?>
                <div class="teacher-code my-1">
                    <label for="">کۆدی وانەبێژ : </label>
                    <input type="text" class="form-controll" disabled value="<?php echo $info->id; ?>" placeholder="کۆدی وانەبێژ">
                    <input type="text" class="form-controll" disabled value="<?php echo $info->contract?"نەخێر":"بەڵێ"; ?>" placeholder="">
                </div>
                <div class="fullname my-1">
                    <label for="">ناوی سیانی وانەبێژ : </label>
                    <input type="text" class="form-controll" disabled value="<?php echo $info->fullname; ?>" placeholder="ناوی سیانی وانەبێژ">
                </div>
            <?php }else{?>
                <div class="teacher-code my-1">
                    <label for="">کۆدی وانەبێژ : </label>
                    <input type="text" class="form-controll" disabled  placeholder="کۆدی وانەبێژ">
                    <input type="text" class="form-controll" disabled  placeholder="">
                </div>
                <div class="fullname my-1">
                    <label for="">ناوی سیانی وانەبێژ : </label>
                    <input type="text" class="form-controll" disabled  placeholder="ناوی سیانی وانەبێژ">
                </div><?php }?>
            </div>
            <div class="date-board">
                <div class="day mx-1">
                <label for="day">ڕۆژ : </label>
                <select class="form-controll" name="" id="day">
                    <option value="">1</option>
                    <option value="">2</option>
                    <option value="">3</option>
                    <option value="">4</option>
                    <option value="">5</option>
                </select>
                </div>
                <div class="year mx-1">
                <label for="year">ساڵ : </label>
                <select class="form-controll" name="" id="year">
                    <option value="">2016</option>
                    <option value="">2017</option>
                    <option value="">2018</option>
                    <option value="">2019</option>
                    <option value="">2020</option>
                    <option value="">2021</option>
                    <option value="">2022</option>
                </select>
                </div>
            </div>
            <div class="month-report">
                <div class="show-report"> 
                   <button onclick="btnOpenModel()" class="btn btn-success w-50">پێشاندانی ڕاپۆرت</button>
                <div class="back-model">
                        <div class="model">
                            <form action="">
                            <div class="model-header">
                                ڕاپۆرت
                            </div>
                            <div class="model-body">
                            <div class="input-gropu">
                        <label for="">ڕۆژی یەکەم داخڵ بکە</label>
                        <input type="text" class="form-controll" placeholder="ڕۆژی یەکەم داخڵ بکە">
                    </div>
                    <div class="input-gropu">
                        <label for="">ڕۆژی کۆتایی داخڵ بکە</label>
                        <input type="text" class="form-controll" placeholder="ڕۆژی کۆتای داخڵ بکە">
                    </div>                            
                </div>
                    <div class="model-footer">
                        <button type="submit" class="btn btn-success">باشە</button>
                        <button class="btn btn-danger close" onclick="btnCloseModel()">لابردن</button>
                    </div>
                        </form>
                        </div>
                    </div>
                </div>
                <button onclick="btnOpenModel()" class="btn btn-primary w-50">ڕاپۆرتی مانگ</button>
                <div class="back-model">
                        <div class="model">
                            <form action="">
                            <div class="model-header">
                                ڕاپۆرتی مـانگانە
                            </div>
                            <div class="model-body">
                            <div class="input-gropu">
                        <label for="">ڕۆژی یەکەم داخڵ بکە</label>
                        <input type="text" class="form-controll" placeholder="ڕۆژی یەکەم داخڵ بکە">
                    </div>
                    <div class="input-gropu">
                        <label for="">ڕۆژی کۆتایی داخڵ بکە</label>
                        <input type="text" class="form-controll" placeholder="ڕۆژی کۆتای داخڵ بکە">
                    </div>                            
                </div>
                    <div class="model-footer">
                        <button type="submit" class="btn btn-success">باشە</button>
                        <button class="btn btn-danger close" onclick="btnCloseModel()">لابردن</button>
                    </div>
                        </form>
                        </div>
                    </div>

            </div>
            </div>
                <table id="table" class="display" style="width:100%">
                <thead>
                        <tr>
                            <th>کۆدی وانەبێژ</th>
                            <th>بەرواری هاتن</th>
                            <th>ڕۆژی هاتن</th>
                            <th>ژ.هەفتە</th>
                            <th>ناوی سیانی وانەبێژ</th>
                            <th>بەشی زانستی</th>
                            <th>قۆناغ</th>
                            <th>ناوی وانە</th>
                            <th>کاتی دەستپێک</th>
                            <th>کاتی تەواوبوون</th>
                            <th>تێبینی</th>
                            <th>کردارەکان</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if(isset($_GET['teacher_id'])){
                        $teacher=Teacher::find_by_id($_GET['teacher_id']);

                         $daily_infos=Daily_Info::find_daily_info($teacher->id);
                            foreach($daily_infos as $daily_info):
                                ?>
                        <tr>
                            <td><?php echo $daily_info->teacher_id; ?></td>
                            <td><?php echo $daily_info->date; ?></td>
                            <td><?php echo $daily_info->week; ?></td>
                            <td><?php echo $daily_info->num_week; ?></td>
                            <td><?php echo $daily_info->fullname; ?></td>
                            <td><?php echo $daily_info->department; ?></td>
                            <td><?php echo $daily_info->stage; ?></td>
                            <td><?php echo $daily_info->lesson_name; ?></td>
                            <td><?php echo $daily_info->start_time; ?></td>
                            <td><?php echo $daily_info->end_time; ?></td>
                            <td><?php echo $daily_info->note; ?></td>
                            <td><a href="delete_dayle_info.php?id=<?php echo $daily_info->id; ?>&teacher_id=<?php echo $daily_info->teacher_id; ?>"><i class="fas fa-trash text-danger"></i></a></td>

                        </tr>
                        <?php  endforeach; }?>

                        <tr>
                            <form action="" method="post">
                            <td>
                                <?php 
                                if(isset($_GET['teacher_id'])){
                                 $teacher=Teacher::find_by_id($_GET['teacher_id']); ?>
                                <input class="form-controll" style="width: 90px;" type="text" name="teacher_id" value="<?php echo $teacher->id; ?>" placeholder="کۆدی وانەبێژ">
                                <?php }else{ ?>
                                    <input class="form-controll" style="width: 90px;" type="text" name="teacher_id" placeholder="کۆدی وانەبێژ">
                                    <?php }?>
                            </td>                            
                            <td><input class="form-controll" style="width: 100px;" type="date" name="date" placeholder="بەرواری هاتن"></td>
                            <td><input class="form-controll" style="width: 100px;" type="text" name="day" placeholder="ڕۆژی هاتن"></td>
                            <td><input class="form-controll" style="width: 100px;" type="text" name="num_week" placeholder="ژ.هەفتە"></td>
                            <td>
                                <?php 
                                if(isset($_GET['teacher_id'])){
                                 $teacher=Teacher::find_by_id($_GET['teacher_id']); ?>
                                <input class="form-controll" style="width: 150px;" type="text" name="fullname" value="<?php echo $teacher->fullname; ?>" placeholder="ناوی سیانی وانەبێژ">
                                <?php }else{ ?>
                                <input class="form-controll" style="width: 150px;" type="text" name="fullname"  placeholder="ناوی سیانی وانەبێژ">
                                <?php }?>
                            </td>
                            <td>
                            <select name="department" class="form-controll" id="">
                                <option value=""></option>
                                <?php
                                    $departments=Department::find_all();
                                    foreach($departments as $department): 
                                ?>
                                <option value="<?php echo $department->department_name; ?>"><?php echo $department->department_name; ?></option>
                                <?php endforeach; ?>
                            </select>
                            </td>   
                            <td>
                            <select name="stage" class="form-controll" id="">
                                <option value=""></option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                            </select>
                            </td> 
                            <td>
                            <select name="lesson" class="form-controll" id="">
                                <option value=""></option>
                                <?php
                                    $lessons=Lesson::find_all();
                                    foreach($lessons as $lesson): 
                                ?>
                                <option value="<?php echo $lesson->lesson; ?>"><?php echo $lesson->lesson; ?></option>
                                <?php endforeach; ?>
                            </select>
                            </td>     

                            <td>
                            <select name="start_time" class="form-controll" id="">
                                <option value=""></option>
                                <?php
                                    $times=Time::find_all();
                                    foreach($times as $time): 
                                ?>
                                <option value="<?php echo $time->times; ?>"><?php echo $time->times; ?></option>
                                <?php endforeach; ?>
                            </select>
                            </td>    
                            <td>
                            <select name="end_time" class="form-controll" id="">
                                <option value=""></option>
                                <?php
                                    $times=Time::find_all();
                                    foreach($times as $time): 
                                ?>
                                <option value="<?php echo $time->times; ?>"><?php echo $time->times; ?></option>
                                <?php endforeach; ?>
                            </select>
                            </td>    
                            <td><input class="btn btn-primary" style="width: 100px;" type="submit" name="submit" value="زیادکردن"></td>
                        </form>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        </div>
</div>

<?php include('includes/footer.php'); ?>