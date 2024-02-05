<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class InvoiceModel extends CI_Model
{
    public function select_data() {
        $this->db->where('status',1);
        $query = $this->db->get('products');
        if ($query->num_rows() > 0)
        {
            return $query->result();
        } else {
            return false;
        }

    }
    public function getIdFromEmail($email) {
        // Assuming you have a table named 'users' where the email and ID are stored
        $query = $this->db->select('id')->from('customers')->where('email', $email)->get();

        if ($query->num_rows() > 0) {
            $row = $query->row();
            return $row->id;
        } else {
            return false;
        }
    }
    public function getIdFromTotal($sub_total) {
        // Assuming you have a table named 'users' where the email and ID are stored
        $query1 = $this->db->select('invoice_id')->from('invoice')->where('sub_total', $sub_total)->get();

        if ($query1->num_rows() > 0) {
            $row1 = $query1->row();
            return $row1->invoice_id;
        } else {
            return false;
        }
    }

    public function saveIdIntoTable($id, $date,$sub_total,$service_tx ,$grand_total,$itemRates) {

        $itemRates = [];
        $itemQuantities = [];
        $product = [];
        foreach ($this->input->post('invoice_items') as $item) {
            $itemRates[] = $item['itemRate'];
            $itemQuantities[] = $item['itemQuantity'];
            $product[] = $item['itemName'];
        }

        $totalPrice = array_sum($itemRates);
        $totalQuant = array_sum($itemQuantities);
        //  print_r($product);die;
        
        // Assuming you have another table where you want to save the ID
        $data = array(
            'cid' => $id,
            'date' => $date,
            'sub_total' => $sub_total,
            'service_tax' => $service_tx,
            'grand_total' => $grand_total,
            'total_price' => $totalPrice,
            'total_item' => $totalQuant
            // Add other fields as needed
        );
        // print_r($data);die;

        // Assuming the table name is 'other_table'
        $this->db->insert('invoice', $data);
        $retriveID = $this->db->insert_id();

        
    $itemNames = $this->input->post('itemName');
    $itemRates = $this->input->post('itemRate');
    $itemQuantities = $this->input->post('itemQuantity');
    $itemID = $this->input->post('itemID');
    $amounts = $this->input->post('amount');
         // print_r($itemID);die;
        $item_data=array();
        foreach ($this->input->post('invoice_items') as $key => $value) {
            $item_data[$key]['invoice_id'] = $retriveID;
            $item_data[$key]['pid'] = $value['itemID'];
            $item_data[$key]['p_price'] = $value['itemRate'];
            $item_data[$key]['p_amount'] = $value['amount'];
            $item_data[$key]['p_quantity'] = $value['itemQuantity'];
            //$item_data[$key]['amount'] = $value['amount'];
        }
       // print_r($item_data[$key]['pid'] = $value['itemID']);die;
        if ($this->db->insert_batch('invoice_items', $item_data)) {
            return true;
        } else {
            return false;
        }
        
        
        //return $retriveID;

    }
    public function saveIntoTable($retriveID) {
        // Assuming you have another table where you want to save the ID
        $data = array(
            'invoice_id' => $retriveID,
            
            
            // Add other fields as needed
        );

        // Assuming the table name is 'other_table'
        $this->db->insert('invoice_items', $data);
    }
    public function insertData($data) {
        // Insert the data into the database
        $this->db->insert('invoice_items', $data);
    }

    
}