<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class signIn_control extends CI_Controller {

	public function __construct()
    {
    parent::__construct();
    $this->load->model('signIn_data');
    }  

	public function index()
	{
		$this->load->view('signIn_view');
	}
	
	public function loginAction()
	{
		$this->form_validation->set_rules('email', 'Email id', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password',"required|max_length[10]");
        if (!$this->form_validation->run())
                {
                        $this->load->view('signIn_view');
                }
                else
                {
                    $post = $this->input->post();
                    $userValue = array(
                        'email' => $post['email'], 
                        'password' =>  $post['password']
                    );
                    
                    $userData = $this->signIn_data->userLogin($userValue);
                    
                    if($userData){
                        redirect('Dashboard');
                    }else{
                        redirect('signUp_control');
                    }
                }   
	}

}
