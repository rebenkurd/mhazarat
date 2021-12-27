<?php

class Teacher extends Db_Object{
    public static $db_table="tb_teachers";
    public static $db_table_fields=array('id','fullname','certificate','nickname','a_houer_on_week','research','one_houer_money','contract','one_day_money','recycle');
    public $id;
    public $fullname;
    public $certificate;
    public $nickname;
    public $a_houer_on_week;
    public $research;
    public $one_houer_money;
    public $contract;
    public $one_day_money;
    public $recycle;

}





?>