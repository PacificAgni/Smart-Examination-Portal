<?php
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true)
{
  header("location:index.php");
  exit;
}

include_once 'dbConnection.php';

  
  $_SESSION['msg']=false;
if(isset($_GET['delete'])){
  $sno = $_GET['delete'];
  $delete = true;
  $sql = "DELETE FROM `teacher` WHERE `sno` = $sno";
  $result = mysqli_query($conn, $sql);
}

//FORM 1
if($_SERVER['REQUEST_METHOD']=='POST'){
  if (isset( $_POST['snoEdit'])){
    // Update the record
  $sno = $_POST["snoEdit"]; 
  $fname=$_POST["fnameEdit"];
  $lname=$_POST["lnameEdit"];
  $pass=$_POST["passwordEdit"];
  $email=$_POST["EmailEdit"];
  //SQL , , `Password`='$pass' , `Email`=$email
  $sql="UPDATE `teacher` SET `First Name`='$fname', `Last Name` ='$lname' ,`Password`='$pass',`Email`='$email' WHERE `teacher`.`sno`= $sno";

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
  $sql1 = "SELECT * FROM teacher WHERE `Email`='{$_POST["email"]}'";
  $result1 = mysqli_query($conn,$sql1) or die("Query unsuccessful") ;
  if (mysqli_num_rows($result1) > 0) {
  $_SESSION['msg']= "Username already exits";
  }
    else{
      $_SESSION['msg']="Record Added";
  $fname=$_POST["fname"];
  $lname=$_POST["lname"];
  $pass=$_POST["psw"];
  $email=$_POST["email"];
  //SQL Query
    $sql="INSERT INTO `teacher` ( `First Name`, `Last Name`, `Password`, `Email`) VALUES ( '$fname', '$lname', '$pass', '$email')";
    $result = mysqli_query($conn, $sql);
    if($result){ 
      header("location:teacher.php");
       }
   else{
      echo "The record was not inserted successfully because of this error ---> ". mysqli_error($conn);
      } 
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
  <link rel="stylesheet" href="css/style4.css">
  <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="stylesheet" href="css/style3.css">
  <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&family=Josefin+Sans:wght@100;400&display=swap" rel="stylesheet">
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  
  <title>Teachers</title>
<style>
  .message{
    width:90%;
  }
</style>
</head>
<body>
<!-- Edit Modal -->
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
        <form action="teacher.php" method="POST">
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
            <label for="password">Password</label>
              <input type="text" class="form-control" id="passwordEdit" name="passwordEdit" rows="3"></input type="text">
            </div>
            <div class="form-group">
            <label for="email">Email</label>
              <input type="text" class="form-control" id="EmailEdit" name="EmailEdit" ></input type="text">
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
<div class="message"><marquee><?php echo $_SESSION['msg'] ?></marquee></div>
     <div class="heading"><h1 style="font-size:4.5rem;font-weight:bold">TEACHERS</h1></div>
     <div class="tablecont">
<table class="" id="myTable" style="color:black">
  <thead>
    <tr>
      <th>S.No</th>
      <th>T.ID</th>
      <th>First Name</th>
      <th>Last Name</th>
      <th>Password</th>
      <th>E-Mail</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
  <?php
     $sql="SELECT * FROM `teacher`";
     $result=mysqli_query($conn,$sql);
     $sno=1;
     while($row=mysqli_fetch_array($result)){?>
      <tr>
      <td><?php echo $sno?></td>
      <td><?php echo $row['sno'] ?></td>
      <td><?php echo $row['First Name'] ?></td>
      <td><?php echo $row['Last Name'] ?></td>
      <td><?php echo $row['Password'] ?></td>
      <td><?php echo $row['Email'] ?></td>
      <td> <button id="" class=" button edit">EDIT</button> <button class=" button delete ">DELETE</button></td>
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
        password=tr.getElementsByTagName("td")[4].innerText;
        email=tr.getElementsByTagName("td")[5].innerText;
        console.log(fname, lname,email);
        fnameEdit.value = fname;
        lnameEdit.value = lname
        passwordEdit.value=password;
        EmailEdit.value=email;
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
          window.location = `teacher.php?delete=${sno}`;
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
