<?php 

class User_model extends CI_Model {

	function insertuser($data)
	{
		$this->db->insert('users',$data);
	}

	function checkPassword($password,$email)
	{
		$query = $this->db->query("SELECT * FROM users WHERE password='$password' AND email='$email' AND status='1'");
		if($query->num_rows()==1)
		{
			return $query->row();
		}
		else
		{
			return false;
		}

	}
	
// function withdrawl($balance,$amount,$ramount,$username,$email,$userid)
function withdrawl($username,$email,$userid,$wamount,$amount,$balance)
{
	$query="INSERT INTO accounts(userid,username,withdraw,deposit,currentbalance,previousamount,insert_time)values($userid,'$username',$wamount,0,$balance,$amount,now());";
	$response = $this->db->query($query);
	return $response;

}

function deposit($username,$email,$userid,$damount,$amount,$balance)
{
	$query="INSERT INTO accounts(userid,username,withdraw,deposit,currentbalance,previousamount,insert_time)values($userid,'$username',0,$damount,$balance,$amount,now());";
	$response = $this->db->query($query);
	return $response;
}

function updateaccount($username,$email,$userid,$damount,$amount,$balance)
{
$query ="UPDATE users SET amount='$balance' where id='$userid' AND username='$username'; ";
// print_r($query);
// die;
$response = $this->db->query($query);
return $response;
}
function getuserid($username,$email)
{
	$query = "SELECT id FROM users WHERE username='$username' AND email='$email' AND status='1'";
        $response = $this->db->query($query);
        $result = $response->result_array();
         $data=$result[0]['id'];
        //  print_r($result[0]['usertype']);
        //  die;
        // $data['table_data'] = $result;
        // $db->close();
        return $data;
}

	function getusertype($username,$email)
	{
		// $db = $this->CI->db;

		$query = "SELECT usertype FROM users WHERE username='$username' AND email='$email' AND status='1'";
        $response = $this->db->query($query);
        $result = $response->result_array();
         $data=$result[0]['usertype'];
        //  print_r($result[0]['usertype']);
        //  die;
        // $data['table_data'] = $result;
        // $db->close();
        return $data;
		// if($query->usertype !='')
		// {
			// return $query->usertype;
		// }
		// else
		// {
		// 	return false;
		// }
	}

	function getaccountdetails($username,$email)
	{
		// $query = $this->db->query("SELECT amount FROM users WHERE username='$username' AND email='$email' AND status='1'");
		$query = "SELECT amount FROM users WHERE username='$username' AND email='$email' AND status='1'";
        $response = $this->db->query($query);
        $result = $response->result_array();
         $data=$result[0]['amount'];
        //  print_r($username);
        //  print_r($email);
        //  print_r($result);
        //  die;
        // $data['table_data'] = $result;
        // $db->close();
        return $data;

	}
///////////////////////////////////////////////
function getdataforcustomer($id)
{
	$query = "SELECT IFNULL(withdraw,'NA') as withdraw,IFNULL(deposit,'NA') as deposit,IFNULL(currentbalance,'NA') as currentbalance,IFNULL(previousamount,'NA') as previousbalance,IFNULL(insert_time,'NA') as insert_time FROM accounts WHERE userid='$id';";
        $response = $this->db->query($query);
        $result = $response->result_array();
        //  $data=$result[0]['amount'];
        //  print_r($username);
        //  print_r($email);
        //  print_r($result);
        //  die;
        // $data['table_data'] = $result;
        // $db->close();
        return $result;

}
///////////////////////////////////////////////
function getdataforbank()
{
	// $query = "SELECT IFNULL(withdraw,'NA') as withdraw,IFNULL(deposit,'NA') as deposit,IFNULL(currentbalance,'NA') as currentbalance,IFNULL(previousamount,'NA') as previousbalance,IFNULL(insert_time,'NA') as insert_time FROM accounts WHERE userid='$userid'";
		$query = "SELECT * FROM users WHERE usertype='customer'";   
	$response = $this->db->query($query);
        $result = $response->result_array();
        //  $data=$result[0]['amount'];
        //  print_r($username);
        //  print_r($email);
        //  print_r($result);
        //  die;
        // $data['table_data'] = $result;
        // $db->close();
        return $result;
}


	function getdatatrans($userid)
	{
		// $query = $this->db->query("SELECT amount FROM users WHERE username='$username' AND email='$email' AND status='1'");
		$query = "SELECT IFNULL(withdraw,'NA') as withdraw,IFNULL(deposit,'NA') as deposit,IFNULL(currentbalance,'NA') as currentbalance,IFNULL(previousamount,'NA') as previousbalance,IFNULL(insert_time,'NA') as insert_time FROM accounts WHERE userid='$userid'";
        $response = $this->db->query($query);
        $result = $response->result_array();
        //  $data=$result[0]['amount'];
        //  print_r($username);
        //  print_r($email);
        //  print_r($result);
        //  die;
        // $data['table_data'] = $result;
        // $db->close();
        return $result;

	}


}