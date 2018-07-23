<!DOCTYPE html5>
<html>
<head>
  <?php
  session_start();
if($_SESSION['username']==""){
  header('location:manageit.php');
}
?>
	<title>Add student</title>
     <link rel="stylesheet" type="text/css" href="bootstrap.min.css">
     <link rel="stylesheet" type="text/css" href="bootstrap-theme.min.css">
     <script type="text/javascript" src="bootstrap.min.js"></script>
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

<div class="jumbotron" style="text-align: center;">
	<div class="container">
	<h1>Manage<span style="color: red;">It</span></h1>
	<hr>
	<p>A website to manage students and fees details</p>
</div>
</div>

<div class="container">
<form action="#" method="post">
  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">First name</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputEmail3" name="firstname" placeholder="First name">
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Last name</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="lastname" id="inputPassword3" placeholder="Last name">
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Roll No.</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="rollno" id="inputPassword3" placeholder="Roll No.">
    </div>
  </div>
  <fieldset class="form-group">
    <div class="row">
      <legend class="col-form-label col-sm-2 pt-0">Course opted</legend>
      <div class="col-sm-10">
        <select name="course" class="selectpicker">
        
          <?php

            $conn = mysqli_connect("localhost","root","","project");
            $sql = "select * from course;";
            $result = mysqli_query($conn,$sql);
            while($row = mysqli_fetch_row($result)){
              echo "<div class=\"form-check\"><option value=\"".$row[0]."\">".$row[1]."</option></div>";
            }

          ?>
        </select>
      </div>
    </div>
  </fieldset>
  
  <div class="form-group row">
    <div class="col-sm-10">
      <input type="submit" name="sub" value="Add student" class="btn btn-primary">
    </div>
  </div>
</form>
</div>

</body>
</html>


<?php

if(isset($_POST['sub'])){
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$rollno = $_POST['rollno'];
  $course=$_POST['course'];
	//$totalfee

	$conn = mysqli_connect("localhost","root","","project");
  $sql2 = "select * from course where id = '".$course."'";
  $result=mysqli_query($conn,$sql2);
  $course_row = mysqli_fetch_row($result);
  $sql = "insert into student(firstname,lastname,roll,course,totalfee) values('".$firstname."','".$lastname."','".$rollno."','".$course."','".$course_row[2]."');";
 
 if(mysqli_query($conn,$sql)){
 	header('location:mainpage.php');
 }else{
 	echo mysqli_error($conn);
 }


}

if(isset($_POST['end'])){
  session_destroy();
  header("location:manageit.php");
}
if(isset($_POST['home'])){
  header("location:mainpage.php");
}

?>

