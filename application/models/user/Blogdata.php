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




        );
       
        $this->db->insert('blog', $data);


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
        $this->db->where('recycle',1);
            return $this->db->count_all_results('blog');
        }
        
    public function getblogcategorydata($limit, $start) {
        $this->db->limit($limit, $start);
        $this->db->where('recycle',1);
        $query = $this->db->get('blog'); // Assuming 'blogs' is the table name
        return $query->result_array();
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