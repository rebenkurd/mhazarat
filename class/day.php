<?php

class Day extends Db_Object{

    public static $db_table="tb_days";
    public static $db_table_fields=array('id','day');
    public $id;
    public $day;

}

?>