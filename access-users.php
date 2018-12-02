<!DOCTYPE html>
<html>
<head><?php
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
<table class="table table-striped">
  <tr><th>Employee ID</th><th>Employee name</th><th>Admin</th></tr>

<?php

  $conn = mysqli_connect("localhost","root","","project");
  $sql = "select * from user;";
  $result = mysqli_query($conn,$sql);
  while ($row = mysqli_fetch_row($result)) {
    if($row[5]=='y'){
      $var="checked";
    }else{
      $var="";
    }
    echo "<tr><td>".$row[2]."</td><td>".$row[0]." ".$row[1]."</td><td><input type=\"checkbox\" value=".$row[2]." name=\"adm[]\" ".$var."></td></tr>";
  }

?>

</table>
<div style="text-align: center;"><input type="submit" name="sub" value="Submit" class="btn btn-danger"></div>
</form>


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

if(isset($_POST['sub'])){

  $conn2 = mysqli_connect("localhost","root","","project");
  $admins=$_POST['adm'];
  $sqlc="select * from user;";
  $resultc=mysqli_query($conn,$sqlc);
  while ($rowc = mysqli_fetch_row($resultc)) {
    if(in_array($rowc[2],$admins)){
      $sql2 = "update user set admin='y' where username='".$rowc[2]."';";
      if(mysqli_query($conn2,$sql2)){
        header('location:access-users.php');
      }else {
        echo mysqli_error($conn2);
      }
    }else{
      $sql2 = "update user set admin='n' where username='".$rowc[2]."';";
      if(mysqli_query($conn2,$sql2)){
        header('location:access-users.php');
      }else {
        echo mysqli_error($conn2);
      }
    }
  }
}




?>