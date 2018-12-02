<!DOCTYPE html>
<html>
<head>
	<?php
	session_start();
	if($_SESSION['username']==""){
	header('location:manageit.php');
}
$connt = mysqli_connect("localhost","root","","project");
  $sqlch = "select * from user where username = '".$_SESSION['username']."'";
  $resultch=mysqli_query($connt,$sqlch);
  $rowch=mysqli_fetch_row($resultch);
  if($rowch[5]=='n'){
    echo "<script>alert(\"you are not allowed to view this page\");window.location=\"mainpage.php\";</script>";
  }

?>
	<title>Create Batch</title>
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

<div class="container">

<form action="#" method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">Batch ID</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="batchid" placeholder="Enter Batch ID">
    <small id="emailHelp" class="form-text text-muted">Make sure Batch ID is not duplicated.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Start Date</label>
    <input type="date" class="form-control" id="exampleInputPassword1" name="startdate">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">End Date</label>
    <input type="date" class="form-control" id="exampleInputPassword1" name="enddate">
  </div>

<label for="exampleInputPassword1">Faculty : &nbsp</label><select name="faculty" class="selectpicker">
        
          <?php

            $conn = mysqli_connect("localhost","root","","project");
            $sql = "select * from user order by firstname;";
            $result = mysqli_query($conn,$sql);
            while($row = mysqli_fetch_row($result)){
              echo "<div class=\"form-check\"><option value=\"".$row[2]."\">".$row[0]." ".$row[1]."(".$row[2].")</option></div>";
            }

          ?>
        </select><br><br>

  <button type="submit" class="btn btn-primary" name="sub">Submit</button>
</form>

</div>

</body>
</html>


<?php

if(isset($_POST['end'])){
	session_destroy();
	header("location:manageit.php");
}
if(isset($_POST['sub'])){
	$batchid=$_POST['batchid'];
	$startdate=$_POST['startdate'];
	$enddate=$_POST['enddate'];
	$faculty=$_POST['faculty'];

	$conn = mysqli_connect("localhost","root","","project");
	$sql = "insert into batch values('".$batchid."','".$startdate."','".$enddate."','".$faculty."');";
 	if(mysqli_query($conn,$sql)){
 		echo "<h3>Batch created successfully</h3>";
 	}else{
 		echo "<h3>Please enter different batch ID</h3>";
 	}

}
if(isset($_POST['home'])){
  header("location:mainpage.php");
}

?>
