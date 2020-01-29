<?php 
  session_start();
  if (!isset($_SESSION['user_name'])) {
    header('Location: login.php');
  }
  $customer_id = $_SESSION['customer_id'];
  // $msg='';
  include 'config.php';
  //get old account and set new account value to input field
  $sql_for_get_old_account = "SELECT account_no FROM account ORDER BY account_id DESC LIMIT 1 ";
  $query_for_get_old_account = mysqli_query($conn,$sql_for_get_old_account);
  $result_for_get_old_account = mysqli_fetch_array($query_for_get_old_account);
  $old_account = $result_for_get_old_account['account_no'];
  if ($old_account=='')
    $new_account = '100001';
  else{
    $new_account = intval($old_account)+1;
    echo $new_account;
	}
 ?>