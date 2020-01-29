<?php 
	session_start();
	if (!isset($_SESSION['user_name'])) {
		header('Location: login.php');
	}
	$customer_id = $_SESSION['customer_id'];
	include 'config.php';
	$sql_for_account_no = "SELECT account_no FROM account WHERE customer_id = $customer_id ";
	$query_for_account_no = mysqli_query($conn,$sql_for_account_no);
	while($result_for_account_no = mysqli_fetch_array($query_for_account_no)){
		echo '<option>'.$result_for_account_no["account_no"].'</option>';
	}
?>

     