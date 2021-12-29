<?php

class Lesson extends Db_Object{

    public static $db_table="tb_lessons";
    public static $db_table_fields=array('id','lesson','recycle');
    public $id;
    public $lesson;
    public $recycle;
}





?>