<?php 
  session_start();
  if (!isset($_SESSION['user_name'])) {
    header('Location: login.php');
  }
  $customer_id = $_SESSION['customer_id'];

  include 'config.php';

  $sql_for_view_profile = "SELECT * FROM customer WHERE customer_id = $customer_id ";
  $query_for_view_profile = mysqli_query($conn,$sql_for_view_profile);
  $result_for_view_profile = mysqli_fetch_array($query_for_view_profile);

?>
<h1>Personal Info <small class="text-info">(<?php echo $result_for_view_profile['first_name'].$result_for_view_profile['last_name']; ?>)</small></h1><hr>
<form id="personal_info">
	<div class="form-group">
		<label for="first_name">First Name:</label>
		<input type="text" name="first_name" class="form-control" id="first_name" value="<?php echo $result_for_view_profile['first_name']; ?>">
	</div>
	<div class="form-group">
		<label for="last_name">Last Name:</label>
		<input type="text" name="last_name" class="form-control" id="last_name" value="<?php echo $result_for_view_profile['last_name']; ?>">
	</div>
	<div class="form-group">
		<label for="email">Email:</label>
		<input type="email" name="email" class="form-control" id="email" value="<?php echo $result_for_view_profile['email']; ?>">
	</div>
</form>
