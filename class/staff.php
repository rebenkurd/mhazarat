<?php

class Staff extends Db_Object{

    public static $db_table="tb_staff";
    public static $db_table_fields=array('id','name','email','phone','responsibility_id','recycle');
    public $id;
    public $name;
    public $email;
    public $phone;
    public $responsibility_id;
    public $recycle;
}




?>