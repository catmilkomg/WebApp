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
$username='';
$password='';
$type='';


/*if(isset($_POST['save'])) {
$username=$_POST['username'];
$password=$_POST['password'];
$name=$_POST['name'];
$type=$_POST['type'];
$res=$mysqli -> query("SELECT COUNT(*) as count FROM login WHERE username = '$username'") or die(mysql_error());
$data = $res->fetch_assoc();

if ($data['count'] > 0) {
    echo "<script> alert('USERNAME ALREADY IN USE')</script>";
   
    $duplicate = true;
}
else{
    $mysqli -> query("INSERT INTO login(username,password,name,type) VALUES ('$username','$password','$name','$type')") or die($mysqli->error);
 

    echo "<script type='text/javascript'> 
    window.location.href ='settings.php';
      </script>";

}
}*/

if (isset($_GET['edit'])){
    $id= $_GET['edit'];
    $update=true;
    $response= $mysqli->query("SELECT * FROM login WHERE id = $id ") or die($mysqli->error());
    if($response->num_rows==1){
        $row=$response->fetch_array();
        $id=$row['id'];
        $username=$row['username'] ;
        $password=$row['password'];
        $name=$row['name'];
        $type=$row['type'];
       
    }
}
if (isset($_POST['update'])){
    $id=$_POST['id'];
    $username=$_POST['username'];
$password=$_POST['password'];
$name=$_POST['name'];
$type=$_POST['type'];

$mysqli -> query("UPDATE login SET username='$username', password='$password', name='$name', type='$type' WHERE id='$id';")or die($mysqli->error);
   
   
    echo "<script type='text/javascript'> 
            window.location.href ='settings.php';
              </script>";
}
?>