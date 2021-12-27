<?php
class Db_Object{
    public $errors=array();
    public $upload_errors_array=array(
        UPLOAD_ERR_OK => "There is No Error",
        UPLOAD_ERR_INI_SIZE => "the uploaded file exceeds the upload_mix_filesize directive",
        UPLOAD_ERR_FORM_SIZE =>  "the uploaded file exceeds the MIX_FILE_SIZE directive that",
        UPLOAD_ERR_PARTIAL => "the uploaded file was only partially uploaded.",
        UPLOAD_ERR_NO_FILE  => "no file was uploaded" ,
        UPLOAD_ERR_NO_TMP_DIR => "missing a temporary folder.",
        UPLOAD_ERR_CANT_WRITE =>  "faield to write file to disk.",
        UPLOAD_ERR_EXTENSION  =>  "A PHP extention stopped the file upload.",
    );

    // create set file method 
    public function set_file($file){
        if(empty($file) || !$file || !is_array($file)){
            $this->errors[]="هیچ فایلێک بەرزنەکرایەوە";
            return false;
        }elseif($file['error'] != 0){
            $this->errors[]=$this->upload_errors_array[$file['error']];
            return false;
        }else{
            $this->user_image=basename($file['name']);
            $this->tmp_path=$file['tmp_path'];
            $this->type=$file['type'];
            $this->size=$file['size'];
        }
    }


    // create find all tables method
    public static function find_all(){
        global $database;
        return static::find_by_query("SELECT * FROM ".static::$db_table." ");
    }
    // create find tables by using id 
    public static function find_by_id($id){
        global $database;
        $the_result_array=static::find_by_query("SELECT * FROM ".static::$db_table." WHERE id='$id' LIMIT 1");
        return !empty($the_result_array) ? array_shift($the_result_array):false;
    }

    // create query method
    public static function find_by_query($sql){
        global $database;
        $result_set=$database->query($sql);
        $the_object_array=array();
        while($row=mysqli_fetch_array($result_set)){
            $the_object_array[]=static::instantation($row);
        }
        return $the_object_array;
    }

    // create instantaion method
    public static function instantation($the_record){
        $calling_class=get_called_class();
        $the_object=new $calling_class;

        foreach($the_record as $the_attribute => $value){
            if($the_object->has_the_attribute($the_attribute)){
                $the_object->$the_attribute=$value;
            }
        }
        return $the_object;
    }

    // craete has attribute function
    private function has_the_attribute($the_attribute){
        $the_properties=get_object_vars($this);
        return array_key_exists($the_attribute,$the_properties);
    }

    // create properties method
    protected function properties(){
        $properties=array();
        foreach(static::$db_table_fields as $db_field){
            if(property_exists($this,$db_field)){
                $properties[$db_field]=$this->$db_field;
            }
        }
        return $properties;
    }

    // create clean properties method
    protected function clean_properties(){
        global $database;
        $clean_properties=array();
        foreach($this->properties() as $key => $value){
            $clean_properties[$key]=$database->es($value);
        }
        return $clean_properties;   
    }
    // create save method
    public function save(){
        return isset($this->id) ? $this->update() : $this->create();
    }

    // making create method
    public function create(){
        global $database;
        $properties = $this->properties();
        $sql="INSERT INTO ". static::$db_table ."(". implode(",",array_keys($properties)).")";
        $sql .="VALUES('". implode("','",array_values($properties))."')";
        if($database->query($sql)){
            return true;
        }else{
            return false;
        }
    }

    // create update method
    public function update(){
        global $database;
        $properties=$this->properties();
        $properties_pairs=array();
        foreach($properties as $key => $value){
            $properties_pairs[]="{$key}='{$value}'";
        }
        $sql ="UPDATE ". static::$db_table . " SET ";
        $sql .=implode(", ",$properties_pairs);
        $sql .=" WHERE id='".$database->es($this->id)."' ";
        $database->query($sql);
        return mysqli_affected_rows($database->connection)==1 ? true : false;
    }

    // craete delete method
    public function delete(){
        global $database;
        $sql="DELETE FROM ". static::$db_table ." WHERE id='".$database->es($this->id)."' LIMIT 1";
        $database->query($sql);
        return mysqli_affected_rows($database->connection)==1 ? true : false;
    }



}




?>