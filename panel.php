<?php 
include_once 'logincheck.php';
include_once 'dbconnection.php';

if(isset($_SESSION['exm']))
{
    echo "SET";
    header("location:StudentMain.php");
}
// session_start();
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/panel.css">
    <title>Student Panel</title>
  </head>
  <body>
<?php
$nm="images1/".$_SESSION['sid'].".jpg";
$sql="INSERT into `var` VALUES('','$nm')" ;
$result=mysqli_query($conn,$sql);
?>
  <div class="welcome" style="text-align:center"> <h2> Welcome <br> <?php echo $_SESSION['usernm'];?> </h2> </div>
    <div class="container">
      <div class="Take_exam">
        <a href="facelogin.php"><p>Take Exam</p></a>
      </div>
      <div class="Marks para">
        <a href="myexams.php"><p>My Exams</p></a>
      </div>
      <!-- <div class="Ranking para">
        <a href="#"><p>Ranking</p></a>
      </div>
      <div class="Queries para">
        <a href="#"><p>Query</p></a>
      </div> -->
    </div>
    <button class="btn" type="button" name="button"><a href="logout.php">LOG OUT</a></button>
  </body>
</html>
