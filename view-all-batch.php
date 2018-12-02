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
<table class="table">
  <tr><th>Batch ID</th><th>Start Date</th><th>End date</th><th>Faculty</th></tr>
  

  <?php
    $conn = mysqli_connect("localhost","root","","project");
  $sql = "select * from batch;";
  $result = mysqli_query($conn,$sql);
  while ($row = mysqli_fetch_row($result)) {
    echo "<tr><td>".$row[0]."</td><td>".$row[1]."</td><td>".$row[2]."</td><td>".$row[3]."</td></tr>";
  }
  ?>

</table>


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