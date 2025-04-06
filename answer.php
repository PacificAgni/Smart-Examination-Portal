<?php 
 include_once 'logincheck.php';
 include_once 'dbconnection.php';
 $tid = $_REQUEST['testid'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/panel.css">
    <title>Document</title>
    <style>
       body{
    background-image: url('images/studentsign.jpg');
  background-size: cover;
    }
    .heading{
      font-weight:bold;
      color:white;
      font-size:3rem;
      width:100%;
      display:flex;
      justify-content:center;
      align-items:center;
    }
    .tablecont{
      /* border:solid black; */
      display:flex;
      justify-content:center;
      align-items:center;
    }
    table{
      border-radius:2rem;
        border-collapse: collapse;
    margin: 25px;
    font-family: sans-serif;
    min-width: 400px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.15)
        font-size:1.8rem;
        color:white;
        border:solid black;
    }
    table thead{
        font-size:1.2rem;
        border-bottom:solid black;
        background-color: #34568B;
    }
    table,th{
        padding:.4rem;
    }
    table tbody tr,tfoot{
      background-color:#4169E1;
      border-bottom:solid black;
    }
    table tbody tr td{
      padding-left:2rem;
      padding-right:2rem;
    align-items:center;
    }
    table,td {
      text-align:center;
        padding:.3rem;
        align-items:center;
  /* border:solid black;
  border-collapse: collapse; */
    }
    .left{
      position:absolute;
      left:1rem;
      width:3%;
      bottom:1rem;
    }
    .right{
      position:absolute;
  right:1rem;
  bottom:1rem;
    }
    tfoot{
      border-top:solid black .3rem;
      font-size:1.5rem;
      background-color: #34568B;
    }
    </style>

</head>
<body>
<?php 
$sql5="SELECT * FROM `answer` where `answer`.`testid`=$tid;";
$result5=mysqli_query($conn,$sql5);
$row5=mysqli_fetch_array($result5);
$head=$row5['student'];
$exams=$row5['exam'];
?>
<div class="heading"><?php echo $exams ?></div>
<div class="tablecont">
<table class="styled-table" id="">
  <thead>
    <tr>
      <th>Q.No</th>
      <th>Question</th>
      <th>Answered</th>
      <th>Correct</th>
      <th>Marks Obtained</th>
      <th>Maximum Marks</th>
    </tr>
  </thead>
  <tbody class="body" id="div<?php echo $tid[$sno];?>">
  <?php
  $sql1="SELECT * FROM `answer` where `answer`.`testid`=$tid;";
  $result1=mysqli_query($conn,$sql1);
  $sno=1;
  $totmrk=0;
  $mrkobt=0;
  while($row1=mysqli_fetch_array($result1)){
       $totmrk+=$row1['totmrk'];
       $mrkobt+=$row1['mrkob'];
    ?>
      <tr>
      <td><?php echo $sno?></td>
      <td><?php echo $row1['ques'] ?></td>
      <td><?php echo $row1['ans'] ?></td>
      <td><?php echo $row1['corr'] ?></td>
      <td><?php echo $row1['mrkob'];  ?></td>
      <td><?php echo $row1['totmrk'] ?></td>
    </tr>
    <?php 
    $sno+=1;
     }
     ?>    
  </tbody>
  <tfoot>
    <tr>
      <td>Total</td>
      <td></td>
      <td></td>
      <td></td>
      <td><?php echo $mrkobt ?></td>
      <td><?php echo $totmrk ?></td>
    </tr>
  </tfoot>
  </table>  
  </div>
  
  </div>
  <div class="btn left"><a href="myexams.php">BACK</a></div>
  <div class="btn right"><a href="logout.php">LOGOUT</a></div>


</body>
</html>