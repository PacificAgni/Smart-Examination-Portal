<?php

$conn=mysqli_connect("localhost:3307","root","","Face Login");

if(isset($_FILES["webcam"]["tmp_name"])){
    $tmpName=$_FILES["webcam"]["tmp_name"];
    $imageName='Compare.jpg';
    move_uploaded_file($tmpName,'images1/'.$imageName);

    $date=date("Y/m/d")."&".date("h:i:sa");
    $query="INSERT INTO image VALUES('','$date','$imageName')";
    mysqli_query($conn,$query);

}