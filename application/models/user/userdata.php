<?php
class Userdata extends CI_Model {

    public function num_rows()
    {
        return $this->db->count_all('user_detail'); 
    }

    public function getuserdata($limit, $offset)
    {
        $query = $this->db->get('user_detail', $limit, $offset); 
        return $query->result_array();
    }

    public function usereditdata($u) {
    
        $this->db->where('id', $u);
        $query = $this->db->get('user_detail'); 
        return $query->row_array(); 
    }
    
    public function update_userdata($u, $data) {

        $updatedata=[
            'name' => $data['name'],    
            'email'=> $data['email'],  
            'gender'=> $data['gender'],       
            'mobilenumber'=> $data['mobilenumber'],       
            'city'=> $data['city'],       
            'state'=> $data['state'],       
            'country'=> $data['country'],       
            'pincode'=> $data['pincode'],       
            'address'=> $data['address'],       
            'password'=> $data['password'],       

        ];
        $this->db->where('id', $u);
        return $this->db->update('user_detail', $updatedata); 
    }
    
    public function userdeletedata($u){
        $this->db->where('id', $u);
        return $this->db->delete('user_detail');
    }
    public function userpass($u,$oldpassword,$data) {
    //   echo "$u\n" ; echo $oldpassword; die;
        $this->db->where('id', $u);
        $this->db->where('password',$oldpassword);
        $query = $this->db->get('user_detail'); 
        if ($query->num_rows() > 0) {
           $update=[
              'password'=>$data['newpassword']
           ];
           $this->db->where('id', $u);
           return $this->db->update('user_detail', $update);
        } else {
            return false;
        }
    }
    public function getFilteredUser($start, $length, $search, $order_by, $order_dir,$start_date,$end_date) {
        
        if (!empty($search)) {
            $this->db->group_start(); 
            $this->db->like('name', $search);
            $this->db->or_like('email', $search);
            $this->db->or_like('gender', $search);
            $this->db->group_end(); 
        }
        if (!empty($start_date) && !empty($end_date)) {
            $this->db->where('Date >=', $start_date);
            $this->db->where('Date <=', $end_date);
        }
     
        if (!empty($order_by) && !empty($order_dir)) {
            $this->db->order_by($order_by, $order_dir); 
        } else {
            $this->db->order_by('id', 'asc'); 
        }
        $this->db->limit($length, $start);
        $query = $this->db->get('user_detail');

        return $query->result();
    }
    public function countAllUser() {
        return $this->db->count_all_results('user_detail');
    }
    public function countFilteredUser($search, $start_date = null, $end_date = null) {
        if (!empty($search)) {
            $this->db->like('name', $search);
            $this->db->or_like('email', $search);
            $this->db->or_like('gender', $search);
        }
        if (!empty($start_date) && !empty($end_date)) {
            $this->db->where('Date >=', $start_date);
            $this->db->where('Date <=', $end_date);
        }
    
        return $this->db->count_all_results('user_detail'); 
    }
}
?>
