<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Device_category extends CI_Controller {
  public function admin_index(){
    if(empty($this->session->username)){
      $url = site_url('admin/auth/login');
      header("Location:$url");
    }
    $data['title'] = "設備分類管理";
    $data['result'] = $this->Device_category_Model->get_data();
    $this->load->view('device_category/head',$data);
    $this->load->view('nav/admin_nav');
    $this->load->view('device_category/admin_main',$data);
  }
  public function add(){
    if(empty($this->session->username)){
      $url = site_url('admin/auth/login');
      header("Location:$url");
    }
    $data['title'] = "設備分類新增";
    $this->form_validation->set_rules('name', 'name', 'required');
    if($this->form_validation->run()===FALSE){
      $this->load->view('device_category/head',$data);
      $this->load->view('nav/admin_nav');
      $this->load->view('device_category/add',$data);
    }else{
      $result = $this->Device_category_Model->add();
      if($result){
        echo "<script type='text/javascript'>alert('資料已經成功新增！'); window.location='".site_url('admin/device/category')."?success';</script>";
      }else{
        echo "<script type='text/javascript'>alert('資料刪除失敗！'); window.location='".site_url('admin/device/category')."?failed'</script>";
      }
    }
  }
  public function update($id=NULL){
    if(empty($this->session->username)){
      $url = site_url('admin/auth/login');
      header("Location:$url");
    }
    $data['title'] = "設備分類修改";
    $data['result'] = $this->Device_category_Model->get_target_data($id);
    $this->form_validation->set_rules('id', 'id', 'required');
    $this->form_validation->set_rules('name', 'name', 'required');
    if($this->form_validation->run()===FALSE){
      $this->load->view('device_category/head',$data);
      $this->load->view('nav/admin_nav');
      $this->load->view('device_category/update',$data);
    }else{
      $result = $this->Device_category_Model->update();
      if($result){
        echo "<script type='text/javascript'>alert('資料已經成功新增！'); window.location='".site_url('admin/device/category')."?success';</script>";
      }else{
        echo "<script type='text/javascript'>alert('資料刪除失敗！'); window.location='".site_url('admin/device/category')."?failed'</script>";
      }
    }

  }
  public function delete($id=NULL){
    if(empty($this->session->username)){
      $url = site_url('admin/auth/login');
      header("Location:$url");
    }
    $data['title'] = "設備分類刪除";
    $data['result'] = $this->Device_category_Model->get_target_data($id);
    $this->form_validation->set_rules('id', 'id', 'required');
    if($this->form_validation->run()===FALSE){
      $this->load->view('device_category/head',$data);
      $this->load->view('nav/admin_nav');
      $this->load->view('device_category/delete',$data);
    }else{
      $result = $this->Device_category_Model->delete();
      if($result){
        echo "<script type='text/javascript'>alert('資料已經成功新增！'); window.location='".site_url('admin/device/category')."?success';</script>";
      }else{
        echo "<script type='text/javascript'>alert('資料刪除失敗！'); window.location='".site_url('admin/device/category')."?failed'</script>";
      }
    }
  }
}
