<?php
class news extends CI_Model
{

    public function num_rows()
    {
        $this->db->where('recycle', 1);
        return $this->db->count_all_results('news');
    }
    public function getnewsdata($limit, $offset) {
        $this->db->limit($limit, $offset);
        $this->db->where('recycle',1);
        $query = $this->db->get('news'); // Assuming 'blogs' is the table name
        return $query->result_array();
    }
   
    
    public function getdata($data)
    {


        $data = array(
            'Author_Name' => $data['Author_Name'],
            'Title' => $data['Title'],

            'Description' => $data['Description'],
            'Date' => $data['Date'],
            'Number' => $data['Number'],
            'image'=> $data['image'],
            'Email'=> $data['Email'],
            'seo_robat' => $data['seo_robat'],
            'meta_keyword' => $data['meta_keyword'],
            'meta_description' => $data['meta_description'],
            'seo_title' => $data['seo_title'],
            'news_title_category' => $data['news_title_category'],
            'slug' => $data['slug'],
        );
        // print_r($data); die;
        $this->db->insert('news', $data);


    }
    public function countrows()
    {
        $this->db->where('recycle', 0);
        return $this->db->count_all_results('news');
    }
    public function getnewsrecycledata($limit, $offset)
    {
        $this->db->limit($limit, $offset);
        
        $this->db->where('recycle', 0);
        $query = $this->db->get('news');
        return $query->result_array();
    }
    public function newsrecycledata($u)
    {
        $this->db->where('id', $u);

        $this->db->update('news', ['recycle' => 0]);


        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
    public function newsdelete($u)
    {
        $this->db->where('id', $u);
        return $this->db->delete('news');
    }
    public function newseditdata($u)
    {
        $this->db->where('id', $u);
        $query = $this->db->get('news');
        return $query->row_array();
    }
    public function update_newsdata($u, $data)
    {
    //     $image=$data['Image'];
    // echo''.$u.''.$image.''; die;
        $data = array(
            
            'Author_Name' => $data['Author_Name'],
            'Title' => $data['Title'],

            'Description' => $data['Description'],
            'Date' => $data['Date'],
            'Number' => $data['Number'],
            'Image'=> $data['Image'],
            'Email'=> $data['Email'],
            'seo_robat' => $data['seo_robat'],
            'meta_keyword' => $data['meta_keyword'],
            'meta_description' => $data['meta_description'],
            'seo_title' => $data['seo_title'],
            'news_title_category' => $data['news_title_category'],
            'slug' => $data['slug'],
        );
        $this->db->where('id', $u);
        $this->db->update('news', $data);

    }
    public function newsrestore($u)
    {    
        $this->db->where('id', $u);
        $this->db->update('news', ['recycle' => 1]);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
    public function numcount()
    {
        
        return $this->db->count_all_results('newscategory');
    }
    public function getnewscategorydata($limit, $start) {
        $this->db->limit($limit, $start);
        $query = $this->db->get('newscategory'); // Assuming 'blogs' is the table name
        return $query->result_array();
    }
    public function newscategoryadddata($data) {
        

        $data = array(
            
            'seo_robat' => $data['seo_robat'],
            'meta_keyword' => $data['meta_keyword'],
            'meta_description' => $data['meta_description'],
            'seo_title' => $data['seo_title'],

        );
       
        $this->db->insert('newscategory', $data);
    }
    public function newscategorydelete($u) {
        $this->db->where('id', $u);
       return $this->db->delete('newscategory');
    }
    public function newscategoryeditdata($u) {
        $this->db->where('id', $u);
        $query = $this->db->get('newscategory');
        return $query->row_array();
    }
    public function newscategoryedit($u,$data) {
        $data = array(
           
            'seo_robat' => $data['seo_robat'],
            'meta_keyword' => $data['meta_keyword'],
            'meta_description' => $data['meta_description'],
            'seo_title' => $data['seo_title'],


        );
        // echo $u; die;
        // print_r($data); die();
        $this->db->where('id', $u);
        $this->db->update('newscategory', $data);

    }
    public function category() {
        $query = $this->db->get('newscategory');  // Perform the query
        return $query->result_array();  // Return the result as an array
    }
    public function news_title_exists($Title) {
        $this->db->where('Title', $Title);
        $query = $this->db->get('news');
        if ($query->num_rows() > 0) {
            return TRUE; 
        }
        return FALSE; 
    }
    public function getFilteredNews($start, $length, $search, $order_by, $order_dir,$start_date,$end_date) {
        
        if (!empty($search)) {
            $this->db->group_start(); 
            $this->db->like('Author_Name', $search);
            $this->db->or_like('Title', $search);
            $this->db->or_like('news_title_category', $search);
            $this->db->group_end(); 
        }
        if (!empty($start_date) && !empty($end_date)) {
            $this->db->where('Date >=', $start_date);
            $this->db->where('Date <=', $end_date);
        }
     
        if (!empty($order_by) && !empty($order_dir)) {
            $this->db->order_by($order_by, $order_dir); 
        } else {
            $this->db->order_by('id', 'asc'); 
        }
        $this->db->limit($length, $start);
        $this->db->where('recycle',1);
        $query = $this->db->get('news');

        return $query->result();
    }
    public function countAllNews() {
        $this->db->where('recycle',1);
        return $this->db->count_all_results('news');
    }
    public function countFilteredNews($search, $start_date = null, $end_date = null) {
        if (!empty($search)) {
            $this->db->like('Author_Name', $search);
            $this->db->or_like('Title', $search);
            $this->db->or_like('news_title_category', $search);
        }
        if (!empty($start_date) && !empty($end_date)) {
            $this->db->where('Date >=', $start_date);
            $this->db->where('Date <=', $end_date);
        }
        $this->db->where('recycle',1);
        return $this->db->count_all_results('news'); 
    }
    public function getFilteredRecycleNews($start, $length, $search, $order_by, $order_dir,$start_date,$end_date) {
        
        if (!empty($search)) {
            $this->db->group_start(); 
            $this->db->like('Author_Name', $search);
            $this->db->or_like('Title', $search);
            $this->db->or_like('news_title_category', $search);
            $this->db->group_end(); 
        }
        if (!empty($start_date) && !empty($end_date)) {
            $this->db->where('Date >=', $start_date);
            $this->db->where('Date <=', $end_date);
        }
     
        if (!empty($order_by) && !empty($order_dir)) {
            $this->db->order_by($order_by, $order_dir); 
        } else {
            $this->db->order_by('id', 'asc'); 
        }
        $this->db->limit($length, $start);
        $this->db->where('recycle',0);
        $query = $this->db->get('news');

        return $query->result();
    }
    public function countAllRecycleNews() {
        $this->db->where('recycle',0);
        return $this->db->count_all_results('news');
    }
    public function countFilteredRecycleNews($search, $start_date = null, $end_date = null) {
        if (!empty($search)) {
            $this->db->like('Author_Name', $search);
            $this->db->or_like('Title', $search);
            $this->db->or_like('news_title_category', $search);
        }
        if (!empty($start_date) && !empty($end_date)) {
            $this->db->where('Date >=', $start_date);
            $this->db->where('Date <=', $end_date);
        }
        $this->db->where('recycle',0);
        return $this->db->count_all_results('news'); 
    }
    public function getFilterednewsCategory($start, $length, $search, $order_by, $order_dir,$start_date,$end_date) {
        
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
        $query = $this->db->get('newscategory');

        return $query->result();
    }
    public function countAllnewsCategory() {
        return $this->db->count_all_results('newscategory');
    }
    public function countFilterednewsCategory($search, $start_date = null, $end_date = null) {
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
        return $this->db->count_all_results('newscategory'); 
    }
}

?>