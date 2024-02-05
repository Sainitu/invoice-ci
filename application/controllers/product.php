<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Product extends CI_Controller
{
    public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('productModel');
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->library('tank_auth');
		if(!$this->tank_auth->is_logged_in()){
            redirect('/auth/logout/');
        }
	}

    public function index() {
        
		$this->load->model('productModel');
		$data['employee'] = $this->productModel->getCustomer();
		
		
		$data['username']	= $this->tank_auth->get_username();
            $user_data = $this->tank_auth->get_user_email($this->tank_auth->get_user_id());
            $user_data1 = $this->tank_auth->get_user_first_name($this->tank_auth->get_user_id());
            $user_data2 = $this->tank_auth->get_user_last_name($this->tank_auth->get_user_id());


            // Pass the email address to the settings view
            $data['user_first_name'] = $user_data1;
            $data['user_last_name'] = $user_data2;
            $data['user_email'] = $user_data;


        $this->load->view('product', $data);  // Load the view for the Settings page
    }
	public function fetchDataFromDatabase(){
			$resultList = $this->productModel->fetAllData('*','products',array());
			// print_r($resultList);die;
			$result = array();
			$button = '';
			$i =1;
			foreach($resultList as $key => $value){

				$button = '<a class="btn btn-sm btn-info" onclick="editFun('.$value['id'].')"><i class="fa fa-pencil"></i></a> ';
				$button .= '<a class="btn btn-sm btn-danger" onclick="deleteFun('.$value['id'].')"><i class="fa fa-trash"></i></a>';
				$result['data'][] = array(
					$i++,
					$value['PName'],
					$value['Price'],
					$value['Category'],
					$value['Quantity'],
					$value['description'],
					$button
				);
			}
			echo json_encode($result);
	}
    public function getEditData(){
		$id = $this->input->post('id');
		$resultData = $this->productModel->fetchSingleData('*','products',array('id'=>$id));
		echo json_encode($resultData);
	}

    public function updateData(){
		$id = $this->input->post('id');
		$PName = $this->input->post('PName');
		$Price = $this->input->post('Price');
		$Category = $this->input->post('Category');
		$Quantity = $this->input->post('Quantity');
		$description = $this->input->post('description');
		

		$data = array(
			'PName' => $PName,
			'Price' => $Price,
			'Category' => $Category,
			'Quantity' => $Quantity,
			'description' => $description,
			'updated_at' => date('Y-m-d H:i:s'),
		);
		$update =$this->productModel->updateData('products',$data,array('id'=>$id));
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
		$dataDelete = $this->productModel->deleteData('products',array('id'=>$id));
		if($dataDelete==true){
			echo 1;
		}else{
			echo 2;
		}
	}
	public function createData(){
		$this->form_validation->set_rules('PName','Product Name','required');
		$this->form_validation->set_rules('Price','Price','required|trim');
		$this->form_validation->set_rules('Category','Category','required');
		$this->form_validation->set_rules('Quantity','Quantity','required');
		$this->form_validation->set_rules('description','description','required');
		$this->form_validation->set_rules('tax','tax','required');
		$user_Login = $this->tank_auth->get_user_id();
		
		if($this->form_validation->run()){

			$data = [
				'PName' => $this->input->post('PName'),
				'Price' => $this->input->post('Price'),
				'Category' => $this->input->post('Category'),
				'Quantity' => $this->input->post('Quantity'),
				'description' => $this->input->post('description'),
				'tax' => $this->input->post('tax'),
				'created_by' => $user_Login,
				'created_at' => date('Y-m-d H:i:s'),
				];

				//$this->productModel->insertProduct($user_Login);

				$this->load->model("productModel");
				$insert = $this->productModel->insertEmployee($data);
				echo json_encode($insert);
				// print_r($user_Login);die;

		}else{			
			$errors = validation_errors();
			//print_r($errors);die;
			echo json_encode(array('error' => $errors));
		}

	}
	
	

}