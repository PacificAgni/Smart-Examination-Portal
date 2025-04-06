<?php
session_start();
include_once 'dbconnection.php';
include_once 'forms.php';
include_once 'left.php';
?>
<?php

// echo $tid;
$mrks=0;
if($_SERVER['REQUEST_METHOD']=='POST'){
$sql="SELECT * FROM `answer`";
$result=mysqli_query($conn,$sql);
while($row=mysqli_fetch_array($result)){
    $chk=$row['a.id'];
    if(isset($_POST[$chk]))
    {
    $mrk=$_POST[$chk];
    $mrks+=$mrk;
    $sql="UPDATE `answer` SET `mrkob`=$mrk where `answer`.`a.id`=$chk";
    $result1 = mysqli_query($conn, $sql);
  }

    }
    $tid=$_SESSION['testid'];
    $sql="UPDATE `answerid` SET `Marks`=$mrks where `answerid`.`testid`=$tid";
    $result1 = mysqli_query($conn, $sql);
}
// echo $mrks;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="css/style1.css">
    <link rel="stylesheet" href="css/style2.css">
    <link rel="stylesheet" href="css/style3.css">
    <link rel="stylesheet" href="css/style4.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  
    <title>Document</title>
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Anton&display=swap');
   .cont button{
       border-radius:2rem;
       display:flex;
        padding:.7rem;
        margin:.5rem;
        background:transparent;
        border:solid white;

    }
    .cont{
        display:flex;
        justify-content:center;
        align-items:center;
        width:86vw;
        /* border:solid black; */
        position:absolute;
        left:12%;
        top:30%;
        
    }
    /* table{
        border-collapse: collapse;
    margin: 25px;
    font-family: sans-serif;
    min-width: 400px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.15)
        font-size:1.8rem;
        color:black;
    }
    table thead{
        font-size:1.2rem;
        border-bottom:solid black;
        background-color:blue;
    }
    table,th{
        padding:.4rem;
        border:solid black 2px;
        text-align:center;
        border-collapse: collapse;
    }
    table, td {
        padding:.3rem;
        align-items:center;
  border:solid black 2px;
  border-collapse: collapse;
}
    table tbody{
        font-size:1rem;
        padiding:2rem;
    }
    table tr{

    }
*/
    .cont button:hover{
        background-color:green;
    }
    .heading{ 
        display:flex;
        jusitfy-content:center;
        align-items:center;
        font-size:2.6rem;
        font-family: 'Anton';
        padding:2rem;
        width:100%;
        height:10%;
       
    }
    
    table,td{
        text-align:center;
    }
    
    </style>
</head>
<body>
    <div class="heading"><p style="font-size:4rem;font-weight:bold">MARKSHEETS</p></div>
    <div class="cont">
    <?php
    $sno=1;
    $sql="SELECT * FROM `answerid` where `answerid`.`status`='CHECKED'";

    $result = mysqli_query($conn, $sql);?>
    <form action="copychk.php" method="POST">
    <table id="myTable" style="color:black;border:solid black">
    <thead>
    <tr>
    <th>S.No</th>
    <th>CopyID</th>
    <th>Student Name</th>
    <th>Exam Name</th>
    <th>Marks Obtained</th>
    <th>Max Marks</th>
    <th>Date</th>
    </tr>
    </thead>
    <tbody>
    <?php while($row=mysqli_fetch_array($result)){?>
    <tr> 
    <td><?php echo $sno;?></td>
    <td><?php echo $row['testid']?></td>
    <td><?php echo $row['Student Name'];?></td>
    <td><?php echo $row['Exam Name']; ?></td>
    <td><?php echo $row['Marks'];?></td>
    <td><?php echo $row['MaxMarks'];?></td>
    <td><?php echo $row['Date'];?></td>
    </tr>

        <?php
    $sno+=1; 
    }
      ?>   
      </tbody>
      </table>
        </form> 
        </div>
       <?php include_once 'rightdash.php' ?>
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