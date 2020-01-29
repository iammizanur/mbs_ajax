<?php 
  session_start();
  if (!isset($_SESSION['user_name'])) {
    header('Location: login.php');
  }

  
?>

<div class="container">
  <h4>Transfer Information</h4><hr>
  <div class="form-group">
      <label for="amount">From Account NO:</label>
      <select class="form-control" id="account_no">
        <option value="">Select Account NO</option>
        
      </select>
    </div>
  <div class="table_height">
    <table class="table table-bordered table-hover">
    <thead>
      <tr>
        <th>From Account Number</th>
        <th>To Account Number</th>
        <th class="amount">Amount (TK)</th>
        <th>Status</th>
      </tr>
    </thead>
    <tbody id="depo_info">
      
    </tbody>
  </table>
  </div>
  <br>
  <hr>
  <br>
  <h4>Transfer Amount</h4><hr>
  <span id="msg"></span>
  <div action="" method="POST">
    <div class="form-group">
      <label for="amount">To Account NO:</label>
      <select class="form-control" id="to_account_no">
        <option value="">Select To Account NO</option>
        
      </select>
    </div>
    <div class="form-group">
      <label for="amount">Amount:</label>
      <input type="number" class="form-control" id="amount" name="amount" min="0">
    </div>
    <button type="submit" class="btn btn-success" id="transfer">Transfer</button>
  </div> 
</div>

<script type="text/javascript">
  $(document).ready(function(){


    function get_deposite_info(){
    var account_no = $('#account_no').val();
    if (account_no=='') {
      alert('Please select Account NO');
    }
    else{
      $.ajax({
        url: "account_info.php",
        type: 'POST',
        data: {account_no:account_no,work_function:'Transfer'},
        success: function(response){
          $('#depo_info').html(response);
        }
      });
    }
  }

  $("#account_no").change(function(){
    get_deposite_info();
  });



  //adding account-no in select box
    $.ajax({
      url: "getAccount.php",
      type: "POST",
      success: function(data){
        $('#account_no').append(data); 
        $('#to_account_no').append(data); 
      }
    });


    //for Transfer amount
    $("#transfer").click(function(){
      var from_account_no = $("#account_no").val();
      var to_account_no = $("#to_account_no").val();
      var amount = $("#amount").val();
      if (from_account_no=='') {
        $("#msg").html('<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button>Please select <strong>From Account NO.</strong></div>');
      }
      else if (to_account_no=='') {
        $("#msg").html('<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button>Please select <strong>To Account NO.</strong></div>');
      }
      else if (amount=='') {
        $("#msg").html('<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button>Please Enter <strong>Amount.</strong></div>');
      }
      else{
        $.ajax({
          url: "transferController.php",
          type: "POST",
          data: {from_account_no:from_account_no, to_account_no:to_account_no, amount:amount},
          success: function(response){
            $("#msg").html(response);
            get_deposite_info();
            $("#amount").val("");
            
          }
        });
      }

    });


  });
</script>

</body>
</html>