<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function index()
	{
		$res['brand'] = $this->User_model->get_all('brand');
		$this->load->view('home',$res);
	}
	public function booking(){
		$prod_id = $_POST['prod_id'];
		$data = array('booking_user_id'=>$_SESSION['id'],
					'booking_product_id'=>$prod_id,
					'status'=>'pending',
					'booking_address'=>$_POST['address']);
		$cond = array('booking_user_id'=>$_SESSION['id'],
					'booking_product_id'=>$prod_id);
		$exist = $this->User_model->get_row('booking',$cond);
		if ($exist) {
			$response['success'] = false;
			$response['msg'] = "Already Booked";			
		}
		else
		{
			$res = $this->User_model->add('booking',$data);			
			$response['success'] = true;
			$response['msg'] = "Successfully Booked";
		}
		echo json_encode($response);
	}
	public function product($condi)
	{
		$cond = array('brand'=>$condi);
		$res['prod'] = $this->User_model->get_result('product',$cond);
		$this->load->view('product',$res);
	}
	public function product_detail($condi)
	{
		$res['prod'] = $this->User_model->get_product($condi);
		$this->load->view('product_detail',$res);
	}
	public function sign_up(){
		$curr_date = date('Y-m-d h:i:s', time());
		$data = array('name' => $_POST['name'],
		'phone' => $_POST['phone'],
		'email' => $_POST['email'],
		'password' => $_POST['pass'],
		'status' => 'active',
		'date_time' => $curr_date);
		$exist = $this->User_model->get_row('users',array('email'=>$_POST['email']));
		if ($exist) {
			$response['success'] = false;
			$response['msg'] = "User Already Exists";
		}
		else{
			$this->User_model->add('users',$data);
			$res_ses = $this->User_model->get_row('users',array('email'=>$_POST['email']));
			$data1 = array('name' => $res_ses->name,
						  'email' => $res_ses->email,
						  'password' => $res_ses->password,
						  'id' => $res_ses->id);
			$this->session->set_userdata($data1);
			$response['success'] = true;
			$response['msg'] = $data;
		}
		echo json_encode($response);
	}
	public function login(){
		$email = $_POST['email'];
		$pass = $_POST['pass'];
		$res = $this->User_model->get_row('users',array('email'=>$email,'password'=>$pass));
		if ($res) {
			if ($res->status=='active') {
				$data = array('email'=>$email,'password'=>$pass,'name'=> $res->name, 'id' => $res->id);
				$this->session->set_userdata($data);
				$response['success'] = true;
				$response['msg'] = $data;
			}
			else{
				$response['success'] = false;
				$response['msg'] = "User Removed from our site";
			}
		}
		else{
			$response['success'] = false;
			$response['msg'] = 'Wrong Login Credentials';
		}
			echo json_encode($response);
	}
	public function logout()
	{
		$this->load->library('session');
		unset($_SESSION['name']);
		header('Location: http://localhost/mobi/index.php/User');
	}
}
