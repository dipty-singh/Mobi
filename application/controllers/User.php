<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function RandomString($length)
	{
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    $charactersLength = strlen($characters);
	    $randomString = '';
	    for ($i = 0; $i < $length; $i++) {
	        $randomString .= $characters[rand(0, $charactersLength - 1)];
	    }
	    return $randomString;
	}

	public function index()
	{
		$res['brand'] = $this->User_model->get_all('brand');
		$this->load->view('home',$res);
	}

	public function booking(){
		if ($_SESSION['id']) {
			$book_id = $this->RandomString(10);
			$prod_id = $_POST['prod_id'];
			$data = array('booking_user_id'=>$_SESSION['id'],
						'book_id'=>$book_id,
						'booking_product_id'=>$prod_id,
						'status'=>'pending',
						'booking_address'=>$_POST['address'],
						'is_cart'=>2);
			$cond = array('booking_user_id'=>$_SESSION['id'],
						'booking_product_id'=>$prod_id,
						'is_cart'=>2);
			$cond1 = array('booking_user_id'=>$_SESSION['id'],
						'booking_product_id'=>$prod_id);
			$exist = $this->User_model->get_row('booking',$cond);
			if ($exist) {
				$response['success'] = false;
				$response['msg'] = "Already Booked";
			}
			else
			{
				$exist1 = $this->User_model->get_row('cart',$cond1);
				if ($exist1) {
					$this->User_model->delete('cart',$cond1);
				}
				$res = $this->User_model->add('booking',$data);			
				$response['success'] = true;
				$response['id'] = $book_id;
				$response['msg'] = "Successfully Booked";
			}
		}
		else{
			$response['success'] = false;
			$response['msg'] = "Please login";
		}
		echo json_encode($response);
	}

	public function add_cart()
	{
		if ($_SESSION['id']) {
			$prod_id = $_POST['prod_id'];
			$data = array('booking_user_id'=>$_SESSION['id'],
						'booking_product_id'=>$prod_id);
			$cond = array('booking_user_id'=>$_SESSION['id'],
						'booking_product_id'=>$prod_id);
			$cond1 = array('booking_user_id'=>$_SESSION['id'],
						'booking_product_id'=>$prod_id,
						'status'=>'pending');
			$exist = $this->User_model->get_row('cart',$cond);
			$exist1 = $this->User_model->get_row('booking',$cond1);
			if ($exist) {
				$response['success'] = false;
				$response['msg'] = "Already in cart";
			}
			else if ($exist1) {
				$response['success'] = false;
				$response['msg'] = "Already Booked";
			}
			else
			{
				$res = $this->User_model->add('cart',$data);			
				$response['success'] = true;
				$response['msg'] = "Successfully Added";
			}
		}
		else{
			$response['success'] = false;
			$response['msg'] = "Please login";
		}
		echo json_encode($response);
	}

	public function pay($book_id){
		$res['book'] = $book_id;
		$this->load->view('pay',$res);
	}

	public function pay_now(){
		if ($_SESSION['id']) {
			$data1 = array(
				'card_number'=>$_POST['card_num'],
				'cvv_number'=>$_POST['card_cvv'],
				'acc_holder_name'=>$_POST['card_name'],
				'expiry_month'=>$_POST['card_month'],
				'expiry_year'=>$_POST['card_year'],
				'user_id'=>$_SESSION['id'],
				'type'=>$_POST['card_type']);
			$data2 = array('status'=>'complete');
			$cond = array('book_id'=>$_POST['book_id']);
			$card = $this->User_model->add('user_card',$data1);
			$book = $this->User_model->update('booking',$data2,$cond);
			if ($card && $book) {
				$response['success'] = true;
				$response['msg'] = 'Successfully Booked';
			}
			else {
				$response['success'] = false;
				$response['msg'] = 'Booking not exist';
			}
		}
		else{
			$response['success'] = false;
			$response['msg'] = "Please login";
		}
		echo json_encode($response);
	}

	public function booking_cart(){
		if ($_SESSION['id']) {
			$book_id = $this->RandomString(10);
			$prod_id = $_POST['prod_id'];
			if (strpos($prod_id, ',')) {
			$prod_id = explode(',', $_POST['prod_id']);
				foreach ($prod_id as $key => $value) {
					$data = array('booking_user_id'=>$_SESSION['id'],
								'book_id'=>$book_id,
								'booking_product_id'=>$key,
								'status'=>'pending',
								'booking_address'=>$_POST['address'],
								'is_cart'=>2);
					$cond = array('booking_user_id'=>$_SESSION['id'],
								'booking_product_id'=>$prod_id,
								'is_cart'=>2);
					$cond1 = array('booking_user_id'=>$_SESSION['id'],
								'booking_product_id'=>$prod_id);
					$exist = $this->User_model->get_row('booking',$cond);
					if ($exist) {
						$response['success'] = false;
						$response['msg'] = "Already Booked";
					}
					else
					{
						$exist1 = $this->User_model->get_row('cart',$cond1);
						if ($exist1) {
							$this->User_model->delete('cart',$cond1);
						}
						$res = $this->User_model->add('booking',$data);			
						$response['success'] = true;
						$response['id'] = $book_id;
						$response['msg'] = "Successfully Booked";
					}					
				}
			}
			else{
				$data = array('booking_user_id'=>$_SESSION['id'],
							'book_id'=>$book_id,
							'booking_product_id'=>$prod_id,
							'status'=>'pending',
							'booking_address'=>$_POST['address'],
							'is_cart'=>2);
				$cond = array('booking_user_id'=>$_SESSION['id'],
							'booking_product_id'=>$prod_id,
							'is_cart'=>2);
				$cond1 = array('booking_user_id'=>$_SESSION['id'],
							'booking_product_id'=>$prod_id);
				$exist = $this->User_model->get_row('booking',$cond);
				if ($exist) {
					$response['success'] = false;
					$response['msg'] = "Already Booked";
				}
				else
				{
					$exist1 = $this->User_model->get_row('cart',$cond1);
					if ($exist1) {
						$this->User_model->delete('cart',$cond1);
					}
					$res = $this->User_model->add('booking',$data);			
					$response['success'] = true;
					$response['id'] = $book_id;
					$response['msg'] = "Successfully Booked";
				}
			}
		}
		else{
			$response['success'] = false;
			$response['msg'] = "Please login";
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

	public function remove_cart()
	{
		$this->User_model->delete('cart',array('cart_id'=>$_POST['prod_id']));
				$response['success'] = true;
				echo json_encode($response);
	}

	public function logout()
	{
		$this->load->library('session');
		unset($_SESSION['name']);
		header('Location: http://localhost/mobi/index.php/User');
	}

	public function cart(){
		$cond = $_SESSION['id'];
		$res['cart'] = $this->User_model->get_cart('cart',$cond);
		$this->load->view('cart',$res);
	}
}
