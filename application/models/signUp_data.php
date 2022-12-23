<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class signUp_data extends CI_Model {

    public function usersSignup($value)
    {
       return $this->db->insert('user_info', $value);
       
    }

    public function validUser($value)
    {
        $is_userValid = "";
        $query = $this->db->select()
                    ->where(['User_email'=>$value])
                    ->get('user_info');
        
       if($query->num_rows()==0)
       {
        $is_userValid = 1;
       }
       else
       {
        $is_userValid = 0;
       }
       return $is_userValid ;
    }
    

    
    

}