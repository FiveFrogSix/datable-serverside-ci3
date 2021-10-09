<?php 
class Config_model extends CI_Model {
    public function check_session($action){
        if($action == 'login'){
            if(!isset($_SESSION['bbp_token'])){
                return header("Location: ".base_url('p/login'));
            }
        }elseif($action == 'loging'){
            if(isset($_SESSION['bbp_token'])){
                return header("Location: ".base_url());
            }
        }
    }
}
