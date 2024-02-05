<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller
{	
	protected $vendorId = '';

	function __construct()
	{
		parent::__construct();

		 //$this->vendorId = $this->session->userdata ( 'user_id' );
		$this->load->model('user_model');
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->library('tank_auth');
        
        

	}

    
	/**
     * This function used to load views
     * @param {string} $viewName : This is view name
     * @param {mixed} $headerInfo : This is array of header information
     * @param {mixed} $pageInfo : This is array of page information
     * @param {mixed} $footerInfo : This is array of footer information
     * @return {null} $result : null
     */
	function loadViews($viewName = "", $headerInfo = NULL, $sideNavInfo = NULL,$topNavInfo = NULL, $pageInfo = NULL, $footerInfo = NULL){

        $this->load->view('template/header', $headerInfo);
        $this->load->view('template/side_nav', $sideNavInfo);
        $this->load->view('template/top_nav', $topNavInfo);
        $this->load->view($viewName, $pageInfo);
        $this->load->view('template/footer', $footerInfo);
    }

	function loadChangePass()
    {   
        $data['username']	= $this->tank_auth->get_username();
        $data['user_first_name'] = $this->tank_auth->get_user_first_name($this->tank_auth->get_user_id());
        $data['user_last_name'] = $this->tank_auth->get_user_last_name($this->tank_auth->get_user_id());
        $this->global['pageTitle'] = 'LTE : Change Password';
        
        $this->loadViews("changePassword", $data, $this->global, NULL, NULL);
    }

    

	// public function old_password_match($vOldPassword){
	// 	$result = $this->user_model->checkCurrentPassword($vOldPassword, 1);
	// 	if($result > 0){
	// 		return true;
	// 	}else{
	// 		return false;
	// 	}
	// }
  

	public function changePassword(){

		$this->load->library('form_validation');
        
        $this->form_validation->set_rules('oldPassword','Old password','required|max_length[20]');
        $this->form_validation->set_rules('newPassword','New password','required|max_length[20]');
        $this->form_validation->set_rules('cNewPassword','Confirm new password','required|matches[newPassword]|max_length[20]');
        
        if($this->form_validation->run() == FALSE)
        {
            $this->loadChangePass();
        }
        else
        {
            $oldPassword = $this->input->post('oldPassword');
            $newPassword = $this->input->post('newPassword');
            $this->vendorId = $this->session->userdata ( 'user_id' );
          //  echo "<pre>";print_r($this->vendorId);die;
            $resultPas = $this->user_model->matchOldPassword($this->vendorId, $oldPassword);
           
            // die("here");
            // showing resultPas as empty 
            if(empty($resultPas))
            {
                $this->session->set_flashdata('nomatch', 'Your old password not correct');
                redirect('loadChangePass');
            }
            else //code is not entering in the else part 
            {
                    
                $usersData = array('password'=>getHashedPassword($newPassword),);
                
                $result = $this->user_model->changePassword($this->vendorId, $usersData);
                
                if($result > 0) { $this->session->set_flashdata('success', 'Password updation successful'); }
                else { $this->session->set_flashdata('error', 'Password updation failed'); }
                
                if($this->tank_auth->is_logged_in()){
                    // redirect('loadChangePass');
                    redirect('/auth/logout/');
                }else{
                    redirect('loadChangePass');
                }

            }
        }

	}

    function loadChangePasswordSettings(){
        $this->load->view("settings");
    }

    public function changePasswordSettings(){
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('oldPassword','Old password','required|max_length[20]');
        $this->form_validation->set_rules('newPassword','New password','required|max_length[20]');
        $this->form_validation->set_rules('cNewPassword','Confirm new password','required|matches[newPassword]|max_length[20]');
        // print_r($this->form_validation->run());
        // die;
        if($this->form_validation->run() == FALSE)
        {
            $this->load->view('settings');
        }
        else
        {
            
            $oldPassword = $this->input->post('oldPassword');
            $newPassword = $this->input->post('newPassword');
            $this->vendorId = $this->session->userdata ( 'user_id' );
            //echo "<pre>";print_r($oldPassword);die;
           
           
            $resultPas = $this->user_model->matchOldPassword($this->vendorId, $oldPassword);

            // showing resultPas as empty 
            if(empty($resultPas))
            {
                $this->session->set_flashdata('nomatch', 'Your old password not correct');
                // redirect('loadChangePasswordSettings');
                redirect('Settings');
            }
            else //code is not entering in the else part 
            {
                
                $usersData = array('password'=>getHashedPassword($newPassword),);
                
                $result = $this->user_model->changePassword1($this->vendorId, $usersData);
                
                if($result > 0) { $this->session->set_flashdata('success', 'Password updation successful'); }
                else { $this->session->set_flashdata('error', 'Password updation failed'); }
                
                
                if($this->tank_auth->is_logged_in()){
                    // redirect('loadChangePass');
                    redirect('/auth/logout/');
                }else{
                    redirect('loadChangePasswordSettings');
                }

            }
        }

    }

    public function forgot_passwordd(){
        $this->load->view('forgot_password');
    }
    


	function index()
	{
		if (!$this->tank_auth->is_logged_in()) {
			redirect('/auth/login/');
			// redirect(base_url().'login','refresh');
		} else {
			$data['user_id']	= $this->tank_auth->get_user_id();
			$data['username']	= $this->tank_auth->get_username();
            $this->role = $this->session->userdata ( 'role' );
             
            $role = $this->role;
            // print_r($this->session->userdata('role'));die;
            // GETTING USER FIRST AND LAST NAME THROUGH TANK AUTH LIB USING USER ID 
            $user_data1 = $this->tank_auth->get_user_first_name($this->tank_auth->get_user_id());
            $user_data2 = $this->tank_auth->get_user_last_name($this->tank_auth->get_user_id());
            
            $user_role = $this->tank_auth->get_user_role($this->tank_auth->get_user_id());
            $data['user_role'] = $user_role;
            // echo "<pre>"; print_r($data);die;
            $this->vendorId = $this->session->userdata ( 'user_id' );
            // echo $this->tank_auth->get_username();
            $data['user_first_name'] = $user_data1;
            $data['user_last_name'] = $user_data2;

			$this->load->view('welcome', $data);
		}
       
	}

    public function editNames(){
        $this->load->model('user_model');
        $this->user_model->getUsers();

    }

    public function editSettings($id){
		$this->load->model("EmployeeModel");
		$data['employee'] = $this->EmployeeModel->editEmployee($id);
		$this->load->view("edit", $data);
	}


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */