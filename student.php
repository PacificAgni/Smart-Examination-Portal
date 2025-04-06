<?php
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true)
{
  header("location:index.php");
  exit;
}
?>
<?php
  include_once 'dbConnection.php';

  if(isset($_GET['delete'])){
    $sno = $_GET['delete'];
    $delete = true;
  $sql = "DELETE FROM `student` WHERE `S.ID` = $sno";
  $result = mysqli_query($conn, $sql);

  $sql1="DELETE FROM `answer` WHERE `S.ID`=$sno";
  $result1 = mysqli_query($conn, $sql1);

  $sql2="DELETE FROM `answerid` WHERE `s.id`=$sno";
  $result2 = mysqli_query($conn, $sql2);
}
//FORM 1
if($_SERVER['REQUEST_METHOD']=='POST'){
  if (isset($_POST['snoEdit'])){
    // Update the record
    $sno = $_POST["snoEdit"]; 
  $fname=$_POST["fnameEdit"];
  $lname=$_POST["lnameEdit"];
  $class=$_POST["ClassEdit"];
  $rollno=$_POST["RollnoEdit"];
  //SQL , , `Password`='$pass' , `Email`=$email
  $sql="UPDATE `student` SET `First Name`='$fname', `Last Name` ='$lname' ,`Class`='$class',`Roll No`='$rollno' WHERE `student`.`S.ID`= $sno";
  
  $result = mysqli_query($conn, $sql);
  if($result)
  {
    $update =true;
  }
  else{
    echo "We could not update the record successfully";
  }
}

else
{
  $fname=$_POST["fname"];
  $lname=$_POST["lname"];
  $class=$_POST["class"];
  $rollno=$_POST["rollno"];   
  //SQL Query
  $sql="INSERT INTO `student` ( `First Name`, `Last Name`, `Class`, `Roll No`) VALUES ( '$fname', '$lname', '$class', '$rollno')";
  $result = mysqli_query($conn, $sql);

  $sql2="SELECT * from `student` ORDER BY `S.ID` DESC LIMIT 1;";
   $result2=mysqli_query($conn, $sql2);
   $row=mysqli_fetch_assoc($result2);
   $sid=$row['S.ID'];

  $tmpName=$_FILES["image"]["tmp_name"];
    $imageName=$sid.".jpg";
    move_uploaded_file($tmpName,'Images1/'.$imageName);
    
    $sql3="UPDATE `student` SET `imgurl`='$imageName' where `student`.`S.ID`=$sid";
    $result3 = mysqli_query($conn, $sql3);
      
  if($result){ 
    header("location:student.php");
  }
  else{
    echo "The record was not inserted successfully because of this error ---> ". mysqli_error($conn);
  } 
}
}
include_once 'forms.php';
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <link rel="stylesheet" href="css/style1.css">
  <link rel="stylesheet" href="css/style2.css">
  <link rel="stylesheet" href="css/style3.css">
  <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&family=Josefin+Sans:wght@100;400&display=swap" rel="stylesheet">
  <meta charset="utf-8">
  <script src="javascript/script.js"></script>
  <title>Smart Exam Portal</title>
<style>
table{
  border-collapse: collapse;
}
table tbody tr{
  border-bottom:solid black;
}
</style>
</head>
<body>

<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editModalLabel">Edit the Details</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form action="student.php" method="POST">
          <div class="modal-body">
            <input type="hidden" name="snoEdit" id="snoEdit">
            <div class="form-group">
              <label for="fname">First Name</label>
              <input type="text" class="form-control" id="fnameEdit" name="fnameEdit" >
            </div>

            <div class="form-group">
              <label for="lname">Last Name</label>
              <input type="text" class="form-control" id="lnameEdit" name="lnameEdit" rows="3"></input type="text">
            </div> 
            <div class="form-group">
            <label for="class">Class</label>
              <input type="text" class="form-control" id="ClassEdit" name="ClassEdit" rows="3"></input type="text">
            </div>
            <div class="form-group">
            <label for="Roll No">Roll No</label>
              <input type="text" class="form-control" id="RollnoEdit" name="RollnoEdit" ></input type="text">
            </div>
           

          </div>
          <div class="modal-footer d-block mr-auto">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
        </form>
      </div>
    </div>
  </div>


<?php include_once 'left.php'?>

 <div class="right">
 <div class="rightcont">
     <div class="heading"><h1 style="font-size:4rem;font-weight:bold">STUDENTS</h1></div>
<div class="tablecont">     
<table class="" id="myTable" style="color:black">
  <thead>
    <tr>
      <th>S.No</th>
      <th>S.ID</th>
      <th>First Name</th>
      <th>Last Name </th>
      <th>Class </th>
      <th>Roll No</th>
      <th>Image</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
  <?php
     $sql="SELECT * FROM `student`";
     $result=mysqli_query($conn,$sql);
     $sno=1;
     while($row=mysqli_fetch_array($result)){?>
      <tr>
      <td><?php echo $sno ?></td>
      <td><?php echo $row['S.ID'] ?></td>
      <td><?php echo $row['First Name'] ?></td>
      <td><?php echo $row['Last Name'] ?></td>
      <td><?php echo $row['Class'] ?></td>
      <td><?php echo $row['Roll No'] ?></td>

       <td><img src="images1/<?php echo $row['imgurl'] ?>" alt="" style="height:4rem;width:4rem;"> </td> 
      <td> <button id="" class="edit button">EDIT</button> <button class="button delete ">DELETE</button></td>
    </tr>
    <?php
    $sno+=1;
     } 
     ?> 
  </tbody>

</table> 
</div>
</div>
</div>
<?php include_once 'rightdash.php' ?>
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
<script src="javascript/script.js"></script>
<!-- <script src="javascript/modal.js"></script> -->
<script>
edits = document.getElementsByClassName('edit');
    Array.from(edits).forEach((element) => {
      element.addEventListener("click", (e) => {
        console.log("edit");
        tr = e.target.parentNode.parentNode;
        fname = tr.getElementsByTagName("td")[2].innerText;
        lname = tr.getElementsByTagName("td")[3].innerText;
        Class=tr.getElementsByTagName("td")[4].innerText;
        Rollno=tr.getElementsByTagName("td")[5].innerText;
        console.log(fname, lname,Class,Rollno);
        fnameEdit.value = fname;
        lnameEdit.value = lname
        ClassEdit.value=Class;
        RollnoEdit.value=Rollno;
        snoEdit.value = tr.getElementsByTagName("td")[1].innerText;
        console.log(tr.getElementsByTagName("td")[1].innerText);
        console.log(e.target.id);
        $('#editModal').modal('toggle');
      })
    })

    deletes = document.getElementsByClassName('delete');
    Array.from(deletes).forEach((element) => {
      element.addEventListener("click", (e) => {
        console.log("edit");
        tr = e.target.parentNode.parentNode;

        sno = tr.getElementsByTagName("td")[1].innerText;
        console.log(sno);

        if (confirm("Are you sure you want to delete this note!")) {
          console.log("yes");
          window.location = `student.php?delete=${sno}`;
          // TODO: Create a form and use post request to submit a form
        }
        else {
          console.log("no");
        }
      })
    })
</script>
</body>
</html>
