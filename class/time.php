<?php

class Time extends Db_Object{

    public static $db_table="tb_times";
    public static $db_table_fields=array('id','times','time_type','recycle');
    public $id;
    public $times;
    public $time_type;
    public $the_time;
    public $recycle;
}




?>