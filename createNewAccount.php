<?php 
	session_start();
  	if (!isset($_SESSION['user_name'])) {
    	header('Location: login.php');
  	}
  	$customer_id = $_SESSION['customer_id'];
  	
  	include 'config.php';
  	$account_no = $_REQUEST['account_no'];
	//create new account
	
	$current_balance = 0;
	$sql_for_create_new_account = "INSERT INTO account(customer_id,account_no,current_balance) VALUES($customer_id,'$account_no',$current_balance) ";
	$query_for_create_new_account = mysqli_query($conn,$sql_for_create_new_account);
	if ($query_for_create_new_account) {
	  echo '<div class="alert alert-success alert-dismissible">
	  <button type="button" class="close" data-dismiss="alert">&times;</button>
	  <strong>account created..!</strong> successfull.</div>';
	}
?>