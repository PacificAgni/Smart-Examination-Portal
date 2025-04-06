<?php

include_once 'logincheck.php';
include_once 'dbConnection.php';

if(isset($_SESSION['exm']))
{
    echo "SET";
    header("location:StudentMain.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/studentexam.css">
    <style>
    body{
      width: 100%;
  height: 100vh;
  background-image: linear-gradient(rgba(27, 64, 70, 0.76),rgba(0,0,0,0.75)),url("images/bg.jpg");
  background-size: 1400px 800px;
  background-position: center;
     color:white;
    }
    .exam{
    padding:2rem;
    font-size: 2.5rem;
    display:flex;
    justify-content:center;
    font-weight:bold;
}

button{
    background:transparent;
    border:none;
    align-items:center;
}
    </style>
</head>
<body>
   
   <div class="exam">Select Your Exam</div>
   <div class="form">
   <form action="StudentMain.php" method="POST">
   <?php
   $sql="SELECT * FROM `exam` where `exam`.`status`='1'";
   $result=mysqli_query($conn,$sql);
   while($row=mysqli_fetch_array($result)){?>
   <div class="sel">
   <button type="radio" id="<?php echo $row['Name'];?>" name="ques" value="<?php echo $row['E.ID'];?>">
    <label for="<?php echo $row['Name']?>"><?php echo $row['Name']?></label><br>
    </div>
<?php
   }
   ?>
   <input type="submit" value="Submit" class="button" >
   </form>
   </div>
</body>
</html>