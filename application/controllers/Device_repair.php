<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Device_repair extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
  }
  public function admin_index(){
    if(empty($this->session->username)){
      $url = site_url('admin/auth/login');
      header("Location:$url");
    }
    $data['title'] = "裝置報修管理介面";
    $data['result'] = $this->Device_repair_Model->get_data();
    $this->load->view('repair/head',$data);
    $this->load->view('nav/admin_nav');
    $this->load->view('repair/admin_main',$data);
  }
  public function add(){
    if(empty($this->session->username)){
      $url = site_url('admin/auth/login');
      header("Location:$url");
    }
    $data['title'] = "線上報修";
    $data['device_category_lst'] = $this->Device_category_Model->get_data();
    $data['device_name_lst'] = $this->Device_name_Model->get_data();
    $data['fault_category_lst'] = $this->Fault_category_Model->get_data();
    $this->form_validation->set_rules('category', 'category', 'required');
    $this->form_validation->set_rules('name', 'name', 'required');
    $this->form_validation->set_rules('location', 'location', 'required');
    $this->form_validation->set_rules('fault', 'fault', 'required');
    $this->form_validation->set_rules('remark', 'remark', 'required');
    if($this->form_validation->run()===FALSE){
      $this->load->view('repair/head',$data);
      $this->load->view('nav/admin_nav');
      $this->load->view('repair/add');
    }else{
      $result = $this->Device_repair_Model->add();
      if($result){
        echo "<script type='text/javascript'>alert('資料已經成功新增！'); window.location.href='".site_url('admin/device/repair')."?success';</script>";
      }else{
        echo "<script type='text/javascript'>alert('資料刪除失敗！'); window.location.href='".site_url('admin/device/repair')."?failed'</script>";
      }
    }
  }
  public function guest_add(){
    $data['title'] = "設備線上報修通報系統";
    $data['device_category_lst'] = $this->Device_category_Model->get_data();
    $data['device_name_lst'] = $this->Device_name_Model->get_data();
    $data['fault_category_lst'] = $this->Fault_category_Model->get_data();
    $this->form_validation->set_rules('category', 'category', 'required');
    $this->form_validation->set_rules('name', 'name', 'required');
    $this->form_validation->set_rules('location', 'location', 'required');
    $this->form_validation->set_rules('fault', 'fault', 'required');
    $this->form_validation->set_rules('remark', 'remark', 'required');
    if($this->form_validation->run()===FALSE){
      $this->load->view('repair/head',$data);
      $this->load->view('nav/usr_nav');
      $this->load->view('repair/usr_add');
    }else{
      $result = $this->Device_repair_Model->add();
      if($result){
        echo "<script type='text/javascript'>alert('資料已經成功新增！'); window.location.href='".site_url('device/repair')."?success';</script>";
      }else{
        echo "<script type='text/javascript'>alert('資料刪除失敗！'); window.location.href='".site_url('device/repair')."?failed'</script>";
      }
    }
  }
  public function view($id){
    if(empty($this->session->username)){
      $url = site_url('admin/auth/login');
      header("Location:$url");
    }
    $data['result'] = $this->Device_repair_Model->get_target_join_data($id);
    $this->load->view('repair/head',$data);
    $this->load->view('nav/admin_nav');
    $this->load->view('repair/view',$data);
  }
  public function update($id=NULL){
    if(empty($this->session->username)){
      $url = site_url('admin/auth/login');
      header("Location:$url");
    }
    $data['title'] = "線上報修";
    $data['device_category_lst'] = $this->Device_category_Model->get_data();
    $data['device_name_lst'] = $this->Device_name_Model->get_data();
    $data['fault_category_lst'] = $this->Fault_category_Model->get_data();
    $data['result'] = $this->Device_repair_Model->get_target_data($id);
    $data['repair_status_lst'] = $this->Status_model->get_data();
    $this->form_validation->set_rules('id', 'id', 'required');
    $this->form_validation->set_rules('category', 'category', 'required');
    $this->form_validation->set_rules('name', 'name', 'required');
    $this->form_validation->set_rules('location', 'location', 'required');
    $this->form_validation->set_rules('fault', 'fault', 'required');
    $this->form_validation->set_rules('remark', 'remark', 'required');
    if($this->form_validation->run()===FALSE){
      $this->load->view('repair/head',$data);
      $this->load->view('nav/admin_nav');
      $this->load->view('repair/update',$data);
    }else{
      $result = $this->Device_repair_Model->update();
      if($result){
        echo "<script type='text/javascript'>alert('資料已經成功新增！'); window.location.href='".site_url('admin/device/repair')."?success';</script>";
      }else{
        echo "<script type='text/javascript'>alert('資料刪除失敗！'); window.location.href='".site_url('admin/device/repair')."?failed'</script>";
      }
    }
  }
  public function delete($id=NULL){
    if(empty($this->session->username)){
      $url = site_url('admin/auth/login');
      header("Location:$url");
    }
    $this->form_validation->set_rules('id', 'id', 'required');
    $data['title'] = "線上報修";
    $data['device_category_lst'] = $this->Device_category_Model->get_data();
    $data['device_name_lst'] = $this->Device_name_Model->get_data();
    $data['fault_category_lst'] = $this->Fault_category_Model->get_data();
    $data['result'] = $this->Device_repair_Model->get_target_join_data($id);
    if($this->form_validation->run()===FALSE){
      $this->load->view('repair/head',$data);
      $this->load->view('nav/admin_nav');
      $this->load->view('repair/delete',$data);
    }else{
      $result = $this->Device_repair_Model->delete();
      if($result){
        echo "<script type='text/javascript'>alert('資料已經成功新增！'); window.location.href='".site_url('admin/device/repair')."?success';</script>";
      }else{
        echo "<script type='text/javascript'>alert('資料刪除失敗！'); window.location.href='".site_url('admin/device/repair')."?failed'</script>";
      }
    }
  }
  public function show_repair_status(){
    $data['title'] = "顯示通報設備維修狀態";
    $data['result'] = $this->Device_repair_Model->get_data();
    $this->load->view('repair/head',$data);
    $this->load->view('nav/usr_nav');
    $this->load->view('repair/showusrrepair',$data);
  }
}
