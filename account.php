<?php 
  session_start();
  if (!isset($_SESSION['user_name'])) {
    header('Location: login.php');
  }
 ?>

  <h2>Account Information <small class="text-info">(<?php echo $_SESSION['user_name']; ?>)</small> </h2><hr>
  <div class="table_height">
    <table class="table table-bordered table-hover">
    <thead>
      <tr>
        <th>Account Number</th>
        <th class="amount">Current Balance (TK)</th>
      </tr>
    </thead>
    <tbody id="view_table_info" >
      
    </tbody>
    <tfoot>
      <tr>
        <th>Account Number</th>
        <th class="amount">Current Balance (TK)</th>
      </tr>
    </tfoot>
  </table>
  </div>
  <br><br>
  <hr>
  <br><br>
  <h2>Create New Account</h2><hr>
  <div action="" method="POST">
    <div class="form-group">
      <label for="account_no">Account No:</label>
      <input readonly type="text" class="form-control" id="account_no" name="account_no" required="">
    </div>
    <input type="submit" class="btn btn-primary" id="create_account_btn"value="Create Account">
  </div><br>
  <div id="msg"></div>
  <script type="text/javascript">
    $(document).ready(function(){

      //create new account
      $(create_account_btn).click(function(){
        var account_no = $("#account_no").val();
        $.ajax({
          url: "createNewAccount.php",
          type: "POST",
          data: {account_no:account_no},
          success: function(response){
            $("#msg").html(response);
            viewTable("viewAccountInfo.php");
            new_account();
          }
        });
      });

      //view account info
      function viewTable(page_name){
        $.ajax({
          url: page_name,
          type: "POST",
          // cache: false,
          success: function(data){
            $('#view_table_info').html(data); 
          }
        });
      }

      viewTable("viewAccountInfo.php");

      //new account
      function new_account(){
        $.ajax({
          url: "getNewAccount.php",
          type: "POST",
          success: function(data){
            $('#account_no').val(data); 
          }
        });
      }
      new_account();


    });
  </script>
