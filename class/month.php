<?php

class Month extends Db_Object{

    public static $db_table="tb_months";
    public static $db_table_fields=array('id','month','name');
    public $id;
    public $month;
    public $name;

}

?>