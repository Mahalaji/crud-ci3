<?php
class register extends CI_Model {
    public function getdata($data) {
       
        $data = array(
            'name' => $data['name'] ,
            'email' => $data['email'] ,
            
            'gender' => $data['gender'],
            'mobilenumber' => $data['mobilenumber'],
            'city' => $data['city'] ,
            'state' =>$data['state'] ,
            'pincode' => $data['pincode'] ,
            'country' => $data['country'] ,
            'address' => $data['address'] ,
            'password' => $data['password']
          

         );
         
         $this->db->insert('user_detail', $data);
        
    }
  
}
?>