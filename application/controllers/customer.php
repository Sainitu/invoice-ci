<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Customer extends CI_Controller
{
    public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('customerModel');
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->library('tank_auth');
		if(!$this->tank_auth->is_logged_in()){
            redirect('/auth/logout/');
        }
	}

    public function index() {
        
		$this->load->model('customerModel');
		$data['employee'] = $this->customerModel->getCustomer();
		
		
		$data['username']	= $this->tank_auth->get_username();
            $user_data = $this->tank_auth->get_user_email($this->tank_auth->get_user_id());
            $user_data1 = $this->tank_auth->get_user_first_name($this->tank_auth->get_user_id());
            $user_data2 = $this->tank_auth->get_user_last_name($this->tank_auth->get_user_id());


            // Pass the email address to the settings view
            $data['user_first_name'] = $user_data1;
            $data['user_last_name'] = $user_data2;
            $data['user_email'] = $user_data;


        $this->load->view('customer', $data);  // Load the view for the Settings page
    }
	public function fetchDataFromDatabase(){
			$resultList = $this->customerModel->fetAllData('*','customers',array());
			// print_r($resultList);die;
			$result = array();
			$button = '';
			$i =1;
			foreach($resultList as $key => $value){

				$button = '<a class="btn btn-sm btn-info" onclick="editFun('.$value['id'].')"><i class="fa fa-pencil"></i></a> ';
				$button .= '<a class="btn btn-sm btn-danger" onclick="deleteFun('.$value['id'].')"><i class="fa fa-trash"></i></a>';
				$result['data'][] = array(
					$i++,
					$value['first_name'],
					$value['last_name'],
					$value['email'],
					$value['username'],
					$value['mobile'],
					$button
				);
			}
			echo json_encode($result);
	}
    public function getEditData(){
		$id = $this->input->post('id');
		$resultData = $this->customerModel->fetchSingleData('*','customers',array('id'=>$id));
		echo json_encode($resultData);
	}

    public function updateData(){
		$id = $this->input->post('id');
		$first_name = $this->input->post('first_name');
		$last_name = $this->input->post('last_name');
		$email = $this->input->post('email');
		$username = $this->input->post('username');
		$mobile = $this->input->post('mobile');
		$user_Login = $this->tank_auth->get_user_id();
		$data = array(
			'first_name' => $first_name,
			'last_name' => $last_name,
			'email' => $email,
			'username' => $username,
			'mobile' => $mobile,
			'updated_at' => date('Y-m-d H:i:s'),
			'updated_by' => $user_Login,
		);
		$update =$this->customerModel->updateData('customers',$data,array('id'=>$id));
		// print_r($update);die;
		if($update==true){
			echo 1;
		}else{
			echo 2;
		}
		// echo json_encode($update);
	}
	public function deleteSingleData(){
		$id = $this->input->post('id');
		$dataDelete = $this->customerModel->deleteData('customers',array('id'=>$id));
		if($dataDelete==true){
			echo 1;
		}else{
			echo 2;
		}
	}
	public function createData(){
		$this->form_validation->set_rules('username','User Name','required|trim');
		$this->form_validation->set_rules('email','Email address','required|trim');
		$this->form_validation->set_rules('first_name','First Name','required');
		$this->form_validation->set_rules('last_name','Last Name','required');
		$user_Login = $this->tank_auth->get_user_id();
		$this->form_validation->set_rules('mobile','Mobile Number','required|trim');
		if($this->form_validation->run()){

			$data = [
				'username' => $this->input->post('username'),
				'email' => $this->input->post('email'),
				'first_name' => $this->input->post('first_name'),
				'last_name' => $this->input->post('last_name'),
				'mobile' => $this->input->post('mobile'),
				'created_by' => $user_Login,
				'created_at' => date('Y-m-d H:i:s'),
				];


			
				$this->load->model("customerModel");
				$insert = $this->customerModel->insertEmployee($data);
				// echo json_encode($insert);
				echo json_encode(['status' => 'success']);
				

		}else{	
			$errors = validation_errors();
			echo json_encode(['status' => 'error', 'errors' => $errors]);		
			// print_r($errors);die;
			// $this->load->view('employee');
		}

	}
	
	

}