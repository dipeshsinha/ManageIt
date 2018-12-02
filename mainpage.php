<!DOCTYPE html>
<html>
<head>
	<?php
	session_start();

if($_SESSION['username']==""){
	header('location:manageit.php');
}


?>
	<title>Welcome to ManageIt</title>
	<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="bootstrap-theme.min.css">
	<style type="text/css">
		.jumbotron{
			text-align: center;
		}
		li{
			float: left;
			margin-left: 6%;
			list-style: none;
		}
		.div1{
			border: double; 2px;
			padding: 2px 2px 2px 2px;
			border-radius: 8px;
			font-size: 16px;
			
			}
		.div1:hover{

		}
		.div-nav{
      height: 50px;
      width: 100%;
      background-color: red;
      color: white;
      font-size: 20px;
      padding-top: 8px;
    }
	</style>
</head>
<body>

<div class="div-nav">
  <span>
  <?php
    echo $_SESSION['firstname']." ".$_SESSION['lastname'];
  ?>
  <span style="float: right;color: red;"><form action="#" method="post"><input type="submit" name="end" value="Sign Out" class="btn btn-danger"></form></span>
  	<span style="float:right;color: red;"><form action="#" method="post"><input type="submit" name="home" value="Home" class="btn btn-danger"></form></span>
</span>
</div>


<div class="jumbotron">
	<div class="container">
	<h1>Manage<span style="color: red;">It</span></h1>
	<hr>
	<p>A website to manage students and fees details</p>
</div>
</div>
<div >
	<ul>
		<li><a href="add-student.php"><div class="div1">Add student</div></a></li>
		<li><a href="show.php"><div class="div1">Show student details</div></a></li>
		<li><a href="update-student.php"><div class="div1">Update student info</div></a></li>
		<li><a href="delete-student.php"><div class="div1">Delete student</div></a></li>
		<li><a href="view-fee.php"><div class="div1">View student fees</div></a></li>
		<li><a href="add-fee.php"><div class="div1">Update student fees</div></a></li>
	</ul>
</div>
<br><br><br><br>
<div >
	<ul>
		<li><a href="create-batch.php"><div class="div1">Create Batch</div></a></li>
		<li><a href="update-batch.php"><div class="div1">Update Batch</div></a></li>
		<li><a href="view-batch.php"><div class="div1">View Batch Details</div></a></li>
		<li><a href="view-all-batch.php"><div class="div1">View All Batches</div></a></li>
		<li><a href="add-course.php"><div class="div1">Add course</div></a></li>
		<li><a href="access-users.php"><div class="div1">Manage Users</div></a></li>
	</ul>
</div>



</body>
</html>

<?php
if(isset($_POST['end'])){
	session_destroy();
	header("location:manageit.php");
}
if(isset($_POST['home'])){
	header("location:mainpage.php");
}

?>

