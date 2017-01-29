<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
  }

  function index()
  {
    if(empty($this->session->username)){
      $url = site_url('admin/Auth/login');
      header("Location:$url");
    }
    $data['title'] = "Welcome!!";
    $this->load->view('device_name/head',$data);
    $this->load->view('nav/admin_nav');
  }

}
