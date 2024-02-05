<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Invoice extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('invoiceModel');
        $this->load->library('tank_auth');
        $this->load->helper('form');
        if(!$this->tank_auth->is_logged_in()){
            redirect('/auth/logout/');
        }
    }

    public function index() {
        $data['tabel'] = $this->invoiceModel->select_data();
        $data['username']	= $this->tank_auth->get_username();
        $user_data1 = $this->tank_auth->get_user_first_name($this->tank_auth->get_user_id());
        $user_data2 = $this->tank_auth->get_user_last_name($this->tank_auth->get_user_id());
        $data['user_first_name'] = $user_data1;
        $data['user_last_name'] = $user_data2;
        
        $this->load->view('invoice/index', $data);
 
    }
    public function createInvoive()
    {	
		$data['user_first_name'] = $user_data1 = $this->tank_auth->get_user_first_name($this->tank_auth->get_user_id());	
		$data['user_last_name'] = $this->tank_auth->get_user_last_name($this->tank_auth->get_user_id());
		$data['username']	= $this->tank_auth->get_username();
			$this->load->view('createInvoice', $data);

    }
    public function autocomplete()
    {
        $item_name=$this->input->post('name');
        
        $this->db->select('*');
        $this->db->from('products');
        $this->db->like('PName',$item_name);
        $this->db->where('status',1);
        $query = $this->db->get();
        $result = $query->result();

        $name       =  array();
        foreach ($result as $d) {
        $json_array             = array();
        $json_array['value']    = $d->PName;
        $json_array['label']    = $d->PName;
        $name[]             = $json_array;
        }
        echo json_encode($name);
    }
    public function autocomplete1()
    {
        $item_name=$this->input->post('name');
        
        $this->db->select('*');
        $this->db->from('customers');
        $this->db->like('first_name',$item_name);
        $this->db->where('status',1);
        $query = $this->db->get();
        $result = $query->result();

        $name       =  array();
        foreach ($result as $d) {
        $json_array             = array();
        $json_array['value']    = $d->first_name;
        $json_array['label']    = $d->first_name;
        $name[]             = $json_array;
        }
        // print_r($name);die;
        echo json_encode($name);
    }

    public function get_contents()
    {
        
        $item_name=$this->input->post('name');
        
        $this->db->select('*');
        $this->db->from('products');
        $this->db->where('PName',$item_name);
        $this->db->where('status',1);
        $query = $this->db->get();
        $result = $query->result();

        foreach ($result as $d) {
    
        $data['Price']   = $d->Price;
        $data['tax']    = $d->tax;      
        $data['id']    = $d->id;      
        }
        // print_r($data);die;
        echo json_encode($data);
    }
    public function get_contents1()
    {
        
        $item_name=$this->input->post('name');
        
        $this->db->select('*');
        $this->db->from('customers');
        $this->db->where('first_name',$item_name);
        $this->db->where('status',1);
        $query = $this->db->get();
        $result = $query->result();

        foreach ($result as $d) {
    
        $data['email']   = $d->email;
        $data['username']    = $d->username;      
        $data['mobile']    = $d->mobile;      
        }
        // print_r($data);die;
        echo json_encode($data);
    }

    public function insert_invoice(){     
       
        
    $itemRates = $this->input->post('itemRate');
    $itemQuantities = $this->input->post('itemQuantity');
    $amounts = $this->input->post('amount');
    $itemID = $this->input->post('itemID');
            // print_r($this->input->post());die;
        $email = $this->input->post('email');
        $var = $this->input->post('date');
        $date = date("Y-m-d", strtotime($var) );
        $sub_total = $this->input->post('sub_total');
        $service_tx = $this->input->post('o_tax');
        $grand_total = $this->input->post('grand_total');

    if (!empty($email)) {
        // Assuming you have a method in your model to retrieve the ID based on the email
        $id = $this->invoiceModel->getIdFromEmail($email);
        // print_r($id1);die;
        
        if ($id) {
            // Assuming you have a method in your model to save the ID into the second table
            $retriveID = $this->invoiceModel->saveIdIntoTable($id, $date, $sub_total, $service_tx, $grand_total,$itemRates);
          //  echo "ID saved successfully!";
        } else {
          //  echo "Email not found or ID not available!";
        } 
        } else {
        //   echo "Email address is empty!";
        }
        if($retriveID){
            $this->invoiceModel->saveIntoTable($retriveID);
            //echo "INVOICE ID saved successfully!";
            $this->session->set_flashdata('success_message', 'Invoice Successfully Created');
            redirect('invoice/createInvoive');
          //  return view('insert_invoice/createInvoice');
        }else{
           // echo "INVOICE ID not available!";
    
        }


    // Get the posted data from the form
    $itemNames = $this->input->post('itemName');
    $itemRates = $this->input->post('itemRate');
    $itemQuantities = $this->input->post('itemQuantity');
    $amounts = $this->input->post('amount');

   


    }

    public function getProductID() {
        // $productName = $this->input->post('itemName');
        
        // Fetch the product ID based on the productName from the database
        $productID = $this->db->select('id')->from('products')->where('PName', $productName)->get()->row('id');
        // Return the product ID
        echo json_encode(['productID' => $productID]);
        // return $productID;
        // print_r(productID);die;
      }
     

}