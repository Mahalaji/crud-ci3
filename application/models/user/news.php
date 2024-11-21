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
}




// public function usereditdata($u) {

//     $this->db->where('id', $u);
//     $query = $this->db->get('user_detail'); 
//     return $query->row_array(); 
// }

// public function update_userdata($u, $data) {

//     $updatedata=[
//         'name' => $data['name'],    
//         'email'=> $data['email'],  
//         'gender'=> $data['gender'],       
//         'mobilenumber'=> $data['mobilenumber'],       
//         'city'=> $data['city'],       
//         'state'=> $data['state'],       
//         'country'=> $data['country'],       
//         'pincode'=> $data['pincode'],       
//         'address'=> $data['address'],       
//         'password'=> $data['password'],       

//     ];
//     $this->db->where('id', $u);
//     return $this->db->update('user_detail', $updatedata); 
// }
// public function userdeletedata($u){
//     $this->db->where('id', $u);
//     return $this->db->delete('user_detail');
// }
// public function userpass($u,$oldpassword,$data) {
// //   echo "$u\n" ; echo $oldpassword; die;
//     $this->db->where('id', $u);
//     $this->db->where('password',$oldpassword);
//     $query = $this->db->get('user_detail'); 
//     if ($query->num_rows() > 0) {
//        $update=[
//           'password'=>$data['newpassword']
//        ];
//        $this->db->where('id', $u);
//        return $this->db->update('user_detail', $update);
//     } else {
//         return false;
//     }
// }


?>