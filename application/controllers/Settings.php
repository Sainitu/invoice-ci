<?php
   defined('BASEPATH') OR exit('No direct script access allowed');

   class Settings extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('tank_auth');
        $this->load->model('user_model');
        $this->load->helper('form');
        if(!$this->tank_auth->is_logged_in()){
            redirect('/auth/logout/');
        }
    }

        public function update(){
           
            $this->form_validation->set_rules('email','Email','required|max_length[30]|trim');
            $id =  $this->session->userdata('user_id');
            
            if($this->form_validation->run()){
              
              
                $this->user_model->updateUser($id);
                redirect(base_url('settings'));
            }else{
                $this->load->view('Settings');
            }
            
        }
        public function update1(){
            $this->form_validation->set_rules('first_name','First Name','required|max_length[40]');
            $this->form_validation->set_rules('last_name','Last Name','required|max_length[40]');
            
            $id =  $this->session->userdata('user_id');
            
            if($this->form_validation->run()){
              
              
                $this->user_model->updateUser1($id);
                redirect(base_url('settings'));
            }else{
                $this->load->view('Settings');
            }
        }

       public function index() {
           // Load the view for the Settings page
           
        //    $this->load->view('Settings');
           if ($this->tank_auth->is_logged_in()) {
            // Get the user's email address
            $data['username']	= $this->tank_auth->get_username();
            $user_data = $this->tank_auth->get_user_email($this->tank_auth->get_user_id());
            $user_data1 = $this->tank_auth->get_user_first_name($this->tank_auth->get_user_id());
            $user_data2 = $this->tank_auth->get_user_last_name($this->tank_auth->get_user_id());


            // Pass the email address to the settings view
            $data['user_email'] = $user_data;
            $data['user_first_name'] = $user_data1;
            $data['user_last_name'] = $user_data2;

            // Load the settings view with the user's email address
            $this->load->view('settings', $data);
        } else {
            // Handle the case when the user is not logged in
            // Redirect to the login page or display an error message
        }
       }
   }
