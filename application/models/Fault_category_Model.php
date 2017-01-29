<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class fault_category_Model extends CI_Model {
  public function get_data(){
    $result = $this->db->get('fault_category');
    return $result->result_array();
  }
  public function add(){
    $data = array(
      'id' => NULL,
      'fc_name' => $this->input->post('name')
    );
    $result = $this->db->insert('fault_category', $data);
    if($result){
      return true;
    }
    return false;
  }
  public function get_target_data($id){
    $result = $this->db->get_where('fault_category',array('id' => $id));
    return $result->row_array();
  }
  public function update(){
    $data = array(
      'fc_name' => $this->input->post('name')
    );
    $this->db->where('id', $this->input->post('id'));
    $result = $this->db->update('fault_category', $data);
    if($result){
      return true;
    }
    return false;
  }
  public function delete(){
    $result = $this->db->delete('fault_category', array('id' => $this->input->post('id')));
    if($result){
      return true;
    }
    return false;
  }
}
