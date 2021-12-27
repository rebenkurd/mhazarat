<?php

class Session{


    private $signed_in;
    public $user_id;

    function __construct(){
        session_start();
        $this->check_the_login();
    }


    public function is_signed_in(){
        return $this->signed_in;
    }

    public function login($user){
    if($user){
        $this->user_id=$_SESSION['user_id']=$user->id;
        $this->signed_in=true;
    }
    }

    private function check_the_login(){
        if(isset($_SESSION['user_id'])){
            $this->user_id=$_SESSION['user_id'];
            $this->signed_in=true;
        }else{
            unset($this->user_id);
            $this->signed_in=false;
        }
    }

    public function SuccessMessage()
    {
        if (isset($_SESSION['SuccessMessage'])) {
            $Output = '<div class="alert alert-success text-center" role="alert">';
            $Output .= htmlentities($_SESSION['SuccessMessage']);
            $Output .= '</div>';
            $_SESSION['SuccessMessage'] = null;
            return $Output;
        }
    }

   public function ErrorMessage()
    {
        if (isset($_SESSION['ErrorMessage'])) {
            $Output  = '<div class="alert alert-danger text-center role="alert"">';
            $Output .= htmlentities($_SESSION['ErrorMessage']);
            $Output .= '</div>';
            $_SESSION['ErrorMessage'] = null;
            return $Output;
        }
    }
}
$session=new Session();
?>