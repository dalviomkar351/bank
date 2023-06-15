<!doctype html>
<?php

$email=$this->session->userdata('email');
$username=$this->session->userdata('username');
$amount=$this->session->userdata('amount');
$userid=$this->session->userdata('userid');
				// print_r($email);
				// print_r($username);
				// print_r($amount);
				// print_r($userid);
				// die;
///////////////////////////////////

$CI =& get_instance();
$CI->load->model('User_model');
// $result= $CI->User_model->getdatatrans($userid)->result_array();        
$result= $CI->User_model->getdatatrans($userid);        
// print_r($result);
// die; 


//////////////////////////////////





?>
<script>
var amount=<?php echo $amount?>;
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

  function test() {
    $('#addtobagmodal').modal('show');
  }

  function testadd() {
    $('#addtoamount').modal('show');
  }
  
  function testhis() {
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
			<div class="row">
				<div class="col-md-4"></div>
				<div class="col-md-4">
					<div class="card" style="margin-top: 30px">
					  <div class="card-header text-center">				  
					  <h4>Balance <b><?php echo $amount?></b></h4>
          
					  </div>
  <head>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js"></script>
  </head>
  <body>
    <!-- <button class="btn btn-default" id="addtobag" onclick="addTobag();">Add to Bag</button><br> -->
    <button class="btn btn-default" id="addtobag" onclick="test();">Withdrawl</button><br>
    <button class="btn btn-default" id="addtobag" onclick="testadd();">Deposit</button><br>
    <button class="btn btn-default" id="addtobag" onclick="testhis();">Transaction History</button><br>



    <div class="modal fade" id="addtohistory" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
		Balance <b><?php echo $amount?></b>
        </div>
        <div class="modal-body">
  <input name="<?php echo $this->security->get_csrf_token_name(); ?>" type="hidden" value="<?php echo $this->security->get_csrf_hash(); ?>">				 
  <input name="amount" id="amount" value="<?php echo $amount; ?>" type="hidden" value="<?php echo $this->security->get_csrf_hash(); ?>">				 
  <input name="email" id="email" value="<?php echo $email; ?>" type="hidden" value="<?php echo $this->security->get_csrf_hash(); ?>">				 
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
                <th>Time</th>
          
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















    
	<div class="modal fade" id="addtoamount" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
		Balance <b><?php echo $amount?></b>
        </div>
        <div class="modal-body">
		<form method="post" autocomplete="off" action="<?=base_url('welcome/deposit')?>">
  <input name="<?php echo $this->security->get_csrf_token_name(); ?>" type="hidden" value="<?php echo $this->security->get_csrf_hash(); ?>">				 
  <input name="amount" id="amount" value="<?php echo $amount; ?>" type="hidden" value="<?php echo $this->security->get_csrf_hash(); ?>">				 
  <input name="email" id="email" value="<?php echo $email; ?>" type="hidden" value="<?php echo $this->security->get_csrf_hash(); ?>">				 
  <input name="username" id="username" value="<?php echo $username; ?>" type="hidden" value="<?php echo $this->security->get_csrf_hash(); ?>">				 
  <input name="userid" id="userid" value="<?php echo $userid; ?>" type="hidden" value="<?php echo $this->security->get_csrf_hash(); ?>">				 
						  <div class="mb-3">
						    <label for="exampleInputEmail1" class="form-label">Deposit Amount</label>
						    <input type="ramount"  placeholder="Enter Deposit Amount" name="ramount" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"onkeypress="return /[0-9.]/i.test(event.key)" maxlength="10">
						  </div>
						 <div class="text-center">
						  <button type="submit" class="btn btn-primary">Deposit</button>
						</div>

					<?php
						if($this->session->flashdata('error')) {	?>
						 <p class="text-danger text-center" style="margin-top: 10px;"> <?=$this->session->flashdata('error')?></p>
						<?php } ?>
						
						</form>
        </div>
        <div class="modal-footer">
         
        </div>
      </div>
    </div>
  </div>




  <div class="modal fade" id="addtobagmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
		Balance <b><?php echo $amount?></b>
        </div>
        <div class="modal-body">
		<form method="post" autocomplete="off" action="<?=base_url('welcome/withdrawl')?>">
  <input name="<?php echo $this->security->get_csrf_token_name(); ?>" type="hidden" value="<?php echo $this->security->get_csrf_hash(); ?>">				 
  <input name="amount" id="amount" value="<?php echo $amount; ?>" type="hidden" value="<?php echo $this->security->get_csrf_hash(); ?>">				 
  <input name="email" id="email" value="<?php echo $email; ?>" type="hidden" value="<?php echo $this->security->get_csrf_hash(); ?>">				 
  <input name="username" id="username" value="<?php echo $username; ?>" type="hidden" value="<?php echo $this->security->get_csrf_hash(); ?>">				 
  <input name="userid" id="userid" value="<?php echo $userid; ?>" type="hidden" value="<?php echo $this->security->get_csrf_hash(); ?>">				 
			
  <div class="mb-3">
						    <label for="exampleInputEmail1" class="form-label">Withdrawal Amount</label>
						    <input type="ramount"  placeholder="Enter Withdrawal Amount" name="ramount" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" onkeypress="return /[0-9.]/i.test(event.key)" maxlength="10">
						  </div>
						 <div class="text-center">
						  <button type="submit" class="btn btn-primary">Withdraw</button>
						</div>

					<?php
						if($this->session->flashdata('error')) {	?>
						 <p class="text-danger text-center" style="margin-top: 10px;"> <?=$this->session->flashdata('error')?></p>
						<?php } ?>
						
						</form>
        </div>
        <div class="modal-footer">
         
        </div>
      </div>
    </div>
  </div>
  

</body>
</html>









