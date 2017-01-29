<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Controller {
  public function __construct(){
    parent::__construct();
    $this->load->model('Admin_model');
  }
  //管理者登入介面
  public function login(){
    $this->load->helper('form');
    $this->load->library('form_validation');
    if(isset($this->session->username)){
      $url = site_url('admin');
      header("Location:$url");
    }
    $this->form_validation->set_rules('username', 'username', 'required');
    $this->form_validation->set_rules('password', 'password', 'required');
    if($this->form_validation->run()===FALSE){
      $data['title'] = "線上報修管理系統─登入介面";
      $this->load->view('auth/head',$data);
      $this->load->view('auth/login',$data);
    }else{
      $result = $this->Admin_model->Auth();
      $username = $result['uUsername'];
      $password = $result['uPassword'];
      if(!is_null($username) && !is_null($password)){
        $this->session->username = $username;
        $url = site_url('admin');
        header("Location:$url");
      }else{
        echo "<script type='text/javascript'>alert('你輸入的帳號或是密碼錯誤');window.history.go(-1);</script>";
      }
    }
  }
  public function index(){
    $data['usr_data'] = $this->Admin_model->get_data();
    $data['title'] = "管理員用戶管理系統";
    $data['add_url'] = site_url('admin/auth/add');
    $data['updateUsr_url'] = site_url('admin/auth/usr_update/');
    $data['updatePwd_url'] = site_url('admin/auth/pwd_update/');
    $data['delete_url'] = site_url('admin/auth/delete/');
    $this->load->view('auth/head',$data);
    $this->load->view('nav/admin_nav',$data);
    $this->load->view('auth/main',$data);
  }
  public function add(){
    if(empty($this->session->username)){
      $url = site_url('admin/Auth/login');
      header("Location:$url");
    }
    $this->load->helper('form');
    $this->load->library('form_validation');
    $this->form_validation->set_rules('username', 'username', 'required');
    $this->form_validation->set_rules('password', 'password', 'required');
    if($this->form_validation->run()==FALSE){
      $data['title'] = "管理者新增";
      $this->load->view('auth/head',$data);
      $this->load->view('nav/admin_nav',$data);
      $this->load->view('auth/add');
    }else{
      $this->Admin_model->add();
      $url = site_url('admin/auth');
      echo "<script type='text/javascript'>alert('操作已完成');window.location.href = '".$url."';</script>";
    }
  }
    public function delete($id = NULL){
      $this->load->helper('form');
      $this->load->library('form_validation');
      if(empty($this->session->username)){
        $url = site_url('admin/auth/login');
        header("Location:$url");
      }
      $data['target_data'] = $this->Admin_model->get_target_data($id);
      $this->form_validation->set_rules('id', 'id', 'required');
        if($this->form_validation->run()===FALSE){
          //檢查 id 是否為系統預設保留編號
          if($id == 1){
            $url = site_url('admin/auth');
            echo "<script type='text/javascript'>alert('此用戶受到系統保護！');window.location.href = '".$url."';</script>";
          }
          if(!is_null($id) && is_numeric($id)){
            $data['usr_data'] = $this->Admin_model->get_data();
            $data['title'] = "刪除管理者";
            $this->load->view('auth/head',$data);
            $this->load->view('nav/admin_nav',$data);
            $this->load->view('auth/delete',$data);
          }else{
            $url = site_url('admin/auth');
            echo "<script type='text/javascript'>window.location.href='".$url."';</script>";
          }
        }else{
          //防止 系統預設用戶 被刪除
          if($this->input->post('id') == 1){
            $url = site_url('admin/auth');
            echo "<script type='text/javascript'>alert('拒絕此操作！');window.location.href = '".$url."';</script>";
          }else{
            $this->Admin_model->delete();
            $url = site_url('admin/auth');
            echo "<script type='text/javascript'>alert('操作已完成');window.location.href = '".$url."';</script>";
          }
        }
    }

  public function update_username($id = NULL){
    if(empty($this->session->username)){
      $url = site_url('admin/Auth/login');
      header("Location:$url");
    }
    $this->form_validation->set_rules('id', 'id', 'required');
    $this->form_validation->set_rules('username', 'username', 'required');
    if($this->form_validation->run()===FALSE){
      if(!is_null($id)){
        $data['title'] = "管理者更改帳戶";
        $data['target_data'] = $this->Admin_model->get_target_data($id);
        $this->load->view('auth/head',$data);
        $this->load->view('nav/admin_nav',$data);
        $this->load->view('auth/updateusr',$data);
      }
    }else{
      $result = $this->Admin_model->update_usr();
      if($result){
        $url = site_url('admin/auth');
        echo "<script type='text/javascript'>alert('操作已完成');window.location.href = '".$url."';</script>";
      }
    }
  }
  public function update_password($id = NULL){
    if(empty($this->session->username)){
      $url = site_url('admin/Auth/login');
      header("Location:$url");
    }
    $this->form_validation->set_rules('id', 'id', 'required');
    $this->form_validation->set_rules('password', 'password', 'required');
    if(empty($this->session->username)){
      $url = site_url('admin/Auth/login');
      header("Location:$url");
    }
    if($this->form_validation->run()===FALSE){
      $data['title'] = "管理者修改密碼";
      $data['target_data'] = $this->Admin_model->get_target_data($id);
      $this->load->view('auth/head',$data);
      $this->load->view('nav/admin_nav',$data);
      $this->load->view('auth/updatepwd',$data);
    }else{
      $this->Admin_model->update_pwd();
      $url = site_url('admin/auth');
      echo "<script type='text/javascript'>alert('操作已完成');window.location.href = '".$url."';</script>";
    }
  }
  //管理者登出介面
  public function logout(){
    $this->session->sess_destroy();
    $url = site_url('admin/auth/login');
    echo "<script type='text/javascript'>alert('你已經登出成功');window.location.href = '".$url."';</script>";
  }
}
