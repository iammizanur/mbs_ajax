<?php 
  session_start();
  if (!isset($_SESSION['user_name'])) {
    header('Location: login.php');
  }
  $customer_id = $_SESSION['customer_id'];
  include 'config.php';
  $id = $_POST['nomeinee_id'];
  $sql_for_get_nomeinee_for_update = "SELECT * FROM nomeinee WHERE id = $id ";
  $query_for_get_nomeinee_for_update = mysqli_query($conn,$sql_for_get_nomeinee_for_update);
  $result_for_get_nomeinee_for_update = mysqli_fetch_array($query_for_get_nomeinee_for_update);

 ?>

<div class="container">
  <h2>Update Nomeinee</h2><hr>
  
  
  <div action="" method="POST">
    <input type="hidden" name="" id="id" value="<?php echo $id; ?>" >
    <div class="form-group">
      <label for="account_no">Account NO:</label>
      <input type="text" name="" class="form-control" value="<?php echo $result_for_get_nomeinee_for_update['account_no']; ?>" id="account_no" readonly >
    </div>
    <div class="form-group">
      <label for="nomeinee_name">Nomeinee Name</label>
      <input type="text" class="form-control" id="nomeinee_name" name="nomeinee_name" required="" value="<?php echo $result_for_get_nomeinee_for_update['nomeinee_name']; ?>">
    </div>
    <div class="form-group">
      <label for="relationship">Relationship With Nomeinee</label>
      <input type="text" name="relationship" id="relationship" class="form-control" value="<?php echo $result_for_get_nomeinee_for_update['relation']; ?>">
    </div>
    <div class="form-group">
      <label for="nid">Nomeinee NID NO</label>
      <input type="text" name="nid" id="nid" class="form-control" value="<?php echo $result_for_get_nomeinee_for_update['nid'] ?>">
    </div>
    <input type="submit" class="btn btn-success" id="update" value="Update">
  </div>
</div>
<script type="text/javascript">
  $("#update").click(function(){
    var id = $("#id").val();
    var nomeinee_name = $("#nomeinee_name").val();
    var relationship = $("#relationship").val();
    var nid = $("#nid").val();
    $.ajax({
          url: "noneineeController.php",
          type: "POST",
          data: {id:id,nomeinee_name:nomeinee_name,relationship:relationship,nid:nid,type:'update'},
          success: function(response){
            $("#delMsg").html(response);
            get_nomeimee_info();
            $("#change_element").css("display","none");
          }
        });
  });
</script>

