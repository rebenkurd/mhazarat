<?php 

class User extends Db_Object{
    public static $db_table="tb_users";
    public static $db_table_fields=array('id','username','email','password','first_name','last_name','user_image','recycle');
    public $id;
    public $username;
    public $email;
    public $password;
    public $first_name;
    public $last_name;
    public $user_image;
    public $bio;
    public $recycle;
    public $upload_directory="img";
    public $image_placeholder="http://placehold.it/400x400&text=image";
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

    public function image_upload(){

        // if(!empty($this->errors)){
        //     return false;
        // }
        if(!empty($this->errors)){
            return false;
        }

        if(empty($this->user_image) || empty($this->tmp_path)){
            $this->errors[]="فایلەکە بەردەست نییە";
            return false;
        }

        $target_path=SITE_ROOT.DS.$this->upload_directory.DS.$this->user_image;

        if(file_exists($target_path)){
            $this->errors[]="پێشتر هەیە {$this->user_image} فایلی ";
            return false;
        }

        if(move_uploaded_file($this->tmp_path,$target_path)){
            unset($this->tmp_path);
            return true;
        }else{
            $this->errors[]="لەوانەیە فایلەکەت ئاماژە پێنەکرابێ";
            return false;
        }
    }

    public function image_path(){
        return $this->upload_directory.DS.$this->user_image;
    }

    public function delete_user(){
        if($this->delete()){
            $target_path=SITE_ROOT.DS.$this->image_path();
            return unlink($target_path) ? true:false;
        }else{
            return false;
        }
    }

    public function image_path_and_placeholder(){
        return empty($this->user_image) ? $this->image_placeholder : $this->upload_directory.DS.$this->user_image;
    }


    public static function verify_user($username,$password){
        global $database;
        $username=$database->es($username);
        $password=$database->es($password);
        $sql="SELECT * FROM ". self::$db_table . " WHERE username='$username' AND password='$password' LIMIT 1";
        $the_result_array= self::find_by_query($sql);
        return !empty($the_result_array) ? array_shift($the_result_array):false;
    }




}

?>