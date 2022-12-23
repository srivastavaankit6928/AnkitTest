<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class signUp_control extends CI_Controller {

	public function __construct()
{
    parent::__construct();
    $this->load->model('signUp_data');
}

	public function index()
	{
		$this->load->view('signUp_view');
	}
	public function signUpAction()
	{
	
		$this->form_validation->set_rules('fname', 'name', 'required|min_length[3]');
		$this->form_validation->set_rules('sname', 'name', 'min_length[3]');
		$this->form_validation->set_rules('lname', 'name', 'required');
		$this->form_validation->set_rules('phone', 'phone',"required|max_length[10]|numeric");
		$this->form_validation->set_rules('email', 'email',"required|valid_email");
		$this->form_validation->set_rules('password', 'password',"required");
		$this->form_validation->set_rules('cpassword', 'cpassword',"required|matches[password]");
		$this->form_validation->set_rules('address', 'address',"required");

		if(!$this->form_validation -> run())
		{
			$this->load->view('signUp_view');
		}
		else{
			$post=$this->input->post();
			$value = array(
				'User_fname' =>$post['fname'] , 
				'User_mname' =>$post['sname'] , 
				'User_lname' =>$post['lname'] , 
				'User_phone' => $post['phone'], 
				'User_email' => $post['email'], 
				'User_password' =>$post['password'] , 
				'User_address' =>$post['address'] , 
				'User_status' =>0,		
		        );
				

				$validUser= $this->signUp_data->validUser($value['User_email']);
				if($validUser == 1)
				{
				     $usercheck = $this->signUp_data->usersSignup($value);
					 
				     if($usercheck)
					 {
					 redirect('signIn_control');
				     }
					 else
					 {
					 redirect('signUp_control');
				     }
				}	
				else{
					redirect('signUp_control');
				}

		}
	}
}
