<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Status_model extends CI_Model {
  public function add(){
    $data = array(
      'id' => NULL,
      'StatusName' => $this->input->post('name')
    );
    $result = $this->db->insert('repair_status', $data);
    if($result){
      return true;
    }else{
      return false;
    }
  }
  public function get_data(){
    $result = $this->db->get('repair_status');
    return $result->result_array();
  }
  public function get_target_data($id){
    $result = $this->db->get_where('repair_status',array('id' => $id));
    return $result->row_array();
  }
  public function update(){
    $data = array(
      'StatusName' => $this->input->post('name')
    );
    $this->db->where('id', $this->input->post('id'));
    $result = $this->db->update('repair_status', $data);
    if($result){
      return true;
    }else{
      return false;
    }
  }
  public function delete(){
    $result = $this->db->delete('repair_status', array('id'=>$this->input->post('id')));
    if($result){
      return true;
    }else{
      return false;
    }
  }
}
