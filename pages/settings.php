<?php require_once'settingscon.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="icon" type="image/png" href="">
  <title>
   Settings
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="../assets/css/soft-ui-dashboard.css?v=1.0.3" rel="stylesheet" />
  <script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>
  
</head>
  <link href="style.css" rel="stylesheet" />
<body class="g-sidenav-show  bg-gray-100">
<?php

$mysqli = new mysqli('localhost','root','','staff') or die(mysqli_error($mysqli));
$response= $mysqli-> query("SELECT * FROM login")or die($mysqli->error);
/*
$name='';
$username='';
$password='';
$type='';*/?>


  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 " id="sidenav-main">
    <div class="sidenav-header">
      
      <a class="navbar-brand m-0"  target="_blank">
        <img src="../assets/img/logo-1.png" class="navbar-brand-img h-100" alt="main_logo">
        
      </a>
    </div>
   <!--item 1-->
   <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto  max-height-vh-100 h-100" id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link  active" href="../pages/dashboard.php">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fas fa-tachometer-alt text-lg opacity-10" aria-hidden="true" ></i>
                <title>shop </title>
                
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
<!--item 2-->
<hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto  max-height-vh-100 h-100" id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link  active" href="../pages/records.php">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="far fa-clipboard text-lg opacity-10" aria-hidden="true" ></i>
                <title>records </title>
                
            </div>
            <span class="nav-link-text ms-1">Records</span>
          </a>
        </li>
<!--item 3-->
<hr class="horizontal dark mt-0">
<div class="collapse navbar-collapse  w-auto  max-height-vh-100 h-100" id="sidenav-collapse-main">
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link  active" href="../pages/payment.php">
        <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
          <i class="fas fa-credit-card text-lg opacity-10" aria-hidden="true"></i>
            <title>pay </title>
            
        </div>
        <span class="nav-link-text ms-1">Payment</span>
      </a>
    </li>
    <?php if($_SESSION['type']=='admin'){ ?>
  <!--item 4-->
<hr class="horizontal dark mt-0">
<div class="collapse navbar-collapse  w-auto  max-height-vh-100 h-100" id="sidenav-collapse-main">
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link  active" href="../pages/staff.php">
        <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
          <i class="fas fa-users text-lg opacity-10" aria-hidden="true" ></i>
            <title>pay </title>
            
        </div>
        <span class="nav-link-text ms-1">STAFF</span>
      </a>
    </li>
    <hr class="horizontal dark mt-0">
<div class="collapse navbar-collapse  w-auto  max-height-vh-100 h-100" id="sidenav-collapse-main">
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link  active" href="../pages/settings.php">
        <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
          <i class="fas fa-cog text-lg opacity-10" aria-hidden="true" ></i>
            <title>pay </title>
            
        </div>
        <span class="nav-link-text ms-1">Settings</span>
      </a>
    </li>
    <?php } ?>
  </aside>
  <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
        <H4> <?= $_SESSION['name'] ?> </h4>
          <h6 class="font-weight-bolder mb-0">Settings</h6>
        </nav>
       
          <!--log out boutton-->
          <ul class="navbar-nav  justify-content-end">
            <li class="nav-item d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body font-weight-bold px-0">
                <i class="fa fa-user me-sm-1"></i>
                <span class="d-sm-inline d-none"><a  href="logout.php">Log Out</a></span>
              </a>
            </li>
          </ul>
        </div>
      </div>
      </nav>
    <div class="container-xl">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-4">
                      <h2> Accounts</h2>
                    </div>
                    <div class="col-sm-8">	
                      					
                    <!--<a href="#add" class="btn btn-secondary"><i class="fas fa-plus-circle">&#xE24D;</i> <span>Add Account</span></a> -->
                        
                    </div>
                </div>
            </div>

    <div style="overflow-x: auto;" id="myTable" >
    <form  action="settingscon.php">
            <table class="table table-striped table-hover" id="tbl_exporttable_to_xls"  >
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Username</th>
                        <th>Password</th>	
                        <th>Type</th>
                        <th>Options</th>					
                        
                    </tr>
                </thead>
                <?php  
        while($row=$response->fetch_assoc()): ?>

                <tbody>
               
               <tr>
           <td ><?php echo $row['name'];?></td>
            <td><?php  echo $row['username'];?></td>
            <td ><?php  echo $row['password'];?></td>
            <td ><?php  echo $row['type'];?></td>
               <td class="align-middle">
               
                           <p></p>
                           <p><a href="settings.php?edit=<?php echo $row['id'];?>#add" 
                           class="text-secondary font-weight-bold text-xs" 
                           data-toggle="tooltip" data-original-title="Edit user"><i class="fas fa-pencil-alt"></i>
                           Edit
                           </a></p> </td>
                           
       </tr>
               </tbody>
               <?php endwhile; ?>
               </table>
        </form>
            </div>
            </div>
        </div>        
    </div>  

    <?php if(isset($_GET["edit"])){ ?>
    <div class="container-xl"id="editDiv">
    <div class="table-responsive" >
        <div class="table-wrapper">
            <div id="add"class="table-title">
                <div class="row">
                    <div class="col-sm-4" >
                      <h2> Edit Account </h2>
                    </div>
                    <div class="col-sm-8">						
                        
                    </div>
                </div>
            </div>
    <div  >
    <?php
function pre_r($array){
    echo'<pre>';
    print_r($array);
    echo'</pre>';
}
?>   <div clas="row justify-content-center">
                  <form role="form" method="POST" action="settingscon.php" >
                  <input type="hidden" class="form-control" name="id" value="<?php echo $id; ?>">
                  
                    <label>Name</label>
                    <div class="mb-3">
                      <input  type="text" class="form-control" value="<?php echo $name; ?>"  name="name"  >
                    </div>
                    <label>Username</label>
                    <div class="mb-3">
                      <input type="text" name="username" value="<?php echo $username; ?>" class="form-control"   >
                    </div>

                    <label>Password</label>
                    <div class="mb-3">
                      <input type="text" class="form-control"  value="<?php echo $password; ?>" name="password"  >
                    </div>
                    <label>Type</label>
                    <div class="mb-3">
                      <input type="text" name="type" value="<?php echo $type; ?>" class="form-control"   >
                    </div>
                    <table>
                    <div class ="form-group">
   
                    <td>
<?php if($update==true):?>
<button type="submit" class="btn btn-primary" name="update">Update</button> 
<?php else :?>
    <button type="submit"  class="btn btn-primary" name="save">Save</button>
    <td>   
    <button type="reset" class="btn btn-primary" name="reset">Reset</button> 
    </td>
    <?php endif;?>
</td>
</div>
    </table> </form>
                </div>
                <?php } ?>
                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                  
                </div>
              </div>
            </div>
            
            </div>
          </div>
        </div>
      </div>
    </section>
</div></div></div>
<footer class="footer pt-3  ">
    <div class="container-fluid">
      <div class="row align-items-center justify-content-lg-between">
        <div class="col-lg-6 mb-lg-0 mb-4">
          <div class="copyright text-center text-sm text-muted text-lg-start">
            © <script>
              document.write(new Date().getFullYear())
            </script>,
            made with <i class="fa fa-heart"></i>
            for<a href="https://moogle.ma/"> Moogle Marketing.</a> 
          </div>
        </div>
      </div>
    </div>
  </footer>
</div>
</main>
</body>
</html>