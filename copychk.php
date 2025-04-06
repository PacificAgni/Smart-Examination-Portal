<?php
// session_start();
include_once 'logincheck.php';
include_once 'dbconnection.php';
include_once 'left.php';
include_once 'forms.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style1.css">
    <link rel="stylesheet" href="css/style2.css">
    <style>
    .cont{
        width:100%;
        display:flex;
       flex-direction:column;
        margin:1rem;
        }
    .ques{
        font-size:1.5rem;
        margin:1rem;
        padding:2rem;
        border:solid black;
        border-radius:3rem;
        
    }
    input{
        padding:.5rem;
        border-radius:1rem;
    }
    .heading{
        font-size:2rem;
        padding:2rem;
        display:flex;
        justify-content:center;
        font-weight:bold;
        
        align-items:center;
    }
    .button{
        font-size:1.5rem;
        padding:1rem;
        position:absolute;
        left:50%;
    }

    </style>
    <title>Document</title>
</head>
<body>
<div class="cont">
<?php 
$testid=$_REQUEST['abc'];
$_SESSION['testid']=$testid;
$sno=1;
$sql="SELECT * FROM `answer` WHERE `answer`.`testid`=$testid";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($result); ?>

<div class="heading">Student Name:<?php echo $row['student'];?>   <br>
Exam Name:<?php echo $row['exam'];?> 
</div>
<form action="anschk.php" method="POST">
<div class="ques"> 
    Question<?php echo $sno; $sno+=1;?>: 
    <?php echo $row['ques'];?><br>
   Answered: <?php echo $row['ans'];?> <br>  
   Correct: <?php echo $row['corr'];?>  <br>
   Marks <input type="text" name="<?php echo $row['a.id']?>" required="required" placeholder="Enter marks" value="<?php echo $row['mrkob']?>">
   Total Marks: <?php echo $row['totmrk'];?> 
</div>
<?php
while($row=mysqli_fetch_array($result)){?>
 <div class="ques"> 
    Question<?php echo $sno;?>: 
    <?php echo $row['ques'];?><br>
   Answered: <?php echo $row['ans'];?> <br>  
   Correct: <?php echo $row['corr'];?>  <br>
   Marks <input type="number" min="0" max="<?php echo $row['totmrk'];?>" step=".01" name="<?php echo $row['a.id']?>" placeholder="Enter marks" required="required" value="<?php echo $row['mrkob']?>" style="width:8rem">
   Total Marks: <?php echo $row['totmrk'];?> 
</div>  
<?php
$sno+=1;
}
?>
<button type="submit" class="button">Checked</button>

</form>
</div>
<script>
// function check()
// {
//     <?php 
//     $sql4="UPDATE `answerid` SET `Status`='CHECKED' where `answerid`.`testid`=$testid";
//     $result4=mysqli_query($conn,$sql4);
//     ?>

console.log("Hello");
}
</script> 
</body>
</html>