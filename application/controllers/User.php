<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function index()
	{
		$res['brand'] = $this->User_model->get_all('brand');
		$this->load->view('home',$res);
	}
	public function product($condi)
	{
		$cond = array('brand'=>$condi);
		$res['prod'] = $this->User_model->get_result('product',$cond);
		$this->load->view('product',$res);
	}
	public function product_detail($condi)
	{
		$cond = array('id'=>$condi);
		$res['prod'] = $this->User_model->get_row('product',$cond);
		$this->load->view('product_detail',$res);
	}
	public function sign_up(){
		$curr_date = date('Y-m-d h:i:s', time());
		$data = array('name' => $_POST['name'],
		'phone' => $_POST['phone'],
		'email' => $_POST['email'],
		'password' => $_POST['pass'],
		'status' => 1,
		'date_time' => $curr_date);
		$exist = $this->User_model->get_row('users',array('email'=>$_POST['email']));
		if ($exist) {
			header('Location: http://localhost/mobi/index.php/User');			
		}
		else{
			$data = array('name' => $_POST['name'],
		'email' => $_POST['email'],
		'password' => $_POST['pass']);
			$this->User_model->add('users',$data);
			$this->session->set_userdata($data);
			header('Location: http://localhost/mobi/index.php/User');
		}
	}
	public function login(){
		$email = $_POST['email'];
		$pass = $_POST['pass'];
		$res = $this->User_model->get_row('users',array('email'=>$email,'password'=>$pass,'status'=>1));
		$data = array('email'=>$email,'password'=>$pass,'name'=> $res->name);
		if ($res) {
			$this->session->set_userdata($data);
			header('Location: http://localhost/mobi/index.php/User');			
		}
		else{
			header('Location: http://localhost/mobi/index.php/User');
		}
	}
	public function logout()
	{
		$this->session->unset_userdata($_SESSION['name']);
		header('Location: http://localhost/mobi/index.php/User');		
	}
}
