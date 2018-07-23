<!DOCTYPE html>
<html>
<head>
  <?php
  session_start();
if($_SESSION['username']==""){
  header('location:manageit.php');
}
  ?>
	<title>Student's details</title>
	<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="bootstrap-theme.min.css">
  
	<style type="text/css">
		.jumbotron{
			text-align: center;
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
<form action="#" method="post">
	<fieldset class="form-group">
    <div class="row">
      <legend class="col-form-label col-sm-2 pt-0">Course</legend>
      <div class="col-sm-10">
        <div class="form-check">
          <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="php" >
          <label class="form-check-label" for="gridRadios1">
            PHP
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="css">
          <label class="form-check-label" for="gridRadios2">
            CSS
          </label>
        </div>
        <div class="form-check disabled">
          <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios3" value="html" >
          <label class="form-check-label" for="gridRadios3">
            HTML
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="3d-designing" >
          <label class="form-check-label" for="gridRadios1">
            3D Designing
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="python" >
          <label class="form-check-label" for="gridRadios1">
            Python
          </label>
        </div>
      </div>
    </div>
  
  <div class="form-group row">
    <div class="col-sm-10">
      <input type="submit" name="sub" value="Submit" class="btn btn-danger">
    </div>
  </div>
  </div>
</form>



</body>
</html>



<?php
if(isset($_POST['sub'])){
		$course=$_POST['gridRadios'];
		$conn = mysqli_connect("localhost","root","","project");
	 	$sql = "select * from student where course='".$course."';";
		$result = mysqli_query($conn,$sql);
	 	$count = mysqli_num_rows($result);
	 	echo "<table class=\"table table-striped\"><tr><th>First name</th><th>Last name</th><th>Roll no.</th><th>Course</th><th>Total fee</th><th>Batch</th><th>Remaining fee</th></tr>";
	 	while($row = mysqli_fetch_row($result)){
	 		$sql2 = "select * from fees where roll ='".$row[2]."';";
	 		$result2 = mysqli_query($conn,$sql2);
	 		$given=0;
	 		while($row2 = mysqli_fetch_row($result2)){
	 			$given=$given+$row2[2];
	 		}
	 		$rem=$row[4]-$given;

	 		echo "<tr><td>".$row[0]."</td><td>".$row[1]."</td><td>".$row[2]."</td><td>".$row[3]."</td><td>".$row[4]."</td><td>".$row[5]."</td><td>".$rem."</td></tr>";

	 	}
		echo "</table>";
  }
 


if(isset($_POST['end'])){
  session_destroy();
  header("location:manageit.php");
}
if(isset($_POST['home'])){
  header("location:mainpage.php");
}
?>