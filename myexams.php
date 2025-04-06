<?php
  //  session_start();
  include_once 'logincheck.php';
  include_once  'dbconnection.php';
  
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/myexam.css">
    <link rel="stylesheet" href="css/panel.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <title>Document</title>

    <style>
    body{
    background-image: url('images/studentsign.jpg');
  background-size: cover;
    }
    .heading{
      font-weight:bold;
      color:white;
      font-size:2rem;
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
        border-collapse: collapse;
    margin: 25px;
    font-family: sans-serif;
    min-width: 400px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.15)
        font-size:1.8rem;
        color:white;
    }
    table thead{
        font-size:1.2rem;
        border-bottom:solid black;
        background-color: #34568B;
    }
    table,th{
        padding:.4rem;
        border-bottom:solid black;
    }
    table,td {
      border-bottom:solid black;
        padding:.5rem;
        text-align:center;
        align-items:center;
        
  /* border:solid black;
  border-collapse: collapse; */
}
    table tbody {
      background-color:#4169E1;
      border-bottom:solid black;
    }
    table,tr{
     border-bottom:solid black;
     text-align:center;
    }
button{
  background:transparent;
  border:solid white .15rem;
  border-radius:1rem;
}
button:hover{
  background-color:white;
}
    table tbody{
        font-size:1rem;
        padiding:2rem;
    }
    .left{
      position:absolute;
      width:3%;
      left:1rem;
      bottom:1rem;
    }
    .right{
      position:absolute;
      right:1rem;
      bottom:1rem;
    }
    .button{
      bottom:2em;
      font-size:1rem;
    }
  .button a{
    margin:.3rem;
    color:white;
    text-decoration:none;
    font-size:1.5rem;
    border:solid white;
    border-radius:2rem;
  }
.button a:hover{
  background-color:black;
  border:solid black;
}    

     </style>
</head>
<body>
<div class="heading"><h1>My Examinations</h1></div>
     <div class="tablecont">
  <form action="answer.php" method="POST">
<table  id="myTable">
  <thead>
    <tr>
      <th>S.No</th>
      <th>Exam</th>
      <th>Marks Obatined</th>
      <th>Max Marks</th>
      <th>Date</th>
      <!-- <th>TestId</th> -->
      <th>Answersheet</th>
    </tr>
  </thead>
  <tbody>
  <?php
     $sid=$_SESSION['sid'];
     $sql="SELECT * FROM `answerid` WHERE (`answerid`.`s.id`=$sid and `answerid`.`status`='CHECKED' and `answerid`.`Marks` IS NOT NULL)";
     $result=mysqli_query($conn,$sql);
     $sno=1;
     while($row=mysqli_fetch_array($result)){
         $tid[$sno]=$row['testid'];
         ?>
      <tr>
      <td><?php echo $sno?></td>
      <td><?php echo $row['Exam Name'] ?></td>
      <td><?php echo $row['Marks']?></td>
      <td><?php echo $row['MaxMarks']?></td>
      <td><?php echo $row['Date']?></td>
      <!-- <td><?php echo $row['testid'] ?></td> -->
      <td>
      <button type="radio" id="<?php echo $row['testid'];?>" name="testid" value="<?php echo $row['testid'];?>">OPEN ANSWERSHEET</button>
    </td>
     </tr>
    <?php 
    $sno+=1;
     }
     ?>    
  </tbody>
  </table>  
</form>
  </div>
  <div class="btn left"><a href="panel.php">BACK</a></div>
  <div class="btn right"><a href="logout.php">LOGOUT</a></div>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
    crossorigin="anonymous"></script>
  <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  <script>
  $(document).ready( function () {
    $('#myTable').DataTable();
} ); </script>

</body>
</html>