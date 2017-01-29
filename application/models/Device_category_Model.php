<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class device_category_Model extends CI_Model {
  public function get_target_data($id){
    $result = $this->db->get_where('device_category',array('id' => $id));
    return $result->row_array();
  }
  public function get_data(){
    $result = $this->db->get('device_category');
    return $result->result_array();
  }
  public function add(){
    $data = array(
      'id' => NULL,
      'dc_name' => $this->input->post('name')
    );
    $result = $this->db->insert('device_category', $data);
    if($result){
      return true;
    }
    return false;
  }
  public function update(){
    $data = array(
      'dc_name' => $this->input->post('name')
    );
    $this->db->where('id', $this->input->post('id'));
    $result = $this->db->update('device_category', $data);
    if($result){
      return true;
    }
    return false;
  }
  public function delete(){
    $result = $this->db->delete('device_category', array('id' => $this->input->post('id')));
    if($result){
      return true;
    }
    return false;
  }


}
