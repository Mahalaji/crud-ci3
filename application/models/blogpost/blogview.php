<?php
class Blogview extends CI_model{
    public function blogsite(){
        $this->db->where("recycle",1);
      $query=  $this->db->get("blog");
      return $query->result_array();
        
    }
}
?>