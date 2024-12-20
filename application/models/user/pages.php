<?php
class pages extends CI_Model
{

    public function num_rows()
    {
        $this->db->where('recycle', 1);
        return $this->db->count_all_results('pages');
    }
    public function getpagesdata($limit, $offset)
    {
        
        $this->db->where('recycle', 1);
        $query = $this->db->get('pages', $limit, $offset);
        return $query->result_array();
    }
    public function getdata($data)
    {


        $data = array(
            'Title' => $data['Title'],
            'description' => $data['description'],
            'Date' => $data['Date'],
            'number' => $data['number'],
            'gender'=> $data['gender'],
            'email'=> $data['email'],



        );
       
        $this->db->insert('pages', $data);


    }
    public function countrows()
    {
        $this->db->where('recycle', 0);
        return $this->db->count_all_results('pages');
    }
    public function getpagesrecycledata($limit, $offset)
    {
        $this->db->limit($limit, $offset);
        $this->db->where('recycle', 0);
        $query = $this->db->get('pages', $limit, $offset);
        return $query->result_array();
    }
    public function pagesrecycledata($u)
    {
        $this->db->where('id', $u);

        $this->db->update('pages', ['recycle' => 0]);


        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
    public function pagesdelete($u)
    {
        $this->db->where('id', $u);
        return $this->db->delete('pages');
    }
    public function pageseditdata($u)
    {
        $this->db->where('id', $u);
        $query = $this->db->get('pages');
        return $query->row_array();
    }
    public function update_pagesdata($u, $data)
    {
        $data = array(
           'Title' => $data['Title'],
            'description' => $data['description'],
            'Date' => $data['Date'],
            'number' => $data['number'],
            'gender'=> $data['gender'],
            'email'=> $data['email'],


        );
        $this->db->where('id', $u);
        $this->db->update('pages', $data);

    }
    public function pagesrestore($u)
    {    
        $this->db->where('id', $u);
        $this->db->update('pages', ['recycle' => 1]);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
    public function getFilteredPages($start, $length, $search, $order_by, $order_dir,$start_date,$end_date) {
        
        if (!empty($search)) {
            $this->db->group_start(); 
            $this->db->like('Title', $search);
            $this->db->or_like('email', $search);
            $this->db->or_like('gender', $search);
            $this->db->or_like('description', $search);
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
        $query = $this->db->get('pages');

        return $query->result();
    }
    public function countAllPages() {
        $this->db->where('recycle',1);
        return $this->db->count_all_results('pages');
    }
    public function countFilteredPages($search, $start_date = null, $end_date = null) {
        if (!empty($search)) {
            $this->db->like('Title', $search);
            $this->db->or_like('email', $search);
            $this->db->or_like('gender', $search);
            $this->db->or_like('description', $search);
        }
        if (!empty($start_date) && !empty($end_date)) {
            $this->db->where('Date >=', $start_date);
            $this->db->where('Date <=', $end_date);
        }
        $this->db->where('recycle',1);
        return $this->db->count_all_results('pages'); 
    }
    public function getFilteredRecyclePages($start, $length, $search, $order_by, $order_dir,$start_date,$end_date) {
        
        if (!empty($search)) {
            $this->db->group_start(); 
            $this->db->like('Title', $search);
            $this->db->or_like('email', $search);
            $this->db->or_like('gender', $search);
            $this->db->or_like('description', $search);
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
        $query = $this->db->get('pages');

        return $query->result();
    }
    public function countAllRecyclePages() {
        $this->db->where('recycle',0);
        return $this->db->count_all_results('pages');
    }
    public function countFilteredRecyclePages($search, $start_date = null, $end_date = null) {
        if (!empty($search)) {
            $this->db->like('Title', $search);
            $this->db->or_like('email', $search);
            $this->db->or_like('gender', $search);
            $this->db->or_like('description', $search);
        }
        if (!empty($start_date) && !empty($end_date)) {
            $this->db->where('Date >=', $start_date);
            $this->db->where('Date <=', $end_date);
        }
        $this->db->where('recycle',0);
        return $this->db->count_all_results('pages'); 
    }
    }



?>