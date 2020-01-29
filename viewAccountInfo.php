<?php 
	session_start();
  if (!isset($_SESSION['user_name'])) {
    header('Location: login.php');
  }
  $customer_id = $_SESSION['customer_id'];
  // $msg='';
  include 'config.php';
	$sql_for_account_details = "SELECT account_no,current_balance FROM account WHERE customer_id = $customer_id ";
	$query_for_account_details = mysqli_query($conn,$sql_for_account_details);
	while($result_for_account_details = mysqli_fetch_array($query_for_account_details)){
		echo "<tr><td>".$result_for_account_details['account_no']."</td><td class='amount'>".$result_for_account_details['current_balance']."</td></tr>";
	}
      
 ?>