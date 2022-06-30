<?php
class Daily_Info extends Db_Object{

    public static $db_table="tb_daily_info";
    public static $db_table_fields=array('id','teacher_id','fullname','department','stage','week','num_week','day','date','lesson_name','start_time','end_time','num_time','note','year','month');
    public $id;
    public $teacher_id;
    public $fullname;
    public $department;
    public $stage;
    public $week;
    public $num_week;
    public $date;
    public $year;
    public $day;
    public $month;
    public $lesson_name;
    public $start_time;
    public $end_time;
    public $num_time;
    public $note;

    public static function create_daily_info($teacher_id,$fullname,$department,$lesson_name){
        if(!empty($teacher_id) && !empty($fullname) && !empty($department) && !empty($lesson_name)){
            $daily_info=new Daily_Info();
            $daily_info->teacher_id=(int)$teacher_id;
            $daily_info->fullname=$fullname;
            $daily_info->department=$department;
            $daily_info->lesson_name=$lesson_name;
            return $daily_info;
        }else{
            return false;
        }


    }

    public static function find_daily_by_teacher_id($teacher_id=0){
        global $database;
        $sql="SELECT * FROM ".self::$db_table;
        $sql .=" WHERE teacher_id=".$database->es($teacher_id);
        return self::find_by_query($sql);
    }

    public static function find_daily_by_day($teacher_id=0,$day=0){
        global $database;
        $sql="SELECT * FROM ".self::$db_table;
        $sql .=" WHERE teacher_id=".$database->es($teacher_id)." AND day=".$database->es($day);
        return self::find_by_query($sql);
    }

    public static function find_daily_by_month($teacher_id=0,$month=0){
        global $database;
        $sql="SELECT * FROM ".self::$db_table;
        $sql .=" WHERE teacher_id=".$database->es($teacher_id)." AND month=".$database->es($month);
        return self::find_by_query($sql);
    }

    public static function find_daily_by_year($teacher_id=0,$year=0){
        global $database;
        $sql="SELECT * FROM ".self::$db_table;
        $sql .=" WHERE teacher_id=".$database->es($teacher_id)." AND year=".$database->es($year);
        return self::find_by_query($sql);
    }

    public static function find_daily_by_day_month_year($teacher_id=0,$day=0,$year=0,$month=0){
        global $database;
        $sql="SELECT * FROM ".self::$db_table;
        $sql .=" WHERE teacher_id=".$database->es($teacher_id)." AND day=".$database->es($day)." AND year=".$database->es($year)." AND month=".$database->es($month);
        return self::find_by_query($sql);
    }

    public static function daily_avalable($teacher_id){
        global $database;
        $sql="SELECT * FROM ".self::$db_table." WHERE teacher_id=".$database->es($teacher_id);
        if ($result=$database->query($sql)) {
            $rowcount=mysqli_num_rows($result);
            return $rowcount;
        }
    }

    public static function sum_num_time($num_time,$num_week){
        global $database;
        $sql="SELECT SUM($num_time) FROM " . static::$db_table." WHERE num_week=".$num_week;
        $result_set=$database->query($sql);
        $row= mysqli_fetch_array($result_set);
        return array_shift($row);
    }
    public static function sum_num_time_all($num_time){
        global $database;
        $sql="SELECT SUM($num_time) FROM " . static::$db_table;
        $result_set=$database->query($sql);
        $row= mysqli_fetch_array($result_set);
        return array_shift($row);
    }

    public static function sum_num_time_a_month($id,$num_time,$month){
        global $database;
        $sql="SELECT SUM($num_time) FROM " . static::$db_table." WHERE month=".$month." AND teacher_id=".$id;
        $result_set=$database->query($sql);
        $row= mysqli_fetch_array($result_set);
        return array_shift($row);
    }
}


?>