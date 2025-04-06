<?php
include_once 'navbar.php';
include_once 'dbconnection.php';
session_start();
if(isset($_SESSION['exm']))
{
    echo "SET";
    header("location:StudentMain.php");
}
$login=false;
$error=false;
if($_SERVER["REQUEST_METHOD"]=="POST"){

  $user=$_POST['user'];
  $password=$_POST['password'];
  $sql="Select * from student where `First Name`='$user' AND `S.ID`='$password' ";
  $result=mysqli_query($conn,$sql);
  $num=mysqli_num_rows($result);
  if($num==1){
    $row=mysqli_fetch_array($result);
    $login=true;
    session_start();
    $_SESSION['loggedin']=true;
    $_SESSION['usernm']=$row['First Name']." ".$row['Last Name'];
    $_SESSION['sid']=$row['S.ID'];
    header("location:panel.php");
  }
  else{
    $error="INVALID USERNAME OR PASSWORD";
  }
}
  ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Student Login</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="css/teach_and_student_sign.css">
  <link rel="shortcut icon" href="images/stud_fav.ico">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Acme&family=Roboto+Serif:opsz,wght@8..144,700&display=swap"
    rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Alegreya+Sans&display=swap" rel="stylesheet">
<script src="javascript/script.js"></script>
  <style media="screen">
    body {

    }
    .error{
      display:flex;
    position:fixed;
    top: 20%;
    left:37%;
    color:black;
    font-weight:bold;
    border-radius: 1rem;
    padding:1rem;
  }
  </style>
</head>

<body class="student_body">
  <div class="main">
    <div class="sign-in">
      <h1>Sign in</h1>
      <h3>Hey Student, Kindly Login to start your exam. Good Luck</h3>
      <form class="box" action="studntsign.php" method="post">
        <input class="name" type="text" name="user" value="" placeholder="Username"><br>
        <input class="name" type="password" name="password" placeholder="Password" id="pass" value=""> <br>
        <label class="contain">
          <input type="checkbox" checked="checked">
          <span class="checkmark"></span>
          Remember me</label>
          <input type="checkbox" id="checkbox" onclick="myFunction()">Show Password <br><br>
        <input class="btn" type="submit" name="submit" value="Login">
      </form>
    </div>
  </div>
  <div class="error">
  <marquee style="color:red"><?php
    if($error)
    {
      echo $error;
    }
    ?></marquee>
    </div>
    <script src="javascript/index.js"></script>
    <script src="javascript/script.js"></script>
</body>

</html>
