<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class EmployeeController extends CI_Controller
{
    public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('EmployeeModel');
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->library('tank_auth');
		if(!$this->tank_auth->is_logged_in()){
            redirect('/auth/logout/');
        }
	}

    public function index() {
        
		$this->load->model('EmployeeModel');
		$data['employee'] = $this->EmployeeModel->getEmployee();
		
		
		$data['username']	= $this->tank_auth->get_username();
            
            $user_data1 = $this->tank_auth->get_user_first_name($this->tank_auth->get_user_id());
            $user_data2 = $this->tank_auth->get_user_last_name($this->tank_auth->get_user_id());


            // Pass the email address to the settings view
            $data['user_first_name'] = $user_data1;
            $data['user_last_name'] = $user_data2;


        $this->load->view('employee', $data);  // Load the view for the Settings page
    }
	public function fetchDataFromDatabase(){
			$resultList = $this->EmployeeModel->fetAllData('*','users',array());
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
					$value['role'],
					$button
				);
			}
			echo json_encode($result);
	}

	public function getEditData(){
		$id = $this->input->post('id');
		$resultData = $this->EmployeeModel->fetchSingleData('*','users',array('id'=>$id));
		echo json_encode($resultData);
	}

	public function updateData(){
		$id = $this->input->post('id');
		$first_name = $this->input->post('first_name');
		$last_name = $this->input->post('last_name');
		$email = $this->input->post('email');
		$username = $this->input->post('username');
		$mobile = $this->input->post('mobile');
		$role = $this->input->post('role');

		$data = array(
			'first_name' => $first_name,
			'last_name' => $last_name,
			'email' => $email,
			'username' => $username,
			'mobile' => $mobile,
			'role' => $role,
		);
		$update =$this->EmployeeModel->updateData('users',$data,array('id'=>$id));
		print_r($update);die;
		if($update==true){
			echo 1;
		}else{
			echo 2;
		}
		// echo json_encode($update);
	}
	public function deleteSingleData(){
		$id = $this->input->post('id');
		$dataDelete = $this->EmployeeModel->deleteData('users',array('id'=>$id));
		if($dataDelete==true){
			echo 1;
		}else{
			echo 2;
		}
	}


	function getLists(){
        $data = array();
		// echo print_r($this->EmployeeModel->getRows());die;
        
        // Fetch member's records
        $memDataProp = $this->EmployeeModel->getRows($_POST);
        // echo print_r($memData);die;
        $i = $_POST['start'];
        foreach($memDataProp as $users){
			
            $i++;
            $data[] = array($i, $users->first_name, $users->last_name, $users->email, $users->username, $users->mobile, $users->role);
        }
		// print_r($data);die;
		$output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->EmployeeModel->countAll(),
            "recordsFiltered" => $this->EmployeeModel->countFiltered($_POST),
            "data" => $data,
        );
		// print_r($output);die;
		echo json_encode($output);

	}

	public function edit($id){
		$this->load->model("EmployeeModel");
		$data['employee'] = $this->EmployeeModel->editEmployee($id);
		
		$data['user_first_name'] = $user_data1 = $this->tank_auth->get_user_first_name($this->tank_auth->get_user_id());	
		$data['user_last_name'] = $this->tank_auth->get_user_last_name($this->tank_auth->get_user_id());
		$data['username']	= $this->tank_auth->get_username();
		$this->load->view("edit", $data);
	}

	public function update($id){
		$this->form_validation->set_rules('username','User Name','required');
		$this->form_validation->set_rules('email','Email address','required');
		$this->form_validation->set_rules('mobile','Mobile Number','required');
		if($this->form_validation->run()){

			$data = [
				'username' => $this->input->post('username'),
				'email' => $this->input->post('email'),
				'mobile' => $this->input->post('mobile'),
				'role' => $this->input->post('role')
			];
			$this->load->model("EmployeeModel");
			$this->EmployeeModel->updateEmployee($data, $id);
			redirect(base_url('employee'));
		}else{
			$this->edit($id);
			
		}
		
	}

	public function delete($id){
		$this->load->model("EmployeeModel");
		$this->EmployeeModel->deleteEmployee($id);
		redirect(base_url('employee'));
	}


	public function addNew()
    {	
		$data['user_first_name'] = $user_data1 = $this->tank_auth->get_user_first_name($this->tank_auth->get_user_id());	
		$data['user_last_name'] = $this->tank_auth->get_user_last_name($this->tank_auth->get_user_id());
		$data['username']	= $this->tank_auth->get_username();
			$this->load->view('addNew', $data);

    }
	public function createData(){
		$this->form_validation->set_rules('username','User Name','required|trim');
		$this->form_validation->set_rules('email','Email address','required|trim');
		$this->form_validation->set_rules('first_name','First Name','required');
		$this->form_validation->set_rules('last_name','Last Name','required');
		$this->form_validation->set_rules('password','Password','required|trim');
		$this->form_validation->set_rules('cpassword','Confirm Password','required|trim|matches[password]');
		$this->form_validation->set_rules('mobile','Mobile Number','required|trim');
		if($this->form_validation->run()){

			$data = [
				'username' => $this->input->post('username'),
				'email' => $this->input->post('email'),
				'first_name' => $this->input->post('first_name'),
				'last_name' => $this->input->post('last_name'),
				'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
				// 'cpassword' => password_hash($this->input->post('cpassword'), PASSWORD_DEFAULT),
				'mobile' => $this->input->post('mobile'),
				];


			
				$this->load->model("EmployeeModel");
				$insert = $this->EmployeeModel->insertEmployee($data);
				echo json_encode($insert);
				// print_r($insert);die;

		}else{			
			$this->load->view('employee');
		}

	}

	public function store(){
		$this->form_validation->set_rules('username','User Name','required|trim');
		$this->form_validation->set_rules('email','Email address','required|trim');
		$this->form_validation->set_rules('password','Password','required|trim');
		$this->form_validation->set_rules('cpassword','Confirm Password','required|trim|matches[password]');
		$this->form_validation->set_rules('mobile','Mobile Number','required|trim');
		$this->form_validation->set_rules('role','Role','trim|required|numeric');
		if($this->form_validation->run()){
			die("in form validation");

		$data = [
			'username' => $this->input->post('username'),
			'email' => $this->input->post('email'),
			'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
			// 'cpassword' => password_hash($this->input->post('cpassword'), PASSWORD_DEFAULT),
			'mobile' => $this->input->post('mobile'),
			'role' => $this->input->post('role'),
			];

			$this->load->model("EmployeeModel");
			$this->EmployeeModel->insertEmployee($data);
			redirect(base_url('employee'));
		} else{
			// redirect(base_url('addNew'));
			$this->addNew();
		}

			
	}

}