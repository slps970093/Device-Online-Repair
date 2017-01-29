<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_model extends CI_Model {

  /*
   *
   * 注意:密碼使用SHA256加密
   */
  public function __construct(){
      $this->load->database();
  }
  public function add()
  {
    $data = array(
      'uUsername' => $this->input->post('username'),
      'uPassword' => hash('sha256',$this->input->post('password'))
    );
    if($this->db->insert('admin',$data)){
      return true;
    }else{
      return false;
    }
  }
  public function get_data(){
    $query = $this->db->get('admin');
    return $query->result_array();
  }
  public function get_target_data($id){
    $query = $this->db->get_where('admin',array('uid'=>$id));
    return $query->row_array();
  }
  public function Auth(){
    $this->db->select('uUsername,uPassword');
    $this->db->from('admin');
    $this->db->where('uUsername',$this->input->post('username'));
    $this->db->where('uPassword',hash('sha256',$this->input->post('password')));
    $query = $this->db->get();
    return $query->row_array();

  }
  public function delete(){
    if($this->db->delete('admin',array('uid'=>$this->input->post('id')))){
      return true;
    }else{
      return false;
    }
  }
  public function update_usr(){
    //$sql="UPDATE `admin` SET `uUsername`='".$this->input->post('username')."' WHERE ".$this->input->post('id');

    $this->db->where('uid', $this->input->post('id'));
    $data = array(
      'uUsername' => $this->input->post('username')
    );
    $result = $this->db->update('admin', $data);
    if($result){
      return TRUE;
    }else{
      return false;
    }
  }
  public function update_pwd(){
    /*
    $sql="UPDATE `admin` SET `uPassword`='".hash('sha256',$this->input->post('password'))."' WHERE ".$this->input->post('id');
    $query = $this->db->query($sql);
    */
    $this->db->where('uid', $this->input->post('id'));
    $data = array(
      'uPassword' => hash('sha256',$this->input->post('password'))
    );
    $result = $this->db->update('admin', $data);
    if($result){
      return true;
    }else{
      return false;
    }
  }
}
