<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class EmployeeModel extends CI_Model
{

    function __construct() {
        // Set table name
        $this->table = 'users';
        // Set orderable column fields
        $this->column_order = array(null, 'username', 'email', 'mobile','role','first_name','last_name');
        // Set searchable column fields
        $this->column_search = array('username', 'email', 'mobile', 'role', 'first_name','last_name');
        // Set default order
        $this->order = array('first_name' => 'asc');
    }
    public function fetAllData($data,$tablename,$where){
        $query = $this->db->select($data)
                          ->from($tablename)
                          ->where($where)
                          ->get();
        return $query->result_array();
    }
    public function fetchSingleData($data,$tablename,$where){
        $query = $this->db->select($data)
                          ->from($tablename)
                          ->where($where)
                          ->get();
        return $query->row_array();
    }
    public function updateData($tablename,$data,$where){
        $query = $this->db->update($tablename,$data,$where);
        return  $query;
    }
    public function deleteData($tablename,$where){
        $query = $this->db->delete($tablename,$where);
        return $query;
    }

    public function getRows($postData){
        $this->_get_datatables_query($postData);
        if($postData['length'] != -1){
            $this->db->limit($postData['length'], $postData['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }

    
    public function countAll(){
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }
    /*
     * Count records based on the filter params
     * @param $_POST filter data based on the posted parameters
     */
    public function countFiltered($postData){
        $this->_get_datatables_query($postData);
        $query = $this->db->get();
        return $query->num_rows();
    }
    
    /*
     * Perform the SQL queries needed for an server-side processing requested
     * @param $_POST filter data based on the posted parameters
     */
    private function _get_datatables_query($postData){
         
        $this->db->from($this->table);
 
        $i = 0;
        // loop searchable columns 
        foreach($this->column_search as $item){
            // if datatable send POST for search
            if($postData['search']['value']){
                // first loop
                if($i===0){
                    // open bracket
                    $this->db->group_start();
                    $this->db->like($item, $postData['search']['value']);
                }else{
                    $this->db->or_like($item, $postData['search']['value']);
                }
                
                // last loop
                if(count($this->column_search) - 1 == $i){
                    // close bracket
                    $this->db->group_end();
                }
            }
            $i++;
        }
         
        if(isset($postData['order'])){
            $this->db->order_by($this->column_order[$postData['order']['0']['column']], $postData['order']['0']['dir']);
        }else if(isset($this->order)){
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }



    public function getEmployee(){
        $query = $this->db->get("users");
        return $query ->result();
    }

    public function editEmployee($id){
       $query = $this->db->get_where('users', ['id' => $id]);
       return $query->row();
    }

    public function updateEmployee($data, $id){
        return $this->db->update('users', $data, ['id' => $id]);
    }

    public function deleteEmployee($id){
        return $this->db->delete('users', ['id' => $id]);
    }

    public function insertEmployee($data){
        
        return $this->db->insert('users',$data);
    }
}