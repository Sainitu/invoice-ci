<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Dompdf\Dompdf;

class loadInvoice extends CI_Controller{

    public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('loadInvoiceModel');
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->library('tank_auth');
        $this->load->library('pdf');
        

	}

    public function index() {
        
		$this->load->model('loadInvoiceModel');
		$data['employee'] = $this->loadInvoiceModel->getCustomer();
		
		
		$data['username']	= $this->tank_auth->get_username();
            $user_data = $this->tank_auth->get_user_email($this->tank_auth->get_user_id());
            $user_data1 = $this->tank_auth->get_user_first_name($this->tank_auth->get_user_id());
            $user_data2 = $this->tank_auth->get_user_last_name($this->tank_auth->get_user_id());



            // Pass the email address to the settings view
            $data['user_first_name'] = $user_data1;
            $data['user_last_name'] = $user_data2;
            $data['user_email'] = $user_data;
    
           


        $this->load->view('invoice/index', $data); 
    }

            public function fetchDataFromDatabase(){
                $resultList = $this->loadInvoiceModel->fetAllData('*','invoice',array());
                
                $result = array();
                $button = '';
                $i =1;
                foreach($resultList as $key => $value){
                    $button = '<a class="btn btn-sm btn-primary" onclick="downloadFun('.$value['invoice_id'].')"><i class="fa fa-download"></i></a> ';
                    $button .= '<a class="btn btn-sm btn-info" onclick="viewFun('.$value['invoice_id'].')"><i class="fa fa-search"></i></a> ';
                    $button .= '<a class="btn btn-sm btn-danger" onclick="deleteFun('.$value['invoice_id'].')"><i class="fa fa-trash"></i></a>';
                    $result['data'][] = array(
                        $i++,
                        $value['invoice_id'],
                        $value['cid'],
                        $value['total_item'],
                        $value['total_price'],
                        $value['date'],
                        $value['grand_total'],
                        $button
                    );
                }
                
                echo json_encode($result);
        }
        public function getEditData($source='view'){
            $id = $this->input->post('invoice_id');
            $resultData = $this->loadInvoiceModel->fetchSingleData('*','invoice',array('invoice_id'=>$id));
            $cid = $resultData['cid']; //  the column name is 'cid' of customer id then take its details through this 
            $customerData = $this->loadInvoiceModel->fetchSingleData('*','customers',array('id'=>$cid));
            $takeData = $this->loadInvoiceModel->fetAllData('*','invoice_items',array('invoice_id'=>$id));
            $pamounts = array_column($takeData, 'p_amount');// Extracting all the p_amount values
            $pprices = array_column($takeData, 'p_price');// Extracting all the p_price values 
            $pquantity = array_column($takeData, 'p_quantity');// Extracting all the p_quantity values
            $pids = array_column($takeData, 'pid'); // Extracting all the pid values from $takeData
         
            
           
            // Fetching pname from products table based on pid values BELOW
                $productsData = array();
                foreach ($pids as $pid) {
                    $product = $this->loadInvoiceModel->fetAllData('pname', 'products', array('id' => $pid));
                    if ($product) {
                        $productsData[] = $product[0]['pname'];
                    }
                }
             //   echo "<pre>"; print_r($productsData);die; // Now $productsData contains the pname values corresponding to the pid values from the invoice_items table
           //  $allVal1 = array_map(function($pamounts,$pprices){ return $pamounts.','.$pprices; },$pamounts,$pprices);
           //  $allVal2 = array_map(function($pquantity,$productsData){ return $pquantity.','.$productsData; },$pquantity,$productsData);
              
            // $customerData = $this->loadInvoiceModel->fetchSingleData('*','customers',array('id'=>$cid));
            $resultData = array_merge($resultData, $customerData);
            $mergedData = array();
            for ($i = 0; $i < count($pamounts); $i++) {
                $mergedData[] = array(
                    'p_amount' => $pamounts[$i],
                    'p_price' => $pprices[$i],
                    'p_quantity' => $pquantity[$i],
                    'pname' => $productsData[$i]
                );
            }
          // echo "<pre>"; print_r($mergedData);die; 
            $data = array(
                'resultData' => $resultData,
                'mergedData' => $mergedData
                
            );
            if ($source == 'pdf') {
                   return $data;
            }
        
            echo json_encode($data);
        }

        public function deleteSingleData(){
            $id = $this->input->post('invoice_id');

            $this->loadInvoiceModel->deleteData('invoice_items',array('invoice_id'=>$id));
            $dataDelete = $this->loadInvoiceModel->deleteData('invoice',array('invoice_id'=>$id));
          //  echo "<pre>"; print_r($dataDelete);die;
            if($dataDelete==true){
                echo 1;
            }else{
                echo 2;
            }
        }
        
        public function PDF(){
                //$id = $this->input->post('invoice_id');
              
                $data = $this->getEditData('pdf');
             
                // load your view page
                $html = $this->load->view("print",$data,TRUE);
                // get output of function return the pdf content as string
                // $html = $this->output->get_output();
                 // load your library
                $this->load->library("pdf");             
                // load all html and css contents in view
                $this->dompdf->loadHtml($html);  
                print_r($html);die;
                // adding image in it 
                $this->dompdf->set_option('isRemoteEnabled', true);
                // set pdf paper size and orientation
                $this->dompdf->setPaper("A4", "potrait");
                // its convert all html & css elements to pdf
                $this->dompdf->render();
                ob_end_clean();
                //stream() used to output generated in broswer and its automatically download the pdf
                
                $output = $this->dompdf->output();
                $pdf = '../inv_'.$data['resultData']['invoice_id'].'.pdf';
                file_put_contents($pdf, $output);
 // Send the path to the saved PDF file as the response
 echo json_encode(array('pdfPath' => base_url().$pdf));
//  $this->dompdf->stream("print.pdf", array("Attachment"=>0)); 
        }


        // public function generate_pdf() {
        //     $this->load->library('pdf');
        
        //     $html = $this->load->view('mypdf', [], true);
        //     $filename = 'invoice.pdf';
        
        //     $this->pdf->generate($html, $filename);
        // }
        
        

}