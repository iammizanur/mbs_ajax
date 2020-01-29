<?php 
	session_start();
  if (!isset($_SESSION['user_name'])) {
    header('Location: login.php');
  }
  $msg = '';
  $today = date('d-m-y');
  $customer_id = $_SESSION['customer_id'];
  include 'config.php';


    $account_no = $_POST['account_no'];
    $amount = $_POST['amount'];
    $sql_for_insert_deposite_amount = "INSERT INTO transjection_info(account_no,amount,status,transjection_date) VALUES('$account_no',$amount,'Deposit','$today') ";
    $query_for_insert_deposite_amount = mysqli_query($conn,$sql_for_insert_deposite_amount);
    if ($query_for_insert_deposite_amount) {
      $sql_for_get_current_balance = "SELECT current_balance FROM account WHERE account_no = '$account_no' ";
      $query_for_get_current_balance = mysqli_query($conn,$sql_for_get_current_balance);
      $result_for_get_current_balance = mysqli_fetch_array($query_for_get_current_balance);
      $old_balance = doubleval($result_for_get_current_balance['current_balance']);
      $new_balance = $old_balance + doubleval($amount);
      $sql_for_update_balance = "UPDATE account SET current_balance = $new_balance WHERE account_no = '$account_no' ";
      $query_for_update_balance = mysqli_query($conn,$sql_for_update_balance);
      if ($query_for_update_balance) {
        echo '<div class="alert alert-success alert-dismissible">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      <strong>Deposit successfull..!</strong> Thanks for using.</div>';
      }
    }
?>