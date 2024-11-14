<?php
class Blogview extends CI_model{
    public function blogsite(){
        $this->db->where("recycle",1);
        $this->db->limit(3);
      $query=  $this->db->get("blog");
      return $query->result_array();
        
    }
    public function newsview(){
      $this->db->where("recycle",1);
      $this->db->limit(3);
    $query=  $this->db->get("news");
    return $query->result_array();
      
  }
  public function blogsshow(){
    $this->db->where("recycle",1);
  $query=  $this->db->get("blog");
  return $query->result_array();

  }
  public function newsshow(){
    $this->db->where("recycle",1);
    $query=  $this->db->get("news");
    return $query->result_array();
  
    }
}
?>