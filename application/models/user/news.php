<?php
class news extends CI_Model
{

    public function num_rows()
    {
        $this->db->where('recycle', 1);
        return $this->db->count_all_results('news');
    }

    public function getnewsdata($limit, $offset)
    {
        $this->db->where('recycle', 1);
        $query = $this->db->get('news', $limit, $offset);
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



        );
       
        $this->db->insert('news', $data);


    }
    public function countrows()
    {
        $this->db->where('recycle', 0);
        return $this->db->count_all_results('news');
    }
    public function getnewsrecycledata($limit, $offset)
    {
        $this->db->where('recycle', 0);
        $query = $this->db->get('news', $limit, $offset);
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