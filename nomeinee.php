<?php 
  session_start();
  if (!isset($_SESSION['user_name'])) {
    header('Location: login.php');
  }
  $customer_id = $_SESSION['customer_id'];
  include 'config.php';
 ?>
<div class="container">
  <h3>Nomeinee List</h3><span id="delMsg"></span><hr>
  <button id="create_new" class="btn btn-success">Create New Nomeinee</button>
  <div class="table_height">
    
    <table class="table table-bordered table-hover">
      <thead>
        <tr>
          <th>Name</th>
          <th>Relation</th>
          <th>Account No</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody id="view_nomeinee">
        
      </tbody>
    </table>
    
  </div>
  <br><br>
  <hr>
  <br>
  <div id="change_element" class="hide_element">
    
  </div>
  <div id="nomeinee_add" class="hide_element">
    <h2 id="header">Create New Nomeinee</h2><hr>
    <br>
  <span id="msg"></span>
  <div action="" method="POST">
    <div class="form-group">
      <label for="amount">Account NO:</label>
      <select class="form-control" id="account_no">
        <option value="">Select Account NO</option>
        <?php 
          $sql_for_account_no1 = "SELECT account_no FROM account WHERE customer_id = $customer_id ";
          $query_for_account_no1 = mysqli_query($conn,$sql_for_account_no1);
          while($result_for_account_no1 = mysqli_fetch_array($query_for_account_no1)){
        ?>
        <option><?php echo $result_for_account_no1['account_no']; ?></option>
        <?php } ?>
      </select>
    </div>
    <div class="form-group">
      <label for="nomeinee_name">Nomeinee Name</label>
      <input type="text" class="form-control" id="nomeinee_name" name="nomeinee_name" placeholder="">
    </div>
    <div class="form-group">
      <label for="relationship">Relationship With Nomeinee</label>
      <input type="text" name="relationship" id="relationship" class="form-control" placeholder="">
    </div>
    <div class="form-group">
      <label for="nid">Nomeinee NID NO</label>
      <input type="text" name="nid" id="nid" class="form-control" placeholder="">
    </div>
    <button type="submit" class="btn btn-success" id="nomeinee">Create Nomeinee</button>
  </div>
  </div>
</div>

<script type="text/javascript">

    $("#create_new").click(function(){
      $("#nomeinee_add").removeClass("hide_element");
      $("#nomeinee_add").css("display","block");
      $("#change_element").css("display","none");
    });

    //view single nomeinee info
    function view_single_Nomeinee_info(nomeinee_id){
      var nomeinee_id = nomeinee_id;
      $.ajax({
          url: "noneineeController.php",
          type: "POST",
          data: {nomeinee_id:nomeinee_id,type:'view_single_Nomeinee_info'},
          success: function(response){
            $("#change_element").addClass("hide_element");
            $("#change_element").html(response);
            $("#change_element").removeClass("hide_element");
            $("#change_element").css("display","block");
            $("#nomeinee_add").css("display","none");
          }
        });
    }
    //get nomeinee info
    function get_nomeimee_info(){
      $.ajax({
          url: "noneineeController.php",
          type: "POST",
          dataType:"JSON",
          data: {type:'view_all_Nomeinee_info'},
          success: function(response){
            var html_data = '';
           if (!jQuery.isEmptyObject(response.records)) {
              $.each(response.records, function(i,data){
               // alert(response['nomeinee_name']);
               var id = data["id"];
                html_data +='<tr>';
                html_data +='<td>'+data["nomeinee_name"]+'</td>';
                html_data +='<td>'+data["relation"]+'</td>';
                html_data +='<td>'+data["relation"]+'</td>';
                html_data +='<td><button title="View" class="btn btn-info" onclick="view_single_Nomeinee_info('+id+')"><i class="fas fa-eye"></i></button> <button title="Delete" class="btn btn-danger" onclick="delete_nomeinee('+id+')"><i class="fas fa-trash"></i></button> <button title="Edit" class="btn btn-success" onclick="edit_nomeinee('+id+')"><i class="fas fa-edit"></i></button></td>';
                html_data +='</tr>';
              });
            }
            $("#view_nomeinee").html(html_data);
          }
        });
    }
    get_nomeimee_info();

    //add new nomeinee
    $("#nomeinee").click(function(){
      var account_no = $("#account_no").val();
      var nomeinee_name = $("#nomeinee_name").val();
      var relationship = $("#relationship").val();
      var nid = $("#nid").val();
      if (account_no == "") {
        $("#msg").html('<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button>Selece<strong>Account NO</strong>.</div>');
      }
      else{
        $.ajax({
          url: "noneineeController.php",
          type: "POST",
          data: {type:'insert',account_no:account_no,nomeinee_name:nomeinee_name,relationship:relationship,nid:nid},
          success: function(response){
            $("#msg").html(response);
            get_nomeimee_info();
            $("#account_no").val("");
            $("#nomeinee_name").val("");
            $("#relationship").val("");
            $("#nid").val("");
          }
        });
      }
    });

    //delete
    function delete_nomeinee(nomeinee_id){
      var nomeinee_id = nomeinee_id;
      if (confirm('Are you sure, you want to delete this item...?')) {
        $.ajax({
          url: "noneineeController.php",
          type: "POST",
          data: {nomeinee_id:nomeinee_id,type:'delete_Nomeinee_info'},
          success: function(response){
            $("#delMsg").html(response);
            get_nomeimee_info();
          }
        });
      }
      
    }

    //get data for edit
    function edit_nomeinee(nomeinee_id){
      var nomeinee_id = nomeinee_id;
      $.ajax({
          url: "edit.php",
          type: "POST",
          data: {nomeinee_id:nomeinee_id},
          success: function(response){
            $("#nomeinee_add").css("display","none");
            $("#change_element").html(response);
            $("#change_element").css("display","none");
            $("#change_element").removeClass("hide_element");
            $("#change_element").css("display","block");
          }
        });
        
    }


 
</script>
</body>
</html>
