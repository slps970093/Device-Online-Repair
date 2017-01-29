<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Device_repair_Model extends CI_Model {
  public function get_data(){
    $this->db->select('device_repair.id,device_repair.location,device_repair.add_datetime,device_repair.remark,device_repair.description,device_name.dn_name,device_category.dc_name,fault_category.fc_name,repair_status.StatusName');
    $this->db->from('device_repair');
    $this->db->join('fault_category', 'device_repair.fault_category = fault_category.id', 'INNER');
    $this->db->join('device_name', 'device_name.id = device_repair.device_name', 'INNER');
    $this->db->join('device_category', 'device_category.id = device_repair.device_category', 'INNER');
    $this->db->join('repair_status', 'repair_status.id = device_repair.is_status', 'INNER');
    $this->db->order_by('device_repair.id', 'DESC');
    $result = $this->db->get();
    return $result->result_array();
  }
  public function add(){
    $data = array(
      'id' => NULL,
      'device_category' => $this->input->post('category'),
      'device_name' => $this->input->post('name'),
      'fault_category' => $this->input->post('fault'),
      'location' => $this->input->post('location'),
      'add_datetime' => date('Y-m-d H:i:s'),
      'is_status' => 1,
      'remark' => $this->input->post('remark'),
      'description' => NULL
    );
    $result = $this->db->insert('device_repair', $data);
    if($result){
      return true;
    }
    return false;
  }
  public function update(){
    $data = array(
      'device_category' => $this->input->post('category'),
      'device_name' => $this->input->post('name'),
      'fault_category' => $this->input->post('fault'),
      'location' => $this->input->post('location'),
      'add_datetime' => $this->input->post('datetime'),
      'is_status' => $this->input->post('status'),
      'remark' => $this->input->post('remark'),
      'description' => $this->input->post('description')
    );
    $this->db->where('id', $this->input->post('id'));
    $result = $this->db->update('device_repair', $data);
    if($result){
      return true;
    }
    return false;
  }
  public function delete(){
    $result = $this->db->delete('device_repair', array('id' => $this->input->post('id')));
    if($result){
      return true;
    }
    return false;
  }
  public function get_target_join_data($id){
    $this->db->select('device_repair.id,device_repair.device_category,device_repair.device_name,device_repair.fault_category,device_repair.location,'.
    'device_repair.add_datetime,device_repair.remark,device_repair.is_status,device_repair.description,fault_category.fc_name,device_name.dn_name,'.
    'device_category.dc_name,repair_status.StatusName');
    $this->db->from('device_repair');
    $this->db->where('device_repair.id', $id);
    $this->db->join('fault_category', 'device_repair.fault_category = fault_category.id', 'INNER');
    $this->db->join('device_name', 'device_name.id = device_repair.device_name', 'INNER');
    $this->db->join('device_category', 'device_category.id = device_repair.device_category', 'INNER');
    $this->db->join('repair_status', 'repair_status.id = device_repair.is_status', 'INNER');
    $result = $this->db->get();
    return $result->row_array();
  }
  public function get_target_data($id){
    $result = $this->db->get_where('device_repair',array('id' => $id));
    return $result->row_array();
  }
}
