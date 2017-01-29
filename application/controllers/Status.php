<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Status extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
  }
  public function admin_index(){
    if(empty($this->session->username)){
      $url = site_url('admin/auth/login');
      header("Location:$url");
    }
    $data['title'] = "狀態管理界面";
    $data['result'] = $this->Status_model->get_data();
    $this->load->view('status/head',$data);
    $this->load->view('nav/admin_nav');
    $this->load->view('status/admin_main',$data);
  }
  public function add(){
    if(empty($this->session->username)){
      $url = site_url('admin/auth/login');
      header("Location:$url");
    }
    $this->form_validation->set_rules('name', 'nane', 'required');
    if($this->form_validation->run()===FALSE){
      $data['title'] = "新增狀態";
      $this->load->view('status/head',$data);
      $this->load->view('nav/admin_nav');
      $this->load->view('status/add',$data);
    }else{
      $result = $this->Status_model->add();
      if($result){
        echo "<script type='text/javascript'>alert('資料已經成功新增！'); window.location='".site_url('admin/device/repair/status')."?success';</script>";
      }else{
        echo "<script type='text/javascript'>alert('資料刪除失敗！'); window.location='".site_url('admin/device/repair/status')."?failed'</script>";
      }
    }
  }
  public function update($id = NULL){
    if(empty($this->session->username)){
      $url = site_url('admin/auth/login');
      header("Location:$url");
    }
    $this->form_validation->set_rules('id', 'id', 'required');
    $this->form_validation->set_rules('name', 'nane', 'required');
    if($this->form_validation->run()===FALSE){
      $data['title'] = "修改狀態";
      $data['result'] = $this->Status_model->get_target_data($id);
      $this->load->view('status/head',$data);
      $this->load->view('nav/admin_nav');
      $this->load->view('status/update',$data);
    }else{
      $result = $this->Status_model->update();
      if($result){
        echo "<script type='text/javascript'>alert('資料已經成功新增！'); window.location='".site_url('admin/device/repair/status')."?success';</script>";
      }else{
        echo "<script type='text/javascript'>alert('資料刪除失敗！'); window.location='".site_url('admin/device/repair/status')."?failed'</script>";
      }
    }
  }
  public function delete($id = NULL){
    if(empty($this->session->username)){
      $url = site_url('admin/auth/login');
      header("Location:$url");
    }
    $this->form_validation->set_rules('id', 'id', 'required');
    if($this->form_validation->run() === FALSE){
      if($id == 1){
        echo "<script type='text/javascript'>alert('此資料受到系統保護！'); window.location='".site_url('admin/device/repair/status')."'</script>";
      }

      $data['title'] = "刪除狀態";
      $data['result'] = $this->Status_model->get_target_data($id);
      $this->load->view('status/head',$data);
      $this->load->view('nav/admin_nav');
      $this->load->view('status/delete',$data);
    }else{
      $result = $this->Status_model->delete();
      if($result){
        echo "<script type='text/javascript'>alert('資料已經成功新增！'); window.location='".site_url('admin/device/repair/status')."?success';</script>";
      }else{
        echo "<script type='text/javascript'>alert('資料刪除失敗！'); window.location='".site_url('admin/device/repair/status')."?failed'</script>";
      }
    }
  }

}
