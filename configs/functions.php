<?php
session_start();
// Craete Autoloader Method 

function ClassAutoLoader($class){
    $class=strtolower($class);
    $the_path="includes/{$class}.php";
    if(file_exists($the_path)){
        require_once($the_path);
    }else{
       die("This File {$class}.php was Not Found!");
   }
}
spl_autoload_register('ClassAutoLoader');


function RedirectTo($loacation){
    return header("Location:".$loacation);
}


?>