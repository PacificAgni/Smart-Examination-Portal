<?php
include_once 'logincheck.php';
include_once 'dbConnection.php';

$sql="DELETE FROM `var`";
$result=mysqli_query($conn,$sql);
$max=sizeof($_SESSION['queslist']);
    //  for($i=0;$i<$max;$i++)
    //  {
    //    echo 'Ques'.$i.' '.$_SESSION['queslist'][$i].'<br>';
    //   }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/Check.css">
    <style>
body{
    width: 100%;
  height: 100vh;
  background-image: linear-gradient(rgba(27, 64, 70, 0.76),rgba(0,0,0,0.75)),url("images/submit.jpg");
  opacity:100%;
  background-size: 1400px 800px;
  background-position: center;
    color:white;
}

       .output{  
           display:flex;
          justify-content: center;
          align-items: center;
          position: absolute;
          top:30%;
          left:25%;
          border: solid grey;
          padding:3rem;
          border-radius: 5rem;
          
          font-size:2rem;
       }
    .msg{
        display:flex;
          justify-content: center;
          align-items: center;
          position:absolute;
          top:50%;
          left:30%;
         
          padding:3rem;
          border-radius: 5rem;
          
          font-size:2rem; 
    }
       .btn-open{
           color:white;
           border-radius: 100px;
           font-size: 15px;
           position: absolute;
           
           right: 70px;
           bottom: 50px;
           background: none;
           border: none;
           line-height: 1;
           font: inherit;
           padding: 1em 2em;
           margin: 0.5em;
           transition:  0.2s linear;
           }
       .btn-open:hover{
        font-weight: bold;
  border:2px solid white;
  box-shadow: 5px 5px 2px rgba(0, 0, 0, 0.2);
}
</style>
</head>
<body>
<?php

  $eid= $_SESSION['QID'];
//   echo $eid;
  $usernm=$_SESSION['usernm'];
  $exam=$_SESSION['exam'];
  $sid=$_SESSION['sid'];
//   echo "Usename=".$usernm;
//   echo  "Exam Name".$exam;
//   echo "Student ID".$sid;
  
  $ans=0;
  $maxmrks=0;
  $sql1="SELECT * FROM `answer`";
  $result1=mysqli_query($conn,$sql1);
  while($row1=mysqli_fetch_array($result1))
  {
      $ans+=1;
    }
    $sql="SELECT * FROM `question` where `question`.`E.ID`='$eid'";
    $result=mysqli_query($conn,$sql);
    $sno=1;
    $count=0;
    while($row=mysqli_fetch_array($result)){
            for($i=0;$i<$max;$i++)
            {
        if($row['Q.ID']==$_SESSION['queslist'][$i])
        {
            $ques=$row['Ques'];
            if(isset($_REQUEST[$row['Q.ID']]))
            {
            $ans1=$_REQUEST[$row['Q.ID']];
            }
            else{
                $ans1="Not Answered";
            }
            // echo $ans1;
            $corr=$row['Corr'];
            $total=$row['Marks'];
            $maxmrks+=$total;
            $chk=0;
            if($ans1==$row['Corr'])
            {
            $count++;
            $chk=$total;
            }
            
            $sql2="INSERT INTO `answer` ( `student`, `S.ID`, `exam`, `ques`,`ans`,`corr`,`mrkob`,`totmrk`,`testid`) VALUES ( '$usernm', '$sid', '$exam', '$ques','$ans1','$corr','$chk','$total','$ans');";
            $result2 = mysqli_query($conn, $sql2);
        }//if
        }//forloop 
           }//whileloop
      
    
    //  echo $ans;
    $bajrang=1;
    $sql4="SELECT * FROM `question1` where `question1`.`E.ID`='$eid'";
$result4=mysqli_query($conn,$sql4);  
while($row4=mysqli_fetch_array($result4)){
    for($i=0;$i<$max;$i++)
    {
    if($_SESSION['queslist'][$i]==$row4['Q.ID'])
    {
    // echo $bajrang;
    $bajrang+=1;
    $ques=$row4['Ques'];
    // echo $ques . " " ;
    $qid=$row4['Q.ID'];
    $answer="Not Answered";
    if(isset($_POST["$qid"]) && !empty($_POST["$qid"]))
    {
    $answer=$_POST["$qid"];
    // echo "The Qid is".$_POST["$qid"];
    // echo "The Answer is".$answer."<br>";
    }
    // if(isset($answer))
    // {
    //   echo $answer;
    // }
    // else
    // {
    //     $answer="Not Answered";
    // }
    // echo $answer ."<br>";
    $corr=$row4['Ans'];
    $total=$row4['Marks'];
    $maxmrks+=$total; 
    //  echo $qid . " " ;
    //  echo $corr ." ";
    //  echo $answer . " ";
    //  echo $total ."<br>";
     $sql5="INSERT INTO `answer` ( `student`, `S.ID`, `exam`, `ques`,`ans`,`corr`,`totmrk`,`testid`) VALUES ( '$usernm', '$sid', '$exam', '$ques','$answer','$corr','$total','$ans');";

    $result5 = mysqli_query($conn, $sql5);
    // if($result5){ 
        //           echo "Inserted";
        //            }
        //       else{
            //           echo "The record was not inserted successfully because of this error ---> ". mysqli_error($conn);
            //           } 
            
            
        }
    }
}
        //     if($result3){ 
            //       echo "Inserted Test ID";
            //        }
            //   else{
    //       echo "The TestID record was not inserted successfully because of this error ---> ". mysqli_error($conn);
    //       }
       // echo $ques." ".$ans1."<br>";
        // echo "Maximum Marks ".$maxmrks;
        $sql3="INSERT INTO `answerid` (`testid`,`Exam Name`,`s.id`,`Student Name`,`MaxMarks`) VALUES('$ans','$exam','$sid','$usernm','$maxmrks');";
        $result3 = mysqli_query($conn, $sql3);
    //     if($result2){ 
    //       echo "Inserted";
    //        }
    //   else{
        //       echo "The record was not inserted successfully because of this error ---> ". mysqli_error($conn);
        //       } 
        
        //      echo $row['Ques']." ".$_REQUEST[$row['Q.ID']]."<br>";
        
        // echo  $sid."<br>";
        // echo  $usernm."<br>";
        // echo  $exam ."<br>"; 
        // echo $_SESSION['questions'] ."<br>";
        // echo $_SESSION['marks'] ."<br>";
        // echo $_SESSION['questions']*$_SESSION['marks'] ."<br>";
        // $marks=$_SESSION['marks'] ."<br>";
        // $got=$count*$_SESSION['marks'] ."<br>";
        // $sql="INSERT INTO `marks` (`Student`, `S.ID`, `Exam`, `Marks`, `Total`) VALUES ('$usernm', '$sid', '$exam', '$got', '$marks')";
        // $result = mysqli_query($conn, $sql);
        //   if($result){ 
            //     echo "Inserted";
            //      }
            // else{
                //     echo "The record was not inserted successfully because of this error ---> ". mysqli_error($conn);
                //     } 

    ?>

     <div class="output">YOUR FORM HAS BEEN SUBMITTED
     </div>
     <div class="msg">We Wish you good grades!!!!!!</div>
     <button type="button" name="button" class="btn-open" onclick="location.href='logout.php'">LOG OUT</button>

<?php session_unset(); ?>
</body>
</html>