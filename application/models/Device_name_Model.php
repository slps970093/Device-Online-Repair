<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class device_name_Model extends CI_Model {
  public function get_data(){
    $result = $this->db->get('device_name');
    return $result->result_array();
  }
  public function get_target_data($id){
    $result = $this->db->get_where('device_name',array('id' => $id));
    return $result->row_array();
  }
  public function add(){
    $data = array(
      'id' => NULL,
      'dn_name' => $this->input->post('name')
    );
    $result = $this->db->insert('device_name', $data);
    if($result){
      return true;
    }
    return false;
  }
  public function update(){
    $data = array(
      'dn_name' => $this->input->post('name')
    );
    $this->db->where('id', $this->input->post('id'));
    $result = $this->db->update('device_name', $data);
    if($result){
      return true;
    }
    return false;
  }
  public function delete(){
    $result = $this->db->delete('device_name', array('id' => $this->input->post('id')));
    if($result){
      return true;
    }
    return false;
  }
}
