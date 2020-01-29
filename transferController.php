<?php 
  session_start();
  if (!isset($_SESSION['user_name'])) {
    header('Location: login.php');
  }
	
  $today = date('d-m-y');
  $customer_id = $_SESSION['customer_id'];
  include 'config.php';
  

 
    $from_account_no = $_POST['from_account_no'];
    $to_account_no = $_POST['to_account_no'];
    $amount = $_POST['amount'];
    //get available balance in account
    $sql_for_get_current_balance = "SELECT current_balance FROM account WHERE account_no = '$from_account_no' ";
    $query_for_get_current_balance = mysqli_query($conn,$sql_for_get_current_balance);
    $result_for_get_current_balance = mysqli_fetch_array($query_for_get_current_balance);
    $old_balance = doubleval($result_for_get_current_balance['current_balance']);
    //check available balance for transfer
    if ($old_balance < doubleval($amount)) {
      echo'<div class="alert alert-danger alert-dismissible">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      <strong>Falied..!</strong> You do not have enough money.</div>';
    }
    else{
      if ($from_account_no==$to_account_no) {
        echo '<div class="alert alert-danger alert-dismissible">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      <strong>Falied..!</strong> You can not transfer to same account.</div>';
      }
      else{
        $sql_for_transfer_from_account = "INSERT INTO transjection_info(account_no,amount,status,transjection_date) VALUES('$from_account_no',$amount,'OUT','$today') ";
        $query_for_transfer_from_account = mysqli_query($conn,$sql_for_transfer_from_account);
        if ($query_for_transfer_from_account) {
          $sql_for_transfer_to_account = "INSERT INTO transjection_info(account_no,amount,status,transjection_date) VALUES('$to_account_no',$amount,'IN','$today') ";
          $query_for_transfer_to_account = mysqli_query($conn,$sql_for_transfer_to_account);
          if ($query_for_transfer_to_account) {
            $new_balance_from_account = $old_balance - doubleval($amount);
            $sql_for_update_amount_from_account = "UPDATE account SET current_balance = $new_balance_from_account WHERE account_no = '$from_account_no' ";
            $query_for_update_amount_from_account = mysqli_query($conn,$sql_for_update_amount_from_account);
            if ($query_for_update_amount_from_account) {
              $sql_for_to_account_balance = "SELECT current_balance FROM account WHERE account_no = '$to_account_no' ";
              $query_for_to_account_balance = mysqli_query($conn,$sql_for_to_account_balance);
              $result_for_to_account_balance = mysqli_fetch_array($query_for_to_account_balance);
              $old_balance_to_account = doubleval($result_for_to_account_balance['current_balance']);
              $new_balance_to_account = $old_balance_to_account + doubleval($amount);
              $sql_for_update_amount_to_account = "UPDATE account SET current_balance = $new_balance_to_account WHERE account_no = '$to_account_no' ";
              $query_for_update_amount_to_account = mysqli_query($conn,$sql_for_update_amount_to_account);
              if ($query_for_update_amount_to_account) {
                $sql_for_save_info_from_account_and_to_account = "INSERT INTO transfer_info(from_account_no,to_account_no,t_amount) VALUES('$from_account_no','$to_account_no',$amount) ";
                $query_for_save_info_from_account_and_to_account = mysqli_query($conn,$sql_for_save_info_from_account_and_to_account);
                if ($query_for_save_info_from_account_and_to_account) {
                  echo '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>successful..!</strong> transfer.</div>';
                }
              }
            }
          }
        }
      }
    }

?>