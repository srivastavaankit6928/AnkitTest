<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class signIn_data extends CI_Model {

    public function userLogin($userValue)
    {
        $query =$this->db->select()
        ->where(['User_email'=>$userValue['email'],'User_password'=>$userValue['password']])
                    ->get('user_info');
       if($query->result_array() == "")
       {
        return false;
       }
       else
       {
        return $query->result_array();
       }
    }
}