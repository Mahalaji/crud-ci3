<?php

class Login extends CI_model{
    public function fetchdata($email,$password){

        $this->db->where('email',$email);
        $this->db->where('password',$password);
        $query  = $this->db->get("user_detail");
        if ($query->num_rows() > 0) {
            return $query->row()->id;
        } else {
            return false;
        }
}
public function blog() {
    $this->db->where('recycle',1);
    return $this->db->count_all_results('blog'); 
}
public function news() {
    $this->db->where('recycle',1);
    return $this->db->count_all_results('news'); 
}
public function user() {
    return $this->db->count_all('user_detail'); 
}
public function username($id) {
    $this->db->where('id', $id);
    $query = $this->db->get('user_detail');
    
    if ($query->num_rows() > 0) {
        $result = $query->row();  
        return $result->name;      
    }
    return null; 
}

}

?>