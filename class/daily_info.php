<?php
class Daily_Info extends Db_Object{

    public static $db_table="tb_daily_info";
    public static $db_table_fields=array('id','teacher_id','fullname','department','stage','week','num_week','day','date','lesson_name','start_time','end_time','note');
    public $id;
    public $teacher_id;
    public $fullname;
    public $department;
    public $stage;
    public $week;
    public $num_week;
    public $date;
    public $day;
    public $lesson_name;
    public $start_time;
    public $end_time;
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

    public static function find_daily_info($teacher_id=0){
        global $database;
        $sql="SELECT * FROM ".self::$db_table;
        $sql .=" WHERE teacher_id=".$database->es($teacher_id);
        $sql .=" ORDER BY teacher_id ASC";
        return self::find_by_query($sql);
    }


}


?>