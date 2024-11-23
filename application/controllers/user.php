<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct()
    {
      
        parent::__construct();
        $this->load->model('user/Userdata');
        $this->load->model('user/news');
        $this->load->model('user/pages');
        $this->load->library('pagination');
    }
    private function check_login()
    {
        if (!$this->session->userdata('id')) {
            redirect('user/login', 'refresh');
        }
    }
    public function index()
    {
        $this->check_login();
        $this->load->view('user/register');
    }

    public function insert_data()
    {
        $this->form_validation->set_error_delimiters('<div class="error-message">', '</div>');
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'email', 'required');
        $this->form_validation->set_rules('gender', 'gender', 'required');
        $this->form_validation->set_rules('mobilenumber', 'mobile number', 'required');
        $this->form_validation->set_rules('city', 'city', 'required');
        $this->form_validation->set_rules('state', 'state', 'required');
        $this->form_validation->set_rules('pincode', 'pincode', 'required');
        $this->form_validation->set_rules('country', 'country', 'required');
        $this->form_validation->set_rules('address', 'address', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');

        $data = [
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'gender' => $this->input->post('gender'),
            'mobilenumber' => $this->input->post('mobilenumber'),
            'city' => $this->input->post('city'),
            'state' => $this->input->post('state'),
            'pincode' => $this->input->post('pincode'),
            'country' => $this->input->post('country'),
            'address' => $this->input->post('address'),
            'password' => $this->input->post('password')
        ];

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('user/register');
        } else {
            $this->load->model('user/register');
            $this->register->getdata($data);
            redirect('user/userdata', 'refresh');

        }
    }

    public function login()
    {
        $this->load->view('user/login');
    }

    public function loginvalidation()
    {
        $this->form_validation->set_error_delimiters('<div class="error-message">', '</div>');

        $this->form_validation->set_rules('email', 'email', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');

        $data = [
            'email' => $this->input->post('email'),
            'password' => $this->input->post('password')
        ];

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('user/login');
        } else {
            $email = $data['email'];
            $password = $data['password'];

            $this->load->model('user/login');
            $Login_Id = $this->login->fetchdata($email, $password);

            if ($Login_Id) {
                $this->session->set_userdata('id', $Login_Id);
                redirect('user/welcome', 'refresh');
            } else {
                $this->form_validation->set_error_delimiters('<div class="error">', '</div>','refresh');
                $this->session->set_flashdata('error', 'Invalid email or password');
                $this->load->view('user/login');
            }
        }
    }

    public function welcome()
    {
        $this->check_login();
        $this->load->model('user/Login');
      $id=$this->session->userdata('id');
        $data['user'] = $this->Login->user();     
        $data['blog'] = $this->Login->blog();        
        $data['news'] = $this->Login->news();  
        // print_r( $data['news'] ); die;

        $data['username'] = $this->Login->username($id);   
        $this->load->view('user/dashboard',$data);
    }

    public function userdata()
    {
        $this->check_login();
        $config = [
            'base_url' => base_url('user/userdata'),
            'per_page' => 5,
            'total_rows' => $this->Userdata->num_rows(),
            'use_page_numbers' => TRUE,
            'num_links' => 2,
            'full_tag_open' => '<div class="pagination">',
            'full_tag_close' => '</div>',
            'first_link' => 'First',
            'last_link' => 'Last',
            'next_link' => '&raquo;',
            'prev_link' => '&laquo;',
        ];

        $this->pagination->initialize($config);

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 1;
        $offset = ($page - 1) * $config['per_page'];
        $data['user'] = $this->Userdata->getuserdata($config['per_page'], $offset);

        $this->load->view('user/User-Data', $data);
    }

    public function usereditdata($u) {
        $this->check_login();
        $this->load->model('Userdata');
    
        if ($this->input->post('submit')) {
            // Get updated user data from the form
            $updatedData = array(
                'name' => $this->input->post('name'), // Example field
                // Other fields to update
            );
    
            // Update the user data in the database
            $this->Userdata->update_user_data($u, $updatedData);
    
            // After the update, pass the updated user ID and reload the dashboard
            redirect('user/dashboard'); // Redirect to the dashboard after the update
        }
    
        // Fetch existing data for the user to pre-fill the form
        $data['user'] = $this->Userdata->usereditdata($u);
        
        // Load the user edit page
        $this->load->view('user/user-edit', $data);
    }
    public function userupdatedata() {
        $this->check_login();
        $this->form_validation->set_error_delimiters('<div class="error-message">', '</div>');
    
        
        $this->form_validation->set_rules('name', 'name', 'required');
        $this->form_validation->set_rules('email', 'email', 'required');
        $this->form_validation->set_rules('gender', 'gender', 'required');
        $this->form_validation->set_rules('mobilenumber', 'mobilenumber', 'required');
        $this->form_validation->set_rules('city', 'city', 'required');
        $this->form_validation->set_rules('state', 'state', 'required');
        $this->form_validation->set_rules('pincode', 'pincode', 'required');
        $this->form_validation->set_rules('country', 'country', 'required');
        $this->form_validation->set_rules('address', 'address', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');

        // $updated_data = [
        //     'name' => $this->input->post('name'),
        //     'email' => $this->input->post('email'),
        //     'gender' => $this->input->post('gender'),
        //     'mobilenumber' => $this->input->post('mobilenumber'),
        //     'city' => $this->input->post('city'),
        //     'state' => $this->input->post('state'),
        //     'pincode' => $this->input->post('pincode'),
        //     'country' => $this->input->post('country'),
        //     'address' => $this->input->post('address'),
        //     'password' => $this->input->post('password'),
        //     'id' => $this->input->post('id')
        // ];


        // print_r($updated_data);
        // die;

        $data['name'] = $this->input->post('name');
        $data['email'] = $this->input->post('email');
        $data['gender'] = $this->input->post('gender');
        $data['mobilenumber'] = $this->input->post('mobilenumber');
        $data['city'] = $this->input->post('city');
        $data['state'] = $this->input->post('state');
        $data['pincode'] = $this->input->post('pincode');
        $data['country'] = $this->input->post('country');
        $data['address'] = $this->input->post('address');
        $data['password'] = $this->input->post('password');
        $data['id'] = $this->input->post('id');
        // print_r($data);die();

        $u=$data['id'];
        if ($this->form_validation->run() == FALSE) {

            $this->load->model('Userdata');
        
            $data['user'] = $this->Userdata->usereditdata($u);

            $this->load->view('user/user-edit',$data);
            // echo "fdff";
            // die;
        } else {
        // $this->load->model('Userdata');
        // echo "get ";
        // die;
       
         $this->load->model('Userdata');
            $this->Userdata->update_userdata($u, $data);
            redirect('user/userdata', 'refresh');
    
            
        }
    
}
   public function userdeletedata($u){
    $this->check_login();
    $this->load->model('Userdata');
    $this->Userdata->userdeletedata($u);
    redirect('user/userdata', 'refresh');

   } 
   public function userpass($u){
    $this->check_login();
    $this->form_validation->set_error_delimiters('<div class="error-message">', '</div>');

    $this->form_validation->set_rules('oldpassword', 'oldpassword', 'required');
    $this->form_validation->set_rules('newpassword', 'newpassword', 'required');

    $data = [
        'oldpassword' => $this->input->post('oldpassword'),
        'newpassword' => $this->input->post('newpassword'),

    ];

    if ($this->form_validation->run() == FALSE) {
        $this->load->view('user/userpass');
    } else {
        
        $oldpassword = $data['oldpassword'];
        $this->load->model('user/Userdata');
        $Id = $this->Userdata->userpass($u,$oldpassword,$data);

        if ($Id) {
            redirect('user/userdata', 'refresh');
        } else {
            $this->form_validation->set_error_delimiters('<div class="error">', '</div>','refresh');
            $this->session->set_flashdata('error', 'Invalid Old password');
            $this->load->view('user/userpass');
        }
    }
   }
    public function profile(){
    $this->check_login();
     $id = $this->session->userdata('id');
     $this->load->model('user/profile');
     $data['user'] = $this->profile->fetchdata($id);
     $this->load->view('user/profile', $data);
        
    }
    public function logout(){
        $this->check_login();
        $this->session->unset_userdata('id');
    redirect('user/login', 'refresh');

    }
    public function blog() {
        $this->check_login();
        $this->load->model('user/Blogdata');
        
        // Pagination config
        $config1 = [
            'base_url' => base_url('user/blog'),
            'per_page' => 4,
            'total_rows' => $this->Blogdata->numrows(),
            'use_page_numbers' => TRUE,
            'num_links' => 2,
            'full_tag_open' => '<div class="pagination">',
            'full_tag_close' => '</div>',
            'first_link' => 'First',
            'last_link' => 'Last',
            'next_link' => '&raquo;',
            'prev_link' => '&laquo;',
        ];
    
        $this->pagination->initialize($config1);
    
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 1; // Default to page 1 if not set
    
        $start = ($page - 1) * $config1['per_page'];
    
        $data['blogs'] = $this->Blogdata->getblogdata($config1['per_page'], $start);
    
        // Load the view
        $this->load->view('user/blog', $data);
    }
    
    public function blogadd() {
        $this->check_login();
        $this->load->model('user/Blogdata');
        
        // Fetch categories from the model
        $data['category'] = $this->Blogdata->category();
        
        // Load the view and pass the categories data
        $this->load->view('user/blogadd', $data);
    } 
    public function add() {
        $this->check_login();
        $this->form_validation->set_error_delimiters('<div class="error-message">', '</div>');

        $this->form_validation->set_rules('Name', 'Name', 'required');
        $this->form_validation->set_rules('Title', 'Title', 'required|callback_check_title_exists');
        $this->form_validation->set_rules('seo_title', 'seo_title', 'required');
        $this->form_validation->set_rules('meta_keyword', 'meta_keyword', 'required');
        $this->form_validation->set_rules('seo_robat', 'seo_robat', 'required');
        function createSlug($string) {
            $slug = strtolower($string);
            $slug = preg_replace('/[^a-z0-9\s]/', '', $slug);
            $slug = str_replace(' ', '-', $slug);
            $slug = trim($slug, '-');
            return $slug;
        }
        $data['Name'] = $this->input->post('Name');
        $data['Title'] = $this->input->post('Title');
        $data['Description'] = $this->input->post('Description');
        $data['Create_Date'] = date('Y-m-d');
        $data['post_Date'] = $this->input->post('post_Date');
        $data['seo_robat'] = $this->input->post('seo_robat');
        $data['meta_keyword'] = $this->input->post('meta_keyword');
        $data['meta_description'] = $this->input->post('meta_description');
        $data['seo_title'] = $this->input->post('seo_title');
        $data['blog_title_category'] = $this->input->post('blog_title_category');
        $slug = createSlug($data['Title']);
        $data['slug'] = $slug;

        if ($_FILES['image']['name']) {
            $config['upload_path'] = './uploads/images/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['max_size'] = 2048;
            $config['file_name'] = time() . '_' . $_FILES['image']['name'];
    
            $this->load->library('upload', $config);
    
            if (!$this->upload->do_upload('image')) {
                $data['upload_error'] = $this->upload->display_errors();
                $this->load->view('user/blogadd', $data);
                return;
            } else {
                $upload_data = $this->upload->data();
                $data['image'] = $upload_data['file_name'];
            }
        }
    
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('user/blogadd', $data);
        } else {
            $this->load->model('user/Blogdata');
            $this->Blogdata->getdata($data);
            redirect('user/blog', 'refresh');
        }
    }
    public function check_title_exists($Title) {
        $this->load->model('user/Blogdata');

        if ($this->Blogdata->title_exists($Title)) {
            $this->form_validation->set_message('check_title_exists', 'The title is already taken.');
            return FALSE; 
        }
        return TRUE;
    }
    
    public function blogrecycle() {
        $this->check_login();
        $this->load->model('user/Blogdata');
    
        $config2 = [
            'base_url' => base_url('user/blogrecycle'),
            'per_page' => 4,
            'total_rows' => $this->Blogdata->countrows(),
            'use_page_numbers' => TRUE,
            'num_links' => 2,
            'full_tag_open' => '<div class="pagination">',
            'full_tag_close' => '</div>',
            'first_link' => 'First',
            'last_link' => 'Last',
            'next_link' => '&raquo;',
            'prev_link' => '&laquo;',
        ];
    
        $this->pagination->initialize($config2);
    
        $page = ($this->uri->segment(3)) ? (int)$this->uri->segment(3) : 1;  
        
        $start = ($page - 1) * $config2['per_page'];
    
        $data['blogrecycle'] = $this->Blogdata->getblogrecycledata($config2['per_page'], $start);
    
        $this->load->view('user/blogrecycle', $data);
    }
    
    public function blogrecycledata($u){
    $this->check_login();
        $this->load->model('user/Blogdata'); 
        $result = $this->Blogdata->blogrecycledata($u);
        
        if ($result) {
            redirect('user/blog', 'refresh');

        } else {
            echo "No record was updated. ";
        }
    }
    public function blogdelete($u){
    $this->check_login();
        $this->load->model('user/Blogdata');
    $this->Blogdata->blogdelete($u);
    redirect('user/blogrecycle', 'refresh'); 
    }
    public function blogeditdata($u){
    $this->check_login();
        $this->load->model('user/Blogdata');
        $data['user'] = $this->Blogdata->blogeditdata($u);
        $data['category'] = $this->Blogdata->category();
        $this->load->view('user/blogedit', $data);
    }
    public function edit(){
    $this->check_login();
        $this->form_validation->set_error_delimiters('<div class="error-message">', '</div>');

        $this->form_validation->set_rules('Name', 'Name', 'required');
        $this->form_validation->set_rules('Title', 'Title', 'required');
         
        function createSlug($string) {
            // Convert to lowercase
            $slug = strtolower($string);
        
            // Remove special characters
            $slug = preg_replace('/[^a-z0-9\s]/', '', $slug);
        
            // Replace spaces with hyphens
            $slug = str_replace(' ', '-', $slug);
        
            // Trim leading and trailing hyphens
            $slug = trim($slug, '-');
        
            return $slug;
        }
        
        $data['Name'] = $this->input->post('Name');
        $data['Title'] = $this->input->post('Title');
        $description = str_replace('<p>&nbsp;</p>', '', $this->input->post('Description'));
        $data['Description'] = $description;
        $data['Create_Date'] = $this->input->post('Create_Date');
        $data['Update_Date'] = date('Y-m-d');
        $data['post_Date'] = $this->input->post('post_Date');
        $data['meta_description'] = $this->input->post('meta_description');
        $data['seo_robat'] = $this->input->post('seo_robat');
        $data['meta_keyword'] = $this->input->post('meta_keyword');
        $data['seo_title'] = $this->input->post('seo_title');
        $data['blog_title_category'] = $this->input->post('blog_title_category');
        $data['id'] = $this->input->post('id');
        $slug = createSlug($data['Title']);
        $data['slug'] = $slug;
         $Title=$data['Title'];
        $u=$data['id'];
        if ($_FILES['image']['name']) {
            $config['upload_path'] = './uploads/images/'; 
            $config['allowed_types'] = 'jpg|jpeg|png|gif';  
            $config['max_size'] = 2048; 
            $config['file_name'] = time() . '_' . $_FILES['image']['name'];  
            
            $this->load->library('upload', $config);
    
            if (!$this->upload->do_upload('image')) {
                $data['upload_error'] = $this->upload->display_errors();
                $this->load->view('user/blogedit', $data);
                return;  
            } else {
                $upload_data = $this->upload->data();
                $data['image'] = $upload_data['file_name'];
            }
        }
        if ($this->form_validation->run() == FALSE) {
            $this->load->model('user/Blogdata');
        
            $data['user'] = $this->Blogdata->blogeditdata($u);

            $this->load->view('user/blogedit',$data);
        } else {
            $this->load->model('user/Blogdata'); 
            $Title = $this->input->post('Title'); 

            if ($this->Blogdata->title_exists($Title)) {
                $this->form_validation->set_message('check_title_exists', 'The title is already taken.');
                $this->load->model('user/Blogdata');
        
            $data['user'] = $this->Blogdata->blogeditdata($u);

            $this->load->view('user/blogedit',$data);
            } else {
                $this->load->model('user/Blogdata');
                $this->Blogdata->edit($u, $data);
                redirect('user/blog', 'refresh');
            }
        }
    }
    public function blogrestore($u){
       $this->check_login();
        $this->load->model('user/Blogdata');
       $result= $this->Blogdata->blogrestore($u);
      
        if ($result) {
            redirect('user/blogrecycle', 'refresh');

        } else {
            echo "No record was updated. ";
        }
    }
    public function adminpass(){
    $this->check_login();
       $id=$this->session->userdata("id");
    $this->form_validation->set_error_delimiters('<div class="error-message">', '</div>');

    $this->form_validation->set_rules('oldpassword', 'oldpassword', 'required');
    $this->form_validation->set_rules('newpassword', 'newpassword', 'required');

    $data = [
        'oldpassword' => $this->input->post('oldpassword'),
        'newpassword' => $this->input->post('newpassword'),

    ];

    if ($this->form_validation->run() == FALSE) {
        $this->load->view('user/adminpass');
    } else {
        
        $oldpassword = $data['oldpassword'];
        $this->load->model('user/profile');
        $Id = $this->profile->adminpass($id,$oldpassword,$data);
        if ($Id) {
            redirect('user/welcome', 'refresh');
        } else {
            $this->form_validation->set_error_delimiters('<div class="error">', '</div>','refresh');
            $this->session->set_flashdata('error', 'Invalid Old password');
            $this->load->view('user/adminpass');
        }
    }
       
    }
    public function updateprofile(){
    $this->check_login();
        $id=$this->session->userdata('id');
        $this->load->model('user/profile');
        $data['user'] = $this->profile->updateprofile($id);
        $this->load->view('user/updateprofile', $data);
    }
    public function updateadminprofile(){
     $this->form_validation->set_error_delimiters('<div class="error-message">', '</div>');

     $this->form_validation->set_rules('name', 'name', 'required');
     $this->form_validation->set_rules('email', 'email', 'required');
     $this->form_validation->set_rules('gender', 'gender', 'required');
     $this->form_validation->set_rules('mobilenumber', 'mobilenumber', 'required');
     $this->form_validation->set_rules('city', 'city', 'required');
     $this->form_validation->set_rules('state', 'state', 'required');
     $this->form_validation->set_rules('pincode', 'pincode', 'required');
     $this->form_validation->set_rules('country', 'country', 'required');
     $this->form_validation->set_rules('address', 'address', 'required');
     
     $data['name'] = $this->input->post('name');
        $data['email'] = $this->input->post('email');
        $data['gender'] = $this->input->post('gender');
        $data['mobilenumber'] = $this->input->post('mobilenumber');
        $data['city'] = $this->input->post('city');
        $data['state'] = $this->input->post('state');
        $data['pincode'] = $this->input->post('pincode');
        $data['country'] = $this->input->post('country');
        $data['address'] = $this->input->post('address');
        $data['id'] = $this->input->post('id');
      
     $id=$data['id'];
     if ($this->form_validation->run() == FALSE) {

         $this->load->model('user/profile');
     
         $data['user'] = $this->profile->updateprofile($id);

         $this->load->view('user/updateprofile',$data);
         
     } else {
 
      $this->load->model('user/profile');
         $this->profile->updateadminprofile($id, $data);
         redirect('user/welcome', 'refresh');
 
         
     }

    }
    public function News()
    {
        $this->check_login();
    
        $config = [
            'base_url' => base_url('user/news'),  
            'per_page' => 3,                      
            'total_rows' => $this->news->num_rows(),  
            'use_page_numbers' => TRUE,           
            'num_links' => 2,                     
            'full_tag_open' => '<div class="pagination">',
            'full_tag_close' => '</div>',
            'first_link' => 'First',
            'last_link' => 'Last',
            'next_link' => '&raquo;',
            'prev_link' => '&laquo;',
        ];
    
        $this->pagination->initialize($config);  
    
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 1; 
    
        $offset = ($page - 1) * $config['per_page'];  // Correct offset calculation
    
        $data['user'] = $this->news->getnewsdata($config['per_page'], $offset);
    
        $this->load->view('user/news', $data);
    }
    
    public function newsadd(){
        $this->load->model('user/news');
        $data['category'] = $this->news->category();
        $this->load->view('user/newsadd',$data);

    }
    public function addnews() {
        $this->form_validation->set_error_delimiters('<div class="error-message">', '</div>');
        $this->form_validation->set_rules('Author_Name', 'Author Name', 'required');
        $this->form_validation->set_rules('Title', 'Title', 'required|callback_news_title_exists');
        $this->form_validation->set_rules('Number', 'Number', 'required');
        $this->form_validation->set_rules('Email', 'Email', 'required');
        $this->form_validation->set_rules('seo_title', 'SEO Title', 'required');
        $this->form_validation->set_rules('meta_description', 'Meta Description', 'required');
        $this->form_validation->set_rules('meta_keyword', 'Meta Keyword', 'required');
        $this->form_validation->set_rules('seo_robat', 'SEO Robot', 'required');
        function createSlug($string) {
            $slug = strtolower($string);
            $slug = preg_replace('/[^a-z0-9\s]/', '', $slug);
            $slug = str_replace(' ', '-', $slug);
            $slug = trim($slug, '-');
            return $slug;
        }
    
        $data['Author_Name'] = $this->input->post('Author_Name');
        $data['Title'] = $this->input->post('Title');
        $data['Description'] = $this->input->post('Description');
        $data['Date'] = $this->input->post('Date');
        $data['Number'] = $this->input->post('Number');
        $data['Email'] = $this->input->post('Email');
        $data['seo_robat'] = $this->input->post('seo_robat');
        $data['meta_keyword'] = $this->input->post('meta_keyword');
        $data['meta_description'] = $this->input->post('meta_description');
        $data['seo_title'] = $this->input->post('seo_title');
        $data['news_title_category'] = $this->input->post('news_title_category');
        $slug = createSlug($data['Title']);
        $data['slug'] = $slug;

        if ($_FILES['image']['name']) {
            $config['upload_path'] = './uploads/news_images/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['max_size'] = 2048;
            $config['file_name'] = time() . '_' . $_FILES['image']['name'];
    
            $this->load->library('upload', $config);
    
            if (!$this->upload->do_upload('image')) {
                $data['upload_error'] = $this->upload->display_errors();
                $this->load->view('user/newsadd', $data);
                return;
            } else {
                $upload_data = $this->upload->data();
                $data['image'] = $upload_data['file_name'];
            }
        }

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('user/newsadd', $data);
        } 
         else {
                $this->news->getdata($data);
                redirect('user/news', 'refresh');
            }
        }
    public function news_title_exists($Title) {
        $this->load->model('user/news');
        if ($this->news->news_title_exists($Title)) {
            $this->form_validation->set_message('news_title_exists', 'The title is already taken.');
            return FALSE;  
        }
        return TRUE; 
    }  
    public function newseditdata($u) {
        // echo "hjdfsfkds"; die;
        $this->load->model('user/news');
        $data['user'] = $this->news->newseditdata($u);
        $data['category'] = $this->news->category($u);
        $this->load->view('user/newsedit', $data);
    }
    public function newsedit() {
        $this->form_validation->set_error_delimiters('<div class="error-message">', '</div>');
    
        
        $this->form_validation->set_rules('Author_Name', 'Author_Name', 'required');
        $this->form_validation->set_rules('Title', 'Title', 'required');
        $this->form_validation->set_rules('Number', 'Number', 'required');
        $this->form_validation->set_rules('Email', 'Email', 'required');
        $this->form_validation->set_rules('seo_title', 'seo_title', 'required');
        $this->form_validation->set_rules('meta_description', 'meta_description', 'required');
        $this->form_validation->set_rules('meta_keyword', 'meta_keyword', 'required');
        $this->form_validation->set_rules('seo_robat', 'seo_robat', 'required');
        
        function createSlug($string) {
            // Convert to lowercase
            $slug = strtolower($string);
        
            // Remove special characters
            $slug = preg_replace('/[^a-z0-9\s]/', '', $slug);
        
            // Replace spaces with hyphens
            $slug = str_replace(' ', '-', $slug);
        
            // Trim leading and trailing hyphens
            $slug = trim($slug, '-');
        
            return $slug;
        }
        $data['Author_Name'] = $this->input->post('Author_Name');
        $data['Title'] = $this->input->post('Title');
        $description = str_replace('<p>&nbsp;</p>', '', $this->input->post('Description'));
        $data['Description'] = $description;
        $data['Date'] = $this->input->post('Date');
        $data['Number'] = $this->input->post('Number');
        $data['Email'] = $this->input->post('Email');
        $data['id'] = $this->input->post('id');
        $data['seo_robat'] = $this->input->post('seo_robat');
        $data['meta_keyword'] = $this->input->post('meta_keyword');
        $data['meta_description'] = $this->input->post('meta_description');
        $data['seo_title'] = $this->input->post('seo_title');
        $data['news_title_category'] = $this->input->post('news_title_category');
        $u=$data['id'];
        $slug = createSlug($data['Title']);
        $data['slug'] = $slug;
        $Title=$data['Title'];
        if ($_FILES['image']['name']) {
            $config['upload_path'] = './uploads/news_images/'; 
            $config['allowed_types'] = 'jpg|jpeg|png|gif';  
            $config['max_size'] = 2048; 
            $config['file_name'] = time() . '_' . $_FILES['image']['name'];  
            
            $this->load->library('upload', $config);
    
            if (!$this->upload->do_upload('image')) {
                
                $data['upload_error'] = $this->upload->display_errors();
                $this->load->view('user/newsedit', $data);
                return;  
            } else {
                
                $upload_data = $this->upload->data();
                $data['Image'] = $upload_data['file_name'];
            }
        }
        if ($this->form_validation->run() == FALSE) {
            $this->load->model('user/news');
        
            $data['user'] = $this->news->newseditdata($u);

            $this->load->view('user/newsedit',$data);
        } else {
            $this->load->model('user/news');
            $Title = $this->input->post('Title'); 

            if ($this->news->news_title_exists($Title)) {
                $this->form_validation->set_message('check_title_exists', 'The title is already taken.');
                $this->load->model('user/news');
        
            $data['user'] = $this->news->newseditdata($u);

            $this->load->view('user/newsedit',$data);
            } else {
                $this->news->update_newsdata($u, $data);
            redirect('user/News', 'refresh');
            }
        } 
}
public function newsrecycledata($u) {
    $this->load->model('user/news'); 
        $result = $this->news->newsrecycledata($u);
        
        if ($result) {
            redirect('user/News', 'refresh');

        } else {
            echo "No record was updated. ";
        }
    
    }
    public function recyclenews()
    {
        $config2 = [
            'base_url' => base_url('user/recyclenews'),
            'per_page' => 4, 
            'total_rows' => $this->news->countrows(), 
            'use_page_numbers' => TRUE, 
            'num_links' => 2, 
            'full_tag_open' => '<div class="pagination">', 
            'full_tag_close' => '</div>', 
            'first_link' => 'First', 
            'last_link' => 'Last', 
            'next_link' => '&raquo;', 
            'prev_link' => '&laquo;', 
        ];
    
        $this->pagination->initialize($config2);
    
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 1;
    
        $offset = ($page - 1) * $config2['per_page']; 
    
        $data['newsrecycle'] = $this->news->getnewsrecycledata($config2['per_page'], $offset);
    
        $this->load->view('user/newsrecycle', $data);
    }
    
    public function newsdelete($u) {
        $this->load->model('user/news');
        $this->news->newsdelete($u);
        redirect('user/recyclenews', 'refresh'); 
        }
        public function newsrestore($u) {
            $this->load->model('user/news');
            $result= $this->news->newsrestore($u);
           
             if ($result) {
                 redirect('user/recyclenews', 'refresh');
     
             } else {
                 echo "No record was updated. ";
             }
         }
         public function pages() {
        
            $config = [
                'base_url' => base_url('user/pages'),
                'per_page' => 4,
                'total_rows' => $this->pages->num_rows(), 
                'use_page_numbers' => TRUE,
                'num_links' => 2,
                'full_tag_open' => '<div class="pagination">',
                'full_tag_close' => '</div>',
                'first_link' => 'First',
                'last_link' => 'Last',
                'next_link' => '&raquo;',
                'prev_link' => '&laquo;',
            ];
        
            $this->pagination->initialize($config);
        
           
            $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 1;
        $offset = ($page - 1) * $config['per_page']; 
            $data['user'] = $this->pages->getpagesdata($config['per_page'], $offset);  
        
            $this->load->view('user/pages', $data);
        }
        public function pagesadd() {
            $this->load->view('user/pagesadd');
            
    
        }
        public function addpages(){
            $this->form_validation->set_error_delimiters('<div class="error-message">', '</div>');

            $this->form_validation->set_rules('Title', 'Title', 'required');
            $this->form_validation->set_rules('number', 'number', 'required');
            $this->form_validation->set_rules('email', 'email', 'required');
            $this->form_validation->set_rules('gender', 'gender', 'required');

    
            
            $data['Title'] = $this->input->post('Title');
            $data['description'] = $this->input->post('description');
            $data['Date'] = $this->input->post('Date');
            $data['number'] = $this->input->post('number');
            $data['email'] = $this->input->post('email');
            $data['gender'] = $this->input->post('gender');

            if ($this->form_validation->run() == FALSE) {
           
                $this->load->view('user/pagesadd', $data);
            } else {
                $this->load->model('user/pages');
                $this->pages->getdata($data);
                redirect('user/pages', 'refresh');
            }

        }
        public function recyclepages(){
            $this->load->model('user/pages');
            $config2 = [
                'base_url' => base_url('user/recyclepages'),
                'per_page' => 4,
                'total_rows' => $this->pages->countrows(),
                'use_page_numbers' => TRUE,
                'num_links' => 2,
                'full_tag_open' => '<div class="pagination">',
                'full_tag_close' => '</div>',
                'first_link' => 'First',
                'last_link' => 'Last',
                'next_link' => '&raquo;',
                'prev_link' => '&laquo;',
            ];
        
            $this->pagination->initialize($config2);
        
            $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 1;
            $offset = ($page - 1) * $config2['per_page']; 
        
            $data['user'] = $this->pages->getpagesrecycledata($config2['per_page'], $offset);
        
            $this->load->view('user/pagesrecycle', $data);
        }
        public function pagesrecycledata($u){
            $this->load->model('user/pages'); 
        $result = $this->pages->pagesrecycledata($u);
        
        if ($result) {
            redirect('user/pages', 'refresh');

        } else {
            echo "No record was updated. ";
        }
    
    }
    public function pageseditdata($u){
        $this->load->model('user/pages');
        $data['user'] = $this->pages->pageseditdata($u);
        $this->load->view('user/pagesedit', $data);
    }
public function pagesedit(){
    $this->form_validation->set_error_delimiters('<div class="error-message">', '</div>');
    $this->form_validation->set_rules('Title', 'Title', 'required');
    $this->form_validation->set_rules('number', 'number', 'required');
    $this->form_validation->set_rules('email', 'email', 'required');
    $this->form_validation->set_rules('gender', 'gender', 'required');


    
    $data['Title'] = $this->input->post('Title');
    $data['description'] = $this->input->post('description');
    $data['Date'] = $this->input->post('Date');
    $data['number'] = $this->input->post('number');
    $data['email'] = $this->input->post('email');
    $data['gender'] = $this->input->post('gender');
    $data['id'] = $this->input->post('id');
   
    $u=$data['id'];
    if ($this->form_validation->run() == FALSE) {

        $this->load->model('user/pages');
    
        $data['user'] = $this->pages->pageseditdata($u);

        $this->load->view('user/pagesedit',$data);
        
    } else {
  
   
     $this->load->model('user/pages');
        $this->pages->update_pagesdata($u, $data);
        redirect('user/pages', 'refresh');

        
    }


}
public function pagesdelete($u){
    $this->load->model('user/pages');
    $this->pages->pagesdelete($u);
    redirect('user/recyclepages', 'refresh'); 
}

public function pagesrestore($u){
    $this->load->model('user/pages');
    $result= $this->pages->pagesrestore($u);
   
     if ($result) {
         redirect('user/recyclepages', 'refresh');

     } else {
         echo "No record was updated. ";
     }
}
public function category() {
    $this->load->model('user/Blogdata');
    
    // Pagination config
    $config3 = [
        'base_url' => base_url('user/category'),
        'per_page' => 4,
        'total_rows' => $this->Blogdata->num_rows(),
        'use_page_numbers' => TRUE,
        'num_links' => 2,
        'full_tag_open' => '<div class="pagination">',
        'full_tag_close' => '</div>',
        'first_link' => 'First',
        'last_link' => 'Last',
        'next_link' => '&raquo;',
        'prev_link' => '&laquo;',
    ];

    $this->pagination->initialize($config3);

    $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 1; // Default to page 1 if not set

    $start = ($page - 1) * $config3['per_page'];

    $data['blogcategory'] = $this->Blogdata->getblogcategorydata($config3['per_page'], $start);

    // Load the view
    $this->load->view('user/blogcategory', $data);
}
public function blogcategoryeditdata($u){
    $this->check_login();
        $this->load->model('user/Blogdata');
        $data['user'] = $this->Blogdata->blogcategoryeditdata($u);
        $this->load->view('user/blogcategoryedit', $data);
    }
public function blogcategoryedit() {
    $this->form_validation->set_error_delimiters('<div class="error-message">', '</div>');
    $data['meta_description'] = $this->input->post('meta_description');
    $data['seo_robat'] = $this->input->post('seo_robat');
    $data['meta_keyword'] = $this->input->post('meta_keyword');
    $data['seo_title'] = $this->input->post('seo_title');
    $data['id'] = $this->input->post('id');
 
    $u=$data['id'];
    $this->form_validation->set_rules('seo_title', 'seo_title', 'required');
    $this->form_validation->set_rules('meta_description', 'meta_description', 'required');
    $this->form_validation->set_rules('meta_keyword', 'meta_keyword', 'required');
    $this->form_validation->set_rules('seo_robat', 'seo_robat', 'required');

    if ($this->form_validation->run() == FALSE) {

        $this->load->model('user/Blogdata');
    
        $data['user'] = $this->Blogdata->blogcategoryeditdata($u);

        $this->load->view('user/blogcategoryedit',$data);
        
    } else {

     $this->load->model('user/Blogdata');
        $this->Blogdata->blogcategoryedit($u, $data);
        redirect('user/category', 'refresh');

    }
}

public function blogcategorydelete($u){
    // echo $u; die;
    $this->load->model('user/Blogdata');
    $this->Blogdata->blogcategorydelete($u);
    redirect('user/category', 'refresh'); 
}
public function blogcategoryadd(){
    $this->load->view('user/blogcategoryadd');
}
public function categoryadd(){
    $this->form_validation->set_error_delimiters('<div class="error-message">', '</div>');
    $data['meta_description'] = $this->input->post('meta_description');
    $data['seo_robat'] = $this->input->post('seo_robat');
    $data['meta_keyword'] = $this->input->post('meta_keyword');
    $data['seo_title'] = $this->input->post('seo_title');
   
    $this->form_validation->set_rules('seo_title', 'seo_title', 'required');
    $this->form_validation->set_rules('meta_description', 'meta_description', 'required');
    $this->form_validation->set_rules('meta_keyword', 'meta_keyword', 'required');
    $this->form_validation->set_rules('seo_robat', 'seo_robat', 'required');
    if ($this->form_validation->run() == FALSE) {
           
        $this->load->view('user/blogcategoryadd', $data);
    } else {
        $this->load->model('user/Blogdata');
        $this->Blogdata->insertdata($data);
        redirect('user/category', 'refresh');
    }

}
public function newscategory(){
    $this->load->model('user/news');
    
    // Pagination config
    $config3 = [
        'base_url' => base_url('user/newscategory'),
        'per_page' => 4,
        'total_rows' => $this->news->numcount(),
        'use_page_numbers' => TRUE,
        'num_links' => 2,
        'full_tag_open' => '<div class="pagination">',
        'full_tag_close' => '</div>',
        'first_link' => 'First',
        'last_link' => 'Last',
        'next_link' => '&raquo;',
        'prev_link' => '&laquo;',
    ];

    $this->pagination->initialize($config3);

    $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 1; // Default to page 1 if not set

    $start = ($page - 1) * $config3['per_page'];

    $data['newscategory'] = $this->news->getnewscategorydata($config3['per_page'], $start);

    // Load the view
    $this->load->view('user/newscategory', $data);
}
public function newscategoryadd(){
    $this->load->view('user/newscategoryadd');
}
public function newscategoryadddata(){
    $this->form_validation->set_error_delimiters('<div class="error-message">', '</div>');
    $this->form_validation->set_rules('seo_title', 'seo_title', 'required');
    $this->form_validation->set_rules('meta_description', 'meta_description', 'required');
    $this->form_validation->set_rules('meta_keyword', 'meta_keyword', 'required');
    $this->form_validation->set_rules('seo_robat', 'seo_robat', 'required');

    $data['meta_description'] = $this->input->post('meta_description');
    $data['seo_robat'] = $this->input->post('seo_robat');
    $data['meta_keyword'] = $this->input->post('meta_keyword');
    $data['seo_title'] = $this->input->post('seo_title');
   
   
    if ($this->form_validation->run() == FALSE) {
           
        $this->load->view('user/newscategoryadd', $data);
    } else {
        $this->load->model('user/news');
        $this->news->newscategoryadddata($data);
        redirect('user/newscategory', 'refresh');
    }

}
public function newscategorydelete($u){
    $this->load->model('user/news');
    $this->news->newscategorydelete($u);
    redirect('user/newscategory', 'refresh'); 
}
public function newscategoryeditdata($u){
    $this->load->model('user/news');
    $data['user'] = $this->news->newscategoryeditdata($u);
    $this->load->view('user/newscategoryeditdata',$data);
}
public function newscategoryedit(){
    $this->form_validation->set_error_delimiters('<div class="error-message">', '</div>');

    $data['meta_description'] = $this->input->post('meta_description');
    $data['seo_robat'] = $this->input->post('seo_robat');
    $data['meta_keyword'] = $this->input->post('meta_keyword');
    $data['seo_title'] = $this->input->post('seo_title');
    $data['id'] = $this->input->post('id');
 
    $u=$data['id'];
    $this->form_validation->set_rules('seo_title', 'seo_title', 'required');
    $this->form_validation->set_rules('meta_description', 'meta_description', 'required');
    $this->form_validation->set_rules('meta_keyword', 'meta_keyword', 'required');
    $this->form_validation->set_rules('seo_robat', 'seo_robat', 'required');
    if ($this->form_validation->run() == FALSE) {

        $this->load->model('user/news');
    
        $data['user'] = $this->news->newscategoryeditdata($u);

        $this->load->view('user/newscategoryeditdata',$data);
        
    } else {

     $this->load->model('user/news');
        $this->news->newscategoryedit($u, $data);
        redirect('user/newscategory', 'refresh');

    }

}
public function blogsite() {
    $this->load->model('blogpost/Blogview');
    
    $data['user'] = $this->Blogview->blogsite();  
    $data['newsview'] = $this->Blogview->newsview();  
    
    $this->load->view('blogpost/blogview', $data);
}
public function blogsshow() {
    $this->load->model('blogpost/Blogview');
    $data['user'] = $this->Blogview->blogsshow();
    $data['sideblogcategory'] = $this->Blogview->sideblogcategory();  
    $this->load->view('blogpost/blogsshow', $data);
}
    public function newsshow(){
        $this->load->model('blogpost/Blogview');
    $data['newsview'] = $this->Blogview->newsshow();
    $data['sidenewscategory'] = $this->Blogview->sidenewscategory();  
    $this->load->view('blogpost/newsshow', $data);
    }
    public function particularshow($rowcategory,$rowslug) {
        // print_r($rowcategory); die;
        $this->load->model('blogpost/Blogview');
        $data['user'] = $this->Blogview->particularshow($rowslug);  
        $data['sideblog'] = $this->Blogview->sideblog($rowcategory);  
    $this->load->view('blogpost/particularblog', $data);
    }
    public function particularnews($newscategory,$newsslug) {
        $this->load->model('blogpost/Blogview');
        $data['news'] = $this->Blogview->particularnews($newsslug); 
        $data['sidenews'] = $this->Blogview->sidenews($newscategory);  
    $this->load->view('blogpost/particularnews', $data);
    }
    
    public function categoryblog($row) {
        // print_r($row); die;
        // $this->load->model('blogpost/Blogview');

        $this->load->model('blogpost/Blogview');
        $data['user'] = $this->Blogview->categoryblog($row);  
        // $data['sideblog'] = $this->Blogview->sideblog();  
        // print_r($data['user']); die;
    $this->load->view('blogpost/categoryblog', $data);
}
public function newss($row) {
    // print_r($row); die;particularshow
    $this->load->model('blogpost/Blogview');
    $data['user'] = $this->Blogview->newss($row);  
    // print_r($data['user']); die;
$this->load->view('blogpost/categorynews', $data);
}
}
?>