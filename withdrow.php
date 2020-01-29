<?php 
  session_start();
  if (!isset($_SESSION['user_name'])) {
    header('Location: login.php');
  }
?>

<div class="container">
  <h2>Withdrow Information</h2><hr>
  <div class="form-group">
      <label for="amount">Account NO:</label>
      <select class="form-control" id="account_no">
        <option value="">Select Account NO</option>
        
      </select>
    </div>
  <div class="form_height">
    <table class="table table-bordered table-hover">
    <thead>
      <tr>
        <th>Account Number</th>
        <th class="amount">Withdrow Amount (TK)</th>
        <th>Date</th>
      </tr>
    </thead>
    <tbody id="depo_info">
      
    </tbody>
  </table>
  </div>
  <br><br>
  <hr>
  <br><br>
  <h4>Withdrow Amount</h4><hr>
  <div action="" method="POST">
    
    <div class="form-group">
      <label for="amount">Amount:</label>
      <input type="number" class="form-control" id="amount" name="amount" min="0">
    </div>
    <button type="submit" class="btn btn-warning" id="Withdrow">Withdrow</button>
  </div>
  <span id="msg"></span>
</div>

<script type="text/javascript">
  

  $(document).ready(function(){

    //adding account-no in select box
    $.ajax({
      url: "getAccount.php",
      type: "POST",
      success: function(data){
        $('#account_no').append(data); 
      }
    });


  function get_deposite_info(){
    var account_no = $('#account_no').val();
      $.ajax({
        url: "account_info.php",
        type: 'POST',
        data: {account_no:account_no,work_function:'Withdrow'},
        success: function(response){
          $('#depo_info').html(response);
        }
      }); 
  }

  $("#account_no").change(function(){
    get_deposite_info();
  });



  //for Withdrow amount
    $("#Withdrow").click(function(){
      var account_no = $("#account_no").val();
      var amount = $("#amount").val();
      if (account_no=='') {
        $("#msg").html('<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button>Please select <strong>Account NO.</strong></div>');
      }
      else if (amount=='') {
        $("#msg").html('<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button>Please Enter <strong>Amount.</strong></div>');
      }
      else{
        $.ajax({
          url: "withdrowController.php",
          type: "POST",
          data: {account_no:account_no, amount:amount},
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