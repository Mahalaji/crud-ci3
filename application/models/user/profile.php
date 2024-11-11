<?php

class profile extends CI_model{
    public function fetchdata($id){
     $this->db->where("id",$id);
  $query= $this->db->get("user_detail");
     return $query->row_array();
   
}
public function adminpass($id,$oldpassword,$data){
   $this->db->where('id', $id);
   $this->db->where('password',$oldpassword);
   $query = $this->db->get('user_detail'); 
   if ($query->num_rows() > 0) {
      $update=[
         'password'=>$data['newpassword']
      ];
      $this->db->where('id', $id);
      return $this->db->update('user_detail', $update);
   } else {
       return false;
   }
}
public function updateprofile($id){
$this->db->where('id', $id);
$query= $this->db->get('user_detail');
return $query->row_array();
}
public function updateadminprofile($id,$data){
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
  $this->db->where('id', $id);
  $this->db->update('user_detail', $updatedata);
}
}

?>