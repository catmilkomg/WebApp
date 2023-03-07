<?php
session_start();

if(!isset($_SESSION["username"])){
    echo "<script type='text/javascript'> 
    window.location.href ='LOGINSTAFF.php';
      </script>";
}
$mysqli = new mysqli('localhost','root','','staff') or die(mysqli_error($mysqli));
$id=0;
$update=false;
$name='';
$phone='';
$email='';
$type='';
$username='';
$password='';

if(isset($_POST['save'])) {
   
$name=$_POST['name'];
$phone=$_POST['phone'];
$email=$_POST['email'];
$type=$_POST['type'];
$username=$_POST['username'];
$password=$_POST['password'];
$duplicate = false;
$res=$mysqli -> query("SELECT COUNT(*) as count FROM login WHERE username = '$username'") or die(mysql_error());
$data = $res->fetch_assoc();

if ($data['count'] > 0) {
    echo "<script> alert('USERNAME ALREADY IN USE')</script>";
   
    $duplicate = true;
}
else{


$mysqli -> query("INSERT INTO login(name,phone,email,type,username,password) VALUES ('$name','$phone','$email','$type','$username','$password')") or die($mysqli->error);
 
echo "<script type='text/javascript'> 
    window.location.href ='staff.php';
      </script>";
}
}/*
if (isset($_GET['edit'])){
    $id= $_GET['edit'];
    $update=true;
    $response= $mysqli->query("SELECT * FROM login WHERE id = $id ") or die($mysqli->error());
    if($response->num_rows>0){
        $row=$response->fetch_array();
        $id=$row['id'];
        
        $name=$row['name'] ;
        $phone=$row['phone'];
        $email=$row['email'];
        $type=$row['type'];
        $username=$row['username'] ;
        $password=$row['password'] ;   
    }
}
if (isset($_POST['update'])){
    $id=$_POST['id'];
   
    $name=$_POST['name'];
$phone=$_POST['phone'];
$email=$_POST['email'];
$type=$_POST['type'];
$username=$_POST['username'];
$password=$_POST['password'];
$mysqli -> query("UPDATE login SET password='$password',username='$username', name='$name', phone='$phone', email='$email', type='$type' WHERE id='$id';")or die($mysqli->error);
   
    echo "<script type='text/javascript'> 
            window.location.href ='staff.php';
              </script>";
}*/
?>