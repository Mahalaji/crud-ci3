<?php

class profile extends CI_model{
    public function fetchdata($id){
     $this->db->where("id",$id);
  $query= $this->db->get("user_detail");
     return $query->row_array();
   
}
}

?>