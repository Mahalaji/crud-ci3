<?php
class Blogdata extends CI_Model
{
    public function numrows() {
    $this->db->where('recycle',1);
        return $this->db->count_all_results('blog');
    }
    
public function getblogdata($limit, $start) {
    $this->db->limit($limit, $start);
    $this->db->where('recycle',1);
    $query = $this->db->get('blog'); // Assuming 'blogs' is the table name
    return $query->result_array();
}

    public function getdata($data)
    {


        $data = array(
            'Name' => $data['Name'],
            'Title' => $data['Title'],

            'Description' => $data['Description'],
            'Create_Date' => $data['Create_Date'],
            'post_Date' => $data['post_Date'],
            'image'=> $data['image'],
            'seo_robat' => $data['seo_robat'],
            'meta_keyword' => $data['meta_keyword'],
            'meta_description' => $data['meta_description'],
            'seo_title' => $data['seo_title'],
            'blog_title_category' => $data['blog_title_category'],
            'slug' => $data['slug'],



        );
       
        $this->db->insert('blog', $data);


    }
    public function title_exists($Title) { 
        $this->db->where('Title', $Title);
        $query = $this->db->get('blog');
        if ($query->num_rows() > 0) {
            return TRUE; 
        }
        return FALSE; 
    }
    public function countrows()
    {
        $this->db->where('recycle', 0);
        return $this->db->count_all_results('blog');
    }
    public function getblogrecycledata($limit, $start) {
        $this->db->limit($limit, $start);
        $this->db->where('recycle',0);
        $query = $this->db->get('blog'); // Assuming 'blogs' is the table name
        return $query->result_array();
    }
    public function blogrecycledata($u)
    {
        $this->db->where('id', $u);

        $this->db->update('blog', ['recycle' => 0]);


        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
    public function blogdelete($u)
    {
        $this->db->where('id', $u);
        return $this->db->delete('blog');
    }
    public function blogeditdata($u)
    {
        $this->db->where('id', $u);
        $query = $this->db->get('blog');
        return $query->row_array();
    }
    public function edit($u, $data)
    {
        $data = array(
            'Name' => $data['Name'],
            'Title' => $data['Title'],

            'Description' => $data['Description'],
            'Create_Date' => $data['Create_Date'],
            'Update_Date'=> $data['Update_Date'],
            'post_Date' => $data['post_Date'],
            'image'=> $data['image'],
            'seo_robat' => $data['seo_robat'],
            'meta_keyword' => $data['meta_keyword'],
            'meta_description' => $data['meta_description'],
            'seo_title' => $data['seo_title'],
            'blog_title_category' => $data['blog_title_category'],
            'slug' => $data['slug'],


        );
        $this->db->where('id', $u);
        $this->db->update('blog', $data);

    }
    public function blogrestore($u)
    {    
        $this->db->where('id', $u);
        $this->db->update('blog', ['recycle' => 1]);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
    public function num_rows() {
            return $this->db->count_all_results('blogcategory');
        }
        
    public function getblogcategorydata($limit, $start) {
        $this->db->limit($limit, $start);
        $query = $this->db->get('blogcategory'); // Assuming 'blogs' is the table name
        $check= $query->result_array();
    return $check;
    }
   public function blogcategoryeditdata($u) {
    $this->db->where('id', $u);
        $query = $this->db->get('blogcategory');
        return $query->row_array();
    }
    public function blogcategoryedit($u,$data) {
        $data = array(
           
            'seo_robat' => $data['seo_robat'],
            'meta_keyword' => $data['meta_keyword'],
            'meta_description' => $data['meta_description'],
            'seo_title' => $data['seo_title'],


        );
        // echo $u; die;
        // print_r($data); die();
        $this->db->where('id', $u);
        $this->db->update('blogcategory', $data);

    }
    public function blogcategorydelete($u) {
        $this->db->where('id', $u);
        return $this->db->delete('blogcategory');
    }
    public function insertdata($data) {
        
        $data = array(
            
            'seo_robat' => $data['seo_robat'],
            'meta_keyword' => $data['meta_keyword'],
            'meta_description' => $data['meta_description'],
            'seo_title' => $data['seo_title'],

        );
       
        $this->db->insert('blogcategory', $data);


    }
    public function category() {
        $query = $this->db->get('blogcategory');  // Perform the query
        return $query->result_array();  // Return the result as an array
    }
    public function getFilteredBlogs($start, $length, $search, $order_by, $order_dir,$start_date,$end_date) {
        
        if (!empty($search)) {
            $this->db->group_start(); 
            $this->db->like('Name', $search);
            $this->db->or_like('Title', $search);
            $this->db->or_like('blog_title_category', $search);
            $this->db->group_end(); 
        }
        if (!empty($start_date) && !empty($end_date)) {
            $this->db->where('Create_Date >=', $start_date);
            $this->db->where('Create_Date <=', $end_date);
        }
     
        if (!empty($order_by) && !empty($order_dir)) {
            $this->db->order_by($order_by, $order_dir); 
        } else {
            $this->db->order_by('id', 'asc'); 
        }
        $this->db->where('recycle',1);
        $this->db->limit($length, $start);
        
        $query = $this->db->get('blog');

        return $query->result();
    }
    public function countAllBlogs() {
        $this->db->where('recycle',1);
        return $this->db->count_all_results('blog');
    }
    public function countFilteredBlogs($search, $start_date = null, $end_date = null) {
        if (!empty($search)) {
            $this->db->like('Name', $search);
            $this->db->or_like('Title', $search);
            $this->db->or_like('blog_title_category', $search);
        }
        if (!empty($start_date) && !empty($end_date)) {
            $this->db->where('Create_Date >=', $start_date);
            $this->db->where('Create_Date <=', $end_date);
        }
        $this->db->where('recycle',1);
        return $this->db->count_all_results('blog'); 
    }
       public function getFilteredRecycleBlogs($start, $length, $search, $order_by, $order_dir,$start_date,$end_date) {
        
        if (!empty($search)) {
            $this->db->group_start(); 
            $this->db->like('Name', $search);
            $this->db->or_like('Title', $search);
            $this->db->or_like('blog_title_category', $search);
            $this->db->group_end(); 
        }
        if (!empty($start_date) && !empty($end_date)) {
            $this->db->where('Create_Date >=', $start_date);
            $this->db->where('Create_Date <=', $end_date);
        }
     
        if (!empty($order_by) && !empty($order_dir)) {
            $this->db->order_by($order_by, $order_dir); 
        } else {
            $this->db->order_by('id', 'asc'); 
        }
        $this->db->limit($length, $start);
        $this->db->where('recycle',0);
        $query = $this->db->get('blog');

        return $query->result();
    }
    
    
    public function countAllRecycleBlogs() {
        $this->db->where('recycle',0);
        return $this->db->count_all_results('blog');
    }
    
    public function countFilteredRecycleBlogs($search, $start_date = null, $end_date = null) {
        if (!empty($search)) {
            $this->db->like('Name', $search);
            $this->db->or_like('Title', $search);
            $this->db->or_like('blog_title_category', $search);
        }
        if (!empty($start_date) && !empty($end_date)) {
            $this->db->where('Create_Date >=', $start_date);
            $this->db->where('Create_Date <=', $end_date);
        }
        $this->db->where('recycle',0);
        return $this->db->count_all_results('blog'); 
    }
    public function getFilteredBlogCategory($start, $length, $search, $order_by, $order_dir,$start_date,$end_date) {
        
        if (!empty($search)) {
            $this->db->group_start(); 
            $this->db->like('seo_title', $search);
            $this->db->or_like('meta_keyword', $search);
            $this->db->or_like('seo_robat', $search);
            $this->db->or_like('meta_description', $search);
            $this->db->group_end(); 
        }
        if (!empty($start_date) && !empty($end_date)) {
            $this->db->where('Create_Date >=', $start_date);
            $this->db->where('Create_Date <=', $end_date);
        }
     
        if (!empty($order_by) && !empty($order_dir)) {
            $this->db->order_by($order_by, $order_dir); 
        } else {
            $this->db->order_by('id', 'asc'); 
        }
        $this->db->limit($length, $start);
        $query = $this->db->get('blogcategory');

        return $query->result();
    }
    public function countAllBlogCategory() {
        return $this->db->count_all_results('blogcategory');
    }
    public function countFilteredBlogCategory($search, $start_date = null, $end_date = null) {
        if (!empty($search)) {
            $this->db->like('seo_title', $search);
            $this->db->or_like('meta_keyword', $search);
            $this->db->or_like('seo_robat', $search);
            $this->db->or_like('meta_description', $search);;
        }
        if (!empty($start_date) && !empty($end_date)) {
            $this->db->where('Create_Date >=', $start_date);
            $this->db->where('Create_Date <=', $end_date);
        }
        return $this->db->count_all_results('blogcategory'); 
    }
}






?>