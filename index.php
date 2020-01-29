<?php 
  session_start();
  if (!isset($_SESSION['user_name'])) {
    header('Location: login.php');
  }
  $customer_id = $_SESSION['customer_id'];
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>HOME</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
  <!-- section for top nav bar start -->
  <section>
  <nav class="navbar navbar-expand-md bg-dark navbar-dark" >
    <a class="navbar-brand" href="index.php">MBS</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <button id="create_new_account_menu" class="nav-link btn">Create Account</button>
        </li>
        <li class="nav-item">
          <button id="deposit_menu" class="nav-link btn">Deposit</button>
        <li class="nav-item">
          <button id="withdrow_menu" class="nav-link btn">Withdrow</button>
        </li>
        <li class="nav-item">
          <button id="transfer_menu" class="nav-link btn">Transfer</button>
        </li>
        <li class="nav-item">
          <button id="nomeinee_menu" class="nav-link btn">Nomeinee</button>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="logout.php">logout</a>
        </li>
      </ul>
    </div>  
  </nav>
  </section>
  <!-- section for top nav bar start -->
  <!-- The sidebar -->
  <div class="sidebar">
    <a class="active" href="index.php">Home</a>
  </div>

  <div class="container">
    <div id="main_content">
    
    </div>
  </div>

  <script type="text/javascript">
      
    $(document).ready(function(){

      $("#main_content").load("profile.php");
      $("#create_new_account_menu").click(function(){
        $("#main_content").load("account.php");
      });
      $("#deposit_menu").click(function(){
        $("#main_content").load("deposit.php");
      });
      $("#withdrow_menu").click(function(){
        $("#main_content").load("withdrow.php");
      });
      $("#transfer_menu").click(function(){
        $("#main_content").load("transfer.php");
      });
      $("#nomeinee_menu").click(function(){
        $("#main_content").load("nomeinee.php");
      });


    });
      
  </script>

</body>
</html>
