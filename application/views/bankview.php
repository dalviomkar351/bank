<?php


$email=$this->session->userdata('email');
$username=$this->session->userdata('username');
$userid=$this->session->userdata('userid');
				// print_r($email);
				// print_r($username);
				// print_r($amount);
				// print_r($userid);
				// die;
///////////////////////////////////
header("Refresh:30");

$CI =& get_instance();
$CI->load->model('User_model');
// $result= $CI->User_model->getdatatrans($userid)->result_array();        
$result= $CI->User_model->getdataforbank();        
// print_r($result);
// die; 


//////////////////////////////////





?>
<!doctype html>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" />
  
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script>
	// alert(amount);
    $('input[name="cont"]').keyup(function (e) {
        if (/\D/g.test(this.value)) {
            // Filter non-digits from input value.
            this.value = this.value.replace(/\D/g, '');
        }
    });


function addTobag() {
    var request = new XMLHttpRequest();
    request.onreadystatechange = function() {
      if (request.readyState === 4 && request.status === 200) {
        if (request.responseText = "OK") {
          $('#addtobagmodal').modal('show');
        } else {
          alert('error');
        }
      }
    };
    request.open("GET", "myBag", true);
    request.send();
  }
  function deleteCookie(name) {
  document.cookie = name + "=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
}
 
  
  function testhis(id) {
    // alert(id);
    deleteCookie("cid");
    document.cookie = "cid" + "=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
// var customerid= id;
document.cookie="cid="+id;
    $('#addtohistory').modal('show');
  }

  </script>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Banking System</title>
  </head>
  <body>

  	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		  <div class="container-fluid">
		    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
		      <span class="navbar-toggler-icon"></span>
		    </button>
		    <a class="navbar-brand" href="#">BANK Login/Register</a>
		    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
		      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
		        <li class="nav-item">
		          <a class="nav-link active" aria-current="page" href="#">Home</a>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link" href="<?=base_url('welcome/login')?>">Login</a>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
		        </li>
		      </ul>
		      <form class="d-flex">
		        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
		        <button class="btn btn-outline-success" type="submit">Search</button>
            
		      </form>
		    </div>
		  </div>
		</nav>
		<div class="container">
					  
					  <h4>Accounts Information</h4>
          
					  </div>
  <head>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js"></script>
  </head>
  <body>

  <div class="table-responsive">
    <!-- <table id="example2" style="white-space:nowrap;" class="table  table-bordered table-hover "> -->
    <table id="master_table" class="table table-bordered table-hover" style="white-space:nowrap;border-collapse: collapse !important;">
        <thead style='color:white;box-shadow: 0px 1px 1px 0px blue;' class="bg-info">
            <tr>
                <th>Sr. No</th>
                <th>User ID</th>
                <th>User Name</th> 
                <th>Email</th>
                <th>Amount</th>          
                <th>Transaction Histroy</th>          
            <!-- <th>IS EXIT PLANT </th> -->
           
         
                <?php
                // $table_head_array = unserialize($table_head);
                // print_r($table_head_array);
                // die();
                // foreach ($table_head_array as $column_header) {
                //     $column_array = explode(":", $column_header);
                //     echo "<th style='border-color: #DA0037'>" .$column_array[0]. "</th>";
                // }
                ?>

                <!-- <th style="border-color: #DA0037">Action</th> -->
            </tr>
        </thead>
        <tbody>
            <?php
            $count=1;
            foreach ($result as $record) {
                echo "<tr>";
                echo "<td>" . $count++ . "</td>";
                echo "<td>" . $record['id'] . "</td>";
                echo "<td>" . $record['username'] . "</td>";
                echo "<td>" . $record['email'] . "</td>";
                echo "<td>" . $record['amount'] . "</td>";
                echo "<td>"."<button class="."btn btn-default"." id="."addtobag"." onclick="."testhis(".$record['id'].");".">"."Transaction History"."</button>"."</td>";
                echo "</tr>";
            }
            ?>

        </tbody>
    </table>
    <?php // $this->load->view('master/table_tr_td', array("table_header" => USER_DETAILS_TABLE, "table_data_array" => $user_details)) 
    ?>
    <!-- </table> -->
</div>
<script>
$('#master_table').DataTable({
        dom: 'Bfrtip',
        buttons: [
        'excel' 
        ]
    });
</script>







    <!-- <button class="btn btn-default" id="addtobag" onclick="addTobag();">Add to Bag</button><br> -->
 
    <div class="modal fade" id="addtohistory" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <?php 
        unset($result);
        $customerid="";   
        // print_r($customerid);
        unset($customerid);        
        $customerid=$_COOKIE['cid'];
        // print_r($customerid);
        // $CI =& get_instance();
        // $CI->load->model('User_model');
        // $result= $CI->User_model->getdatatrans($userid)->result_array();
        unset($result);        
        $result="";    
        print_r($result);

        $result= $CI->User_model->getdataforcustomer($customerid);   
        setcookie("cid", "", time() - 3600, "/");
        // print_r($result);
// die;
        ?>
        <div class="modal-header">
		Transaction History </b>
        </div>
        <div class="modal-body">
  <input name="<?php echo $this->security->get_csrf_token_name(); ?>" type="hidden" value="<?php echo $this->security->get_csrf_hash(); ?>">				 
  <input name="username" id="username" value="<?php echo $username; ?>" type="hidden" value="<?php echo $this->security->get_csrf_hash(); ?>">				 
  <input name="userid" id="userid" value="<?php echo $userid; ?>" type="hidden" value="<?php echo $this->security->get_csrf_hash(); ?>">				 
  <div class="table-responsive">
    <!-- <table id="example2" style="white-space:nowrap;" class="table  table-bordered table-hover "> -->
    <table id="master_table" class="table table-bordered table-hover" style="white-space:nowrap;border-collapse: collapse !important;">
        <thead style='color:white;box-shadow: 0px 1px 1px 0px blue;' class="bg-info">
            <tr>
                <th>Sr. No</th>
                <th>Withdraw</th> 
                <th>Deposit</th>
                <th>Current Balance </th>
                <th>Previous Balance</th>
                <th>Timew</th>
          
            <!-- <th>IS EXIT PLANT </th> -->
           
         
                <?php
                // $table_head_array = unserialize($table_head);
                // print_r($table_head_array);
                // die();
                // foreach ($table_head_array as $column_header) {
                //     $column_array = explode(":", $column_header);
                //     echo "<th style='border-color: #DA0037'>" .$column_array[0]. "</th>";
                // }
                ?>

                <!-- <th style="border-color: #DA0037">Action</th> -->
            </tr>
        </thead>
        <tbody>
            <?php
            $count=1;
            foreach ($result as $record) {
                echo "<tr>";
                echo "<td>" . $count++ . "</td>";
                echo "<td>" . $record['withdraw'] . "</td>";
                echo "<td>" . $record['deposit'] . "</td>";
                echo "<td>" . $record['currentbalance'] . "</td>";
                echo "<td>" . $record['previousbalance'] . "</td>";
                echo "<td>" .date("d-m-Y  H:m:s", strtotime($record['insert_time'])). "</td>";              
                echo "</tr>";
            }
            $result="";
            $record="";
            unset($result);
            unset($record);
            ?>

        </tbody>
    </table>
    <?php // $this->load->view('master/table_tr_td', array("table_header" => USER_DETAILS_TABLE, "table_data_array" => $user_details)) 
    ?>
    <!-- </table> -->
</div>
<script>
$('#master_table').DataTable({
        dom: 'Bfrtip',
        buttons: [
        'excel' 
        ]
    });
</script>

        </div>
        <div class="modal-footer">
         
        </div>
      </div>
    </div>
  </div>















    
	



  

</body>
</html>









