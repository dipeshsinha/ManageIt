<!DOCTYPE html>
<html>
<head><?php
  session_start();
if($_SESSION['username']==""){
  header('location:manageit.php');
}
?>
	<title>Update Batch</title>
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

<form action="#" method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">First name</label>
    <input type="text" class="form-control" id="exampleInputEmail1"  placeholder="Enter first name" name="firstname">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Last name</label>
    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Enter last name" name="lastname">
  </div>
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
  <button type="submit" class="btn btn-primary" name="sub">Submit</button>
</form>



</body>
</html>


<?php

if(isset($_POST['end'])){
  session_destroy();
  header("location:manageit.php");
}

if(isset($_POST['sub'])){
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $course=$_POST['course'];
  $roll = $_REQUEST['var'];

  $conn = mysqli_connect("localhost","root","","project");
  $sql2 = "update student set firstname='".$firstname."',lastname='".$lastname."',course='".$course."' where roll = '".$roll."';";
  if(mysqli_query($conn,$sql2)){
    echo "<h3>Student info updated</h3>";
  }else{
    echo "<h3>Not updated, error occured</h3>";
  }

}

if(isset($_POST['home'])){
  header("location:mainpage.php");
}

?>