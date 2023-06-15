<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	function __construct() {
        parent::__construct();
//        $this->load->helper(array());
$this->load->helper('form');
$this->load->helper('security');
        $this->load->library(array('session'));
		$this->load->model('user_model');

    }
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('home');
	}

	function registerNow()
	{

		if($_SERVER['REQUEST_METHOD']=='POST')
		{
			$this->form_validation->set_rules('username','User Name','required');
			$this->form_validation->set_rules('email','Email','required');
			$this->form_validation->set_rules('usertype','User Type','required');
			$this->form_validation->set_rules('password','Password','required');

			if($this->form_validation->run()==TRUE)
			{
				$username = $this->input->post('username');
				$email = $this->input->post('email');
				$usertype = $this->input->post('usertype');
				$password = $this->input->post('password');

				$data = array(
					'username'=>$username,
					'email'=>$email,
					'usertype'=>$usertype,
					'password'=>sha1($password),
					'status'=>'1'
				);

				$this->load->model('user_model');
				$this->user_model->insertuser($data);
				$this->session->set_flashdata('success','Successfully User Created');
				redirect(base_url('welcome/index'));
			}
		}
	}

	function login()
	{
		$this->load->view('login');
	}

	function loginnow()
	{
		if($_SERVER['REQUEST_METHOD']=='POST')
		{
			$this->form_validation->set_rules('email','Email','required');
			$this->form_validation->set_rules('password','Password','required');

			if($this->form_validation->run()==TRUE)
			{
				$email = $this->input->post('email');
				$password = $this->input->post('password');
				$password = sha1($password);

				$this->load->model('user_model');
				$status = $this->user_model->checkPassword($password,$email);
				if($status!=false)
				{
					$username = $status->username;
					$email = $status->email;
					$session_data = array(
						'username'=>$username,
						'email' => $email,
					);
                    $type=$this->user_model->getusertype($username,$email);
                    $userid=$this->user_model->getuserid($username,$email);
					// print_r($type);
					// die;
                if($type=='bank')
				{
					$session_data = array(
						'username'=>$username,
						'email' => $email,
						'userid'=>$userid,
						'usertype' =>'bank'
					);
					$this->session->set_userdata("UserLoginSession",$session_data);
					$this->session->set_userdata("userid",$userid);
					$this->session->set_userdata("username",$username);
					$this->session->set_userdata("email",$email);
					$this->session->set_userdata("usertype","bank");
					redirect(base_url('welcome/bankview'));

				}elseif($type=='customer')
				{
					$session_data = array(
						'username'=>$username,
						'email' => $email,
						'userid'=>$userid,
						'usertype' =>'customer' 
					);

					$this->session->set_userdata('UserLoginSession',$session_data);
					$this->session->set_userdata("userid",$userid);
					$this->session->set_userdata("username",$username);
					$this->session->set_userdata("email",$email);
					$this->session->set_userdata("usertype","customer");
					redirect(base_url('welcome/customerview'));

				}
				else{
					redirect(base_url('welcome/dashboard'));
				}
					// $this->session->set_userdata('UserLoginSession',$session_data);

				}
				else
				{
					$this->session->set_flashdata('error','Email or Password is Wrong');
					redirect(base_url('welcome/login'));
				}

			}
			else
			{
				$this->session->set_flashdata('error','Fill all the required fields');
				redirect(base_url('welcome/login'));
			}
		}
	}

	function dashboard()
	{
		// if($this->session->userdata('usertype')!=null){
		// 	if($this->session->userdata('usertype')=='bank'){
		// $this->load->view('bank');
			
		// 	}
		// }else{
		$this->load->view('dashboard');
		// }
	}
function withdrawl(){
	if($_SERVER['REQUEST_METHOD']=='POST')
		{
			$this->form_validation->set_rules('amount','Amount','required');
			$this->form_validation->set_rules('email','Email','required');
			$this->form_validation->set_rules('username','User Name','required');
			$this->form_validation->set_rules('ramount','Ramount','required');

			if($this->form_validation->run()==TRUE)
			{
				$username = $this->input->post('username');
				$email = $this->input->post('email');
				$amount = $this->input->post('amount');
				$ramount = $this->input->post('ramount');
				$userid = $this->input->post('userid');
if($ramount > $amount)
{
$this->session->set_flashdata('error','Not enough balance');
redirect(base_url('welcome/nobalance'));
}
else{
	$balance=$amount-$ramount;
	$this->user_model->withdrawl($username,$email,$userid,$ramount,$amount,$balance);
	$this->user_model->updateaccount($username,$email,$userid,$damount,$amount,$balance);
	                   
	// $this->load->model('user_model');
	// $this->user_model->insertuser($data);
	$this->session->set_flashdata('success','Successfully User Created');
	// redirect(base_url('welcome/index'));
	$this->session->set_userdata("amount",$balance);
	redirect(base_url('welcome/customerview'));

}
				// $data = array(
				// 	'username'=>$username,
				// 	'email'=>$email,
				// 	'usertype'=>$usertype,
				// 	'password'=>sha1($password),
				// 	'status'=>'1'
				// );

				
			}
		}
}

function nobalance()
{
	$this->load->view('nobalance');
}
function deposit()
{
	if($_SERVER['REQUEST_METHOD']=='POST')
	{
		$this->form_validation->set_rules('amount','Amount','required');
		$this->form_validation->set_rules('email','Email','required');
		$this->form_validation->set_rules('username','User Name','required');
		$this->form_validation->set_rules('ramount','Ramount','required');

		if($this->form_validation->run()==TRUE)
		{
			$username = $this->input->post('username');
			$email = $this->input->post('email');
			$amount = $this->input->post('amount');
			$damount = $this->input->post('ramount');
			$userid = $this->input->post('userid');

$balance=$amount + $damount;
$this->user_model->deposit($username,$email,$userid,$damount,$amount,$balance);
$this->user_model->updateaccount($username,$email,$userid,$damount,$amount,$balance);
// $this->load->model('user_model');
// $this->user_model->insertuser($data);
$this->session->set_flashdata('success','Successfully User Created');
// redirect(base_url('welcome/index'));
$this->session->set_userdata("amount",$balance);
redirect(base_url('welcome/customerview'));

}
			// $data = array(
			// 	'username'=>$username,
			// 	'email'=>$email,
			// 	'usertype'=>$usertype,
			// 	'password'=>sha1($password),
			// 	'status'=>'1'
			// );

			
		
	}
}
	function bankview()
	{
		if($this->session->userdata('usertype')!=null){
			if($this->session->userdata('usertype')=='bank')
			{

		$this->load->view('bankview');
			
			}
		}else{
		$this->load->view('dashboard');
		}
	}

	function customerview()
	{
		// if($this->session->userdata('usertype')!=null){
		// 	if($this->session->userdata('usertype')=='customer'){
			$data = array();
				$email=$this->session->userdata('email');
				$username=$this->session->userdata('username');
				$data=$this->user_model->getaccountdetails($username,$email);
        // $this->load->view('module/mis/Transition_report',$vehicle_data);
		$this->session->set_userdata("amount",$data);

		        $this->load->view('customerview',$data);			
			// }
		// }else{
		// $this->load->view('dashboard');
		// }
	}

	function logout()
	{
		session_destroy();
		redirect(base_url('welcome/login'));
	}
}