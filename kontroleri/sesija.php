<?php

class Session{
    private $signed_in;
    public $user_id;

    function __construct()
    {
        session_start();
        $this->check_login();
        
    }

    public function is_signed_in(){
        return $this->signed_in;
    }

    public function login($user_id){
        $this->user_id = $_SESSION['user_id'] = $user_id;
        $this->signed_in = true;
    }

    public function logout(){
        unset($this->user_id);
        $this->signed_in = false;
        session_destroy();
    }

    private function check_login(){
        if(isset($_SESSION['user_id'])){
            $this->user_id = $_SESSION['user_id'];
            $this->signed_in = true;
        }else{
            unset($this->user_id);
            $this->signed_in = false;
        }
    }

    public function get_user_id(){
        return $this->user_id;
    }

    public function get_current_user(){
        global $konekcija;

        $sql = "SELECT * FROM korisnik WHERE id=" . $this->user_id . " LIMIT 1";
        $result = $konekcija->query($sql);
        if(!empty($result)){
            return $result;
        }
    }

}

$session = new Session();
?>