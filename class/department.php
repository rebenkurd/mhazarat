<?php

class Department extends Db_Object{

    public static $db_table="tb_departments";
    public static $db_table_fields=array('id','department_name','recycle');
    public $id;
    public $department_name;
    public $recycle;
}





?>