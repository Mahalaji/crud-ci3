<?php
class Blogview extends CI_model{
public function blogsite() {
  $this->db->where("recycle", 1); 
  $this->db->limit(3);  
  $query = $this->db->get("blog");
  $blogs = $query->result_array();

  foreach ($blogs as &$blog) {
      $blog['Description'] = $this->truncateDescription($blog['Description']);
      $blog['Title'] = $this->limitWords($blog['Title'], 4);
  }

  return $blogs;
}

private function truncateDescription($text, $wordLimit = 20) {
  $words = explode(' ', $text);
  if (count($words) > $wordLimit) {
      $text = implode(' ', array_slice($words, 0, $wordLimit)) . '...';
  }
  return $text;
}

public function newsview() {
  $this->db->where("recycle", 1);  
  $this->db->limit(3);  
  $query = $this->db->get("news");
  $news = $query->result_array();

  foreach ($news as &$item) {
    $item['Description'] = $this->limitWords2($item['Description'], 20); 

  }

  return $news;
}


private function limitWords2($text, $wordLimit = 20) {
  $words = explode(' ', $text); 
  if (count($words) > $wordLimit) {
      $text = implode(' ', array_slice($words, 0, $wordLimit)) . '...';
  }
  return $text;
}

  public function blogsshow(){
    $this->db->where("recycle", 1);
    $query = $this->db->get("blog");
    $blogs = $query->result_array();
    foreach ($blogs as &$blog) {
        $blog['Description'] = $this->limitWords($blog['Description'], 20);
        $blog['Title'] = $this->limitWords($blog['Title'], 4);
    }

    return $blogs;
}


private function limitWords($text, $wordLimit = 100) {
    $words = explode(' ', $text); 
    if (count($words) > $wordLimit) {
       
        $text = implode(' ', array_slice($words, 0, $wordLimit)) . '...';
    }
    return $text;
}


  public function newsshow() {
      $this->db->where("recycle", 1);
      $query = $this->db->get("news");
      
      $news = $query->result_array();
      
      foreach ($news as &$item) {
          $item['Description'] = $this->limitWords1($item['Description'], 20); 
      }
      
      return $news;
  }

  private function limitWords1($text, $wordLimit = 20) {
      $words = explode(' ', $text); 
      if (count($words) > $wordLimit) {
          $text = implode(' ', array_slice($words, 0, $wordLimit)) . '...';
      }
      return $text;
  }


    public function particularshow($row){
      $this->db->where('id',$row);
      $query=  $this->db->get("blog");
      return $query->row_array();
    }
    public function sideblog(){
      $this->db->where("recycle", 1);
      $query = $this->db->get("blog");
      return $query->result_array();
    }
    public function particularnews($news){
      
      $this->db->where('id',$news);
      $query=  $this->db->get("news");
      return $query->row_array();
    }
    public function sidenews(){
      $this->db->where("recycle", 1);
      $query = $this->db->get("news");
      return $query->result_array();
    }
}
?>