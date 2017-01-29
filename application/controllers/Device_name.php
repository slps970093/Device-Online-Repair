<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Device_name extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
  }
  public function admin_index(){
    if(empty($this->session->username)){
      $url = site_url('admin/auth/login');
      header("Location:$url");
    }
    $data['title'] = "裝置名稱管理";
    $data['result'] = $this->Device_name_Model->get_data();
    $this->load->view('device_name/head',$data);
    $this->load->view('nav/admin_nav');
    $this->load->view('device_name/admin_main',$data);
  }
  public function add(){
    if(empty($this->session->username)){
      $url = site_url('admin/auth/login');
      header("Location:$url");
    }
    $data['title'] = "裝置名稱新增";
    $this->form_validation->set_rules('name', 'name', 'required');
    if($this->form_validation->run()===FALSE){
      $this->load->view('device_name/head',$data);
      $this->load->view('nav/admin_nav');
      $this->load->view('device_name/add',$data);
    }else{
      $result = $this->Device_name_Model->add();
      if($result){
        echo "<script type='text/javascript'>alert('資料已經成功新增！'); window.location.href='".site_url('admin/device/name')."?success';</script>";
      }else{
        echo "<script type='text/javascript'>alert('資料刪除失敗！'); window.location.href='".site_url('admin/device/name')."?failed'</script>";
      }
    }
  }
  public function update($id=NULL){
    if(empty($this->session->username)){
      $url = site_url('admin/auth/login');
      header("Location:$url");
    }
    $data['title'] = "裝置名稱更新";
    $data['result'] = $this->Device_name_Model->get_target_data($id);
    $this->form_validation->set_rules('id', 'id', 'required');
    $this->form_validation->set_rules('name', 'name', 'required');
    if($this->form_validation->run()===FALSE){
      $this->load->view('device_name/head',$data);
      $this->load->view('nav/admin_nav');
      $this->load->view('device_name/update',$data);
    }else{
      $result = $this->Device_name_Model->update();
      if($result){
        echo "<script type='text/javascript'>alert('資料已經成功新增！'); window.location.href='".site_url('admin/device/name')."?success';</script>";
      }else{
        echo "<script type='text/javascript'>alert('資料刪除失敗！'); window.location.href='".site_url('admin/device/name')."?failed'</script>";
      }
    }

  }
  public function delete($id=NULL){
    if(empty($this->session->username)){
      $url = site_url('admin/auth/login');
      header("Location:$url");
    }
    $data['title'] = "裝置名稱刪除";
    $data['result'] = $this->Device_name_Model->get_target_data($id);
    $this->form_validation->set_rules('id', 'id', 'required');
    if($this->form_validation->run()===FALSE){
      $this->load->view('device_name/head',$data);
      $this->load->view('nav/admin_nav');
      $this->load->view('device_name/delete',$data);
    }else{
      $result = $this->Device_name_Model->delete();
      if($result){
        echo "<script type='text/javascript'>alert('資料已經成功新增！'); window.location.href='".site_url('admin/device/name')."?success';</script>";
      }else{
        echo "<script type='text/javascript'>alert('資料刪除失敗！'); window.location.href='".site_url('admin/device/name')."?failed'</script>";
      }
    }
  }
}
