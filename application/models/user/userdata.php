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
    
}
?>
