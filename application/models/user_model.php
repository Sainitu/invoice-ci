<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model
{


    function matchOldPassword($userId, $oldPassword)
    {
        
        // echo "<pre>";print_r($oldPassword);die;
        $this->db->select('id, password');
        $this->db->where('id', $userId);        
        $this->db->where('banned', 0);
        $query = $this->db->get('users');
        
        $user = $query->result();
        // echo "<pre>";print_r($user);die;
        if(!empty($user)){
           // echo "<pre>";print_r("val");die;
            if(verifyHashedPassword($oldPassword, $user[0]->password)){
               
                return $user;
                
            } else {
                return array();
            }
        } else {
            echo "<pre>";print_r("pass");die;
            return array();
            // die('here');
        }
    }
    
    /**
     * This function is used to change users password
     * @param number $userId : This is user id
     * @param array $userInfo : This is user updation info
     */
    function changePassword($userId, $userInfo)
    {
        $this->db->where('id', $userId);
        $this->db->where('banned', 0);
        $this->db->update('users', $userInfo);
        
        return $this->db->affected_rows();
    }

    function changePassword1($userId, $userInfo){
        $this->db->where('id', $userId);
        $this->db->where('banned', 0);
        $this->db->update('users', $userInfo);
        
        return $this->db->affected_rows();
    }


    public function getUsers(){
        $query = $this->db->get("users");
        return $query ->result();
    }
    public function updateUser($id){
        $data = [
            'email' => $this->input->post('email'),
        ];
       
        $this->db->where('id', $id);
        return $this->db->update('users',$data);
    }
    public function updateUser1($id){
        $data = [
            'first_name' => $this->input->post('first_name'),
            'last_name' => $this->input->post('last_name')
        ];
       
        $this->db->where('id', $id);
        return $this->db->update('users',$data);
    }
    

    // In your user model (e.g., User_model.php)
    public function get_user_by_username($username) {
        // Replace this with your actual database query to retrieve user data based on the username
        
        $query = $this->db->get_where('users', array('username' => $username));
        return $query->row(); // Return the user data
    }





}