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
}

?>