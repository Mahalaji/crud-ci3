<?php
class Company extends CI_Model
{
    public function getFilteredCompany($start, $length, $search, $order_by, $order_dir,$start_date,$end_date) {
        if (!empty($search)) {
            $this->db->group_start(); 
            $this->db->like('companyname', $search);
            $this->db->or_like('companytype', $search);
            $this->db->or_like('companyemail', $search);
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
        $query = $this->db->get('companydetails');

        return $query->result();
    }
    public function countAllCompany() {
        return $this->db->count_all_results('companydetails');
    }
    public function countFilteredCompany($search, $start_date = null, $end_date = null) {
        if (!empty($search)) {
            $this->db->like('companyname', $search);
            $this->db->or_like('companytype', $search);
            $this->db->or_like('companyemail', $search);
        }
        if (!empty($start_date) && !empty($end_date)) {
            $this->db->where('Create_Date >=', $start_date);
            $this->db->where('Create_Date <=', $end_date);
        }
        return $this->db->count_all_results('companydetails'); 
    }
    public function insertdata($data) {
        $data = array(
            'companyname' => $data['companyname'],
            'companytype' => $data['companytype'],
            'companyemail' => $data['companyemail'],
           
        );
        $this->db->insert('companydetails', $data);
    }
    public function companyeditdata($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('companydetails');
        return $query->row_array();
    }
    public function editcompany($id, $data) {
        $data = array(
            'companyname' => $data['companyname'],
            'companytype' => $data['companytype'],
            'companyemail' => $data['companyemail'], 
        );
        $this->db->where('id', $id);
        $this->db->update('companydetails', $data);
    }
    public function Companydelete($id) {
        $this->db->where('id', $id);
        $this->db->delete('companydetails');
    }
    public function getAddressByCompanyId($company_id) {
 
        $this->db->select('*');
        $this->db->from('companyaddress');
        $this->db->where('company_id', $company_id);
        $query = $this->db->get();

        // Check if data is found
        if ($query->num_rows() > 0) {
            return $query->result_array();  // Return data as an array
        } else {
            return false;  // No data found
        }
    }
    public function saveAddresses($data){
        foreach ($data as $row) {
            if (!empty($row['id'])) {
                
                $this->db->where('id', $row['id']);
                $this->db->update('companyaddress', $row);
            } else {
                
                unset($row['id']); 
                $this->db->insert('companyaddress', $row);
            }
        }

        return true; 
    }
    
}


?>