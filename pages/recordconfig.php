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
$country='';
$towns='';
$company_name='';
$email='';
$telephone='';
$owner='';
$adress='';
$website='';
$type='';





if(isset($_POST['save'])) {
    $country=$_POST['country'];
$towns=$_POST['towns'];
$company_name=$_POST['name'];
$email=$_POST['email'];
$telephone=$_POST['phone'];
$owner=$_POST['dm'];
$adress=$_POST['adress'];
$website=$_POST['website'];
$type=$_POST['type'];
$duplicate = false;

    $res=$mysqli -> query("SELECT COUNT(*) as count FROM records WHERE email = '$email'") or die(mysql_error());
    $data = $res->fetch_assoc();

    if ($data['count'] > 0) {
        echo "<script> alert('EMAIL ALREADY USED')</script>";
       
        $duplicate = true;
    }
else{ $mysqli -> query("INSERT INTO records(country,towns,company_name,email,telephone,owner,adress,website,type,id_staff) VALUES ('$country','$towns','$company_name','$email','$telephone','$owner','$adress','$website','$type',".$_SESSION['id'].")") or die($mysqli->error);
 

    echo "<script type='text/javascript'> 
    window.location.href ='records.php';
      </script>";
}  
}
if (isset($_GET['delete'])){
    $id=$_GET['delete'];
  
    $mysqli -> query("DELETE FROM records WHERE id=$id ") or die($mysqli ->error());


    echo "<script type='text/javascript'> 
            window.location.href ='records.php';
              </script>";
}
if (isset($_GET['edit'])){
    $id= $_GET['edit'];
    $update=true;
    $result= $mysqli->query("SELECT * FROM records WHERE id = $id ") or die($mysqli->error());
    if($result->num_rows==1){
        $row=$result->fetch_array();
        $id=$row['id'];
        $country=$row['country'] ;
        
        $towns=$row['towns'];
        $company_name=$row['company_name'];
        $email=$row['email'];
        $telephone=$row['telephone'];
        $adress=$row['adress'];
        $owner=$row['owner'];
        $website=$row['website'];
        $type=$row['type'];
    }
}
if (isset($_POST['update'])){
    $id=$_POST['id'];
    $country=$_POST['country'];
$towns=$_POST['towns'];
$company_name=$_POST['name'];
$email=$_POST['email'];
$telephone=$_POST['phone'];
$owner=$_POST['dm'];
$adress=$_POST['adress'];
$website=$_POST['website'];
$type=$_POST['type'];
$mysqli -> query("UPDATE records SET country='$country', towns='$towns',company_name='$company_name', email='$email', telephone='$telephone', adress='$adress', owner='$owner', website='$website', type='$type' WHERE id='$id';")or die($mysqli->error);
   
   
    echo "<script type='text/javascript'> 
            window.location.href ='records.php';
              </script>";
}


?>