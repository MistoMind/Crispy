<?php
session_start();
require("dbconnect.php");

$name=$_POST['username'];
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$age=(int)$_POST['age'];
$gender=$_POST['gender'];
$email=$_POST['email'];
$upassword=$_POST['password'];
$address=$_POST['address'];
$phone=$_POST['phonenumber'];

$q="SELECT * FROM users WHERE username = '$name'";
$result=mysqli_query($conn,$q);
if(mysqli_num_rows($result)>0){
    // echo "Already found a record";
    // while($row = mysqli_fetch_assoc($result))
    //     echo $row['username'];
    header("Location: ../signup.php");     //redirecting to same page
}
else{
    $q="INSERT INTO users(username,fname,lname,age,gender,email,password,address,phonenumber) VALUES('$name','$fname','$lname','$age','$gender','$email',SHA2('$upassword',256),'$address','$phone')";
    echo "After inserting into the table<br>";
    echo $q;
    $result=mysqli_query($conn,$q);
    header("Location: ../login.php");     //redirecting to login page
}
?>