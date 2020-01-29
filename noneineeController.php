<?php 
  session_start();
  if (!isset($_SESSION['user_name'])) {
    header('Location: login.php');
  }
  $customer_id = $_SESSION['customer_id'];
  include 'config.php';
  $type = $_POST['type'];

  switch ($type) {
    case 'view_single_Nomeinee_info':
      $id = $_POST['nomeinee_id'];
      $sql_for_nomeinee_view = "SELECT * FROM nomeinee WHERE id = $id ";
      $query_for_nomeinee_view = mysqli_query($conn,$sql_for_nomeinee_view);
      $result_for_nomeinee_view = mysqli_fetch_array($query_for_nomeinee_view);
      echo "<h2>Nomeinee Details</h2><hr><h4>Name: <small>". $result_for_nomeinee_view['nomeinee_name']."</small></h4><h4>Relationship: <small>". $result_for_nomeinee_view['relation']."</small></h4><h4>NID: <small>". $result_for_nomeinee_view['nid']."</small></h4><h4>Account NO: <small>".$result_for_nomeinee_view['account_no']."</small></h4>";
      break;
      case 'view_all_Nomeinee_info':
       
        $sql_for_nomeinee_view = "SELECT * FROM nomeinee WHERE c_id = $customer_id ";
        $query_for_nomeinee_view = mysqli_query($conn,$sql_for_nomeinee_view);
        $return['records'] = array();
        while ($result_for_nomeinee_view = mysqli_fetch_array($query_for_nomeinee_view)) {
          $return['records'] [] = $result_for_nomeinee_view;
        }
        echo json_encode($return);
        break;
        case 'insert':
          $nomeinee_name = $_POST['nomeinee_name'];
          $relation = $_POST['relationship'];
          $nid = $_POST['nid'];
          $account_no = $_POST['account_no'];
          $sql_for_nomeinee_add = "INSERT INTO nomeinee(nomeinee_name,relation,nid,account_no,c_id) VALUES('$nomeinee_name','$relation','$nid','$account_no',$customer_id) ";
          $query_for_nomeinee_add = mysqli_query($conn,$sql_for_nomeinee_add);
          if ($query_for_nomeinee_add) {
            echo '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Nomeinee</strong> added successful.</div>';
          }
          break;
          case 'delete_Nomeinee_info':
            $id = $_POST['nomeinee_id'];
            $sql_for_delete_nomeinee = "DELETE FROM nomeinee WHERE id = $id ";
            $query_for_delete_nomeinee = mysqli_query($conn,$sql_for_delete_nomeinee);
            if ($query_for_delete_nomeinee) {
              echo '<div class="alert alert-warning alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Nomeinee</strong> delete successful.</div>';
            }
            break;
          case 'update':
            $id = $_POST['id'];
            $nomeinee_name = $_POST['nomeinee_name'];
            $relation = $_POST['relationship'];
            $nid = $_POST['nid'];
            $sql_for_nomeinee_update = "UPDATE nomeinee SET nomeinee_name = '$nomeinee_name',relation = '$relation',nid = '$nid' WHERE id = $id ";
            $query_for_nomeinee_update = mysqli_query($conn,$sql_for_nomeinee_update);
            if ($query_for_nomeinee_update) {
              echo '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Update</strong> successful.</div>';
            }
            break;

    
    default:
      # code...
      break;
  }
 ?>

