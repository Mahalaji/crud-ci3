<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('user/Userdata');
        $this->load->library('pagination');
    }

    public function index()
    {
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
        $this->load->view('user/dashboard');
    }

    public function userdata()
    {
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

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        $data['user'] = $this->Userdata->getuserdata($config['per_page'], $page);

        $this->load->view('user/User-Data', $data);
    }
	public function usereditdata($u) {
        $this->load->model('Userdata');
        
        $data['user'] = $this->Userdata->usereditdata($u);
        $this->load->view('user/user-edit', $data);
    }
    public function userupdatedata() {
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
    $this->load->model('Userdata');
    $this->Userdata->userdeletedata($u);
    redirect('user/userdata', 'refresh');

   } 
   public function userpass($u){
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
    

}
?>
