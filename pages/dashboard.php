<!--
=========================================================
* Soft UI Dashboard - v1.0.3
=========================================================

* Product Page: https://www.creative-tim.com/product/soft-ui-dashboard
* Copyright 2021 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)

* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<?php require_once'recordconfig.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="icon" type="image/png" href="">
  <title>
  Dashboard
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
  <link href="style.css" rel="stylesheet" />
</head>

<body class="g-sidenav-show  bg-gray-100">

</div>

        <?php

$mysqli = new mysqli('localhost','root','','staff') or die(mysqli_error($mysqli));
if($_SESSION['type']=='admin'){
$result= $mysqli-> query("SELECT * FROM records")or die($mysqli->error);

$total_query = $mysqli->query("SELECT count(id) as mycount from records");
$total = $total_query->fetch_assoc();

$totalStaff_query=$mysqli->query("SELECT count(id) as mycount from login");
$totalStaff =$totalStaff_query->fetch_assoc();

$myRecords_query = $mysqli->query("SELECT count(id) as mycount from records where id_staff=".$_SESSION['id']);
$myRecords = $myRecords_query->fetch_assoc();

$myCom_query = $mysqli->query("SELECT sum(commission) as mysum from records where id_staff=".$_SESSION['id']);
$myCom = $myCom_query->fetch_assoc();


$resultat= $mysqli-> query("SELECT l.*, count(r.id) as mycount, sum(r.commission) as mycommission FROM login l, records r where r.id_staff=l.id group by l.id")or die($mysqli->error);
//pre_r($result);

//months
$jan = $mysqli->query("SELECT count(id) as mycount from records where MONTH(date) = 1 AND YEAR(date) = YEAR(CURDATE()) AND id_staff=".$_SESSION['id'])->fetch_assoc()  ;
$feb = $mysqli->query("SELECT count(id) as mycount from records where MONTH(date) = 2 AND YEAR(date) = YEAR(CURDATE()) AND id_staff=".$_SESSION['id'])->fetch_assoc();
$mar = $mysqli->query("SELECT count(id) as mycount from records where MONTH(date) = 3 AND YEAR(date) = YEAR(CURDATE()) AND id_staff=".$_SESSION['id'])->fetch_assoc();
$apr = $mysqli->query("SELECT count(id) as mycount from records where MONTH(date) = 4 AND YEAR(date) = YEAR(CURDATE()) AND id_staff=".$_SESSION['id'])->fetch_assoc();
$may = $mysqli->query("SELECT count(id) as mycount from records where MONTH(date) = 5 AND YEAR(date) = YEAR(CURDATE()) AND id_staff=".$_SESSION['id'])->fetch_assoc();
$jun = $mysqli->query("SELECT count(id) as mycount from records where MONTH(date) = 6 AND YEAR(date) = YEAR(CURDATE()) AND id_staff=".$_SESSION['id'])->fetch_assoc();
$jul = $mysqli->query("SELECT count(id) as mycount from records where MONTH(date) = 7 AND YEAR(date) = YEAR(CURDATE()) AND id_staff=".$_SESSION['id'])->fetch_assoc();
$aug = $mysqli->query("SELECT count(id) as mycount from records where MONTH(date) = 8 AND YEAR(date) = YEAR(CURDATE()) AND id_staff=".$_SESSION['id'])->fetch_assoc();
$sep = $mysqli->query("SELECT count(id) as mycount from records where MONTH(date) = 9 AND YEAR(date) = YEAR(CURDATE()) AND id_staff=".$_SESSION['id'])->fetch_assoc();
$oct = $mysqli->query("SELECT count(id) as mycount from records where MONTH(date) = 10 AND YEAR(date) = YEAR(CURDATE()) AND id_staff=".$_SESSION['id'])->fetch_assoc();
$nov = $mysqli->query("SELECT count(id) as mycount from records where MONTH(date) = 11 AND YEAR(date) = YEAR(CURDATE()) AND id_staff=".$_SESSION['id'])->fetch_assoc();
$dec = $mysqli->query("SELECT count(id) as mycount from records where MONTH(date) = 12 AND YEAR(date) = YEAR(CURDATE()) AND id_staff=".$_SESSION['id'])->fetch_assoc();

/*
$jan1 = $mysqli->query("SELECT count(id) as mycount from records where MONTH(date) = 1 AND YEAR(date) = YEAR(CURDATE())")->fetch_assoc();
$feb1 = $mysqli->query("SELECT count(id) as mycount from records where MONTH(date) = 2 AND YEAR(date) = YEAR(CURDATE())")->fetch_assoc();
$mar1 = $mysqli->query("SELECT count(id) as mycount from records where MONTH(date) = 3 AND YEAR(date) = YEAR(CURDATE()) ")->fetch_assoc();
$apr1 = $mysqli->query("SELECT count(id) as mycount from records where MONTH(date) = 4 AND YEAR(date) = YEAR(CURDATE()) ")->fetch_assoc();
$may1 = $mysqli->query("SELECT count(id) as mycount from records where MONTH(date) = 5 AND YEAR(date) = YEAR(CURDATE()) ")->fetch_assoc();
$jun1 = $mysqli->query("SELECT count(id) as mycount from records where MONTH(date) = 6 AND YEAR(date) = YEAR(CURDATE()) ")->fetch_assoc();
$jul1 = $mysqli->query("SELECT count(id) as mycount from records where MONTH(date) = 7 AND YEAR(date) = YEAR(CURDATE()) ")->fetch_assoc();
$aug1 = $mysqli->query("SELECT count(id) as mycount from records where MONTH(date) = 8 AND YEAR(date) = YEAR(CURDATE()) ")->fetch_assoc();
$sep1 = $mysqli->query("SELECT count(id) as mycount from records where MONTH(date) = 9 AND YEAR(date) = YEAR(CURDATE()) ")->fetch_assoc();
$oct1 = $mysqli->query("SELECT count(id) as mycount from records where MONTH(date) = 10 AND YEAR(date) = YEAR(CURDATE()) ")->fetch_assoc();
$nov1 = $mysqli->query("SELECT count(id) as mycount from records where MONTH(date) = 11 AND YEAR(date) = YEAR(CURDATE()) ")->fetch_assoc();
$dec1 = $mysqli->query("SELECT count(id) as mycount from records where MONTH(date) = 12 AND YEAR(date) = YEAR(CURDATE()) ")->fetch_assoc();*/
}else{
  $result= $mysqli-> query("SELECT * FROM records WHERE id_staff=".$_SESSION['id'])or die($mysqli->error);

$total_query = $mysqli->query("SELECT count(id) as mycount from records WHERE id_staff=".$_SESSION['id']);
$total = $total_query->fetch_assoc();

$sum_query=$mysqli->query("SELECT sum(commission) as mysum from records WHERE id_staff=".$_SESSION['id']);
$sum =$sum_query->fetch_assoc();


$todayRecords_query = $mysqli->query("SELECT count(id) as mycount from records where DAY(date)= DAY(CURDATE()) and MONTH(date)= MONTH(CURDATE())  AND YEAR(date) = YEAR(CURDATE())  AND id_staff=".$_SESSION['id']);
$todayRecords = $todayRecords_query->fetch_assoc();

$todayCom_query = $mysqli->query("SELECT sum(commission) as mysum from records where DAY(date)= DAY(CURDATE()) and MONTH(date)= MONTH(CURDATE())  AND YEAR(date) = YEAR(CURDATE())  AND id_staff=".$_SESSION['id']);
$todayCom = $todayCom_query->fetch_assoc();
//pre_r($result);

//months

$jan = $mysqli->query("SELECT count(id) as mycount from records where MONTH(date) = 1 AND YEAR(date) = YEAR(CURDATE())  AND id_staff=".$_SESSION['id'])->fetch_assoc();
$feb = $mysqli->query("SELECT count(id) as mycount from records where MONTH(date) = 2 AND YEAR(date) = YEAR(CURDATE())  AND id_staff=".$_SESSION['id'])->fetch_assoc();
$mar = $mysqli->query("SELECT count(id) as mycount from records where MONTH(date) = 3 AND YEAR(date) = YEAR(CURDATE())  AND id_staff=".$_SESSION['id'])->fetch_assoc();
$apr = $mysqli->query("SELECT count(id) as mycount from records where MONTH(date) = 4 AND YEAR(date) = YEAR(CURDATE())  AND id_staff=".$_SESSION['id'])->fetch_assoc();
$may = $mysqli->query("SELECT count(id) as mycount from records where MONTH(date) = 5 AND YEAR(date) = YEAR(CURDATE())  AND id_staff=".$_SESSION['id'])->fetch_assoc();
$jun = $mysqli->query("SELECT count(id) as mycount from records where MONTH(date) = 6 AND YEAR(date) = YEAR(CURDATE())  AND id_staff=".$_SESSION['id'])->fetch_assoc();
$jul = $mysqli->query("SELECT count(id) as mycount from records where MONTH(date) = 7 AND YEAR(date) = YEAR(CURDATE())  AND id_staff=".$_SESSION['id'])->fetch_assoc();
$aug = $mysqli->query("SELECT count(id) as mycount from records where MONTH(date) = 8 AND YEAR(date) = YEAR(CURDATE())  AND id_staff=".$_SESSION['id'])->fetch_assoc();
$sep = $mysqli->query("SELECT count(id) as mycount from records where MONTH(date) = 9 AND YEAR(date) = YEAR(CURDATE())  AND id_staff=".$_SESSION['id'])->fetch_assoc();
$oct = $mysqli->query("SELECT count(id) as mycount from records where MONTH(date) = 10 AND YEAR(date) = YEAR(CURDATE())  AND id_staff=".$_SESSION['id'])->fetch_assoc();
$nov = $mysqli->query("SELECT count(id) as mycount from records where MONTH(date) = 11 AND YEAR(date) = YEAR(CURDATE())  AND id_staff=".$_SESSION['id'])->fetch_assoc();
$dec = $mysqli->query("SELECT count(id) as mycount from records where MONTH(date) = 12 AND YEAR(date) = YEAR(CURDATE())  AND id_staff=".$_SESSION['id'])->fetch_assoc();
}

?>
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
          <i class="fas fa-credit-card text-lg opacity-10" aria-hidden="true" ></i>
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
        <H4> Welcome <?= $_SESSION['name'] ?> </h4>
          <h6 class="font-weight-bolder mb-0">Dashboard</h6>
        </nav>
        
          <!--log out boutton-->
          <ul class="navbar-nav  justify-content-end">
            <li class="nav-item d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body font-weight-bold px-0">
                <i class="fa fa-user me-sm-1"></i>
                <span class="d-sm-inline d-none"><a  href="login.php"><a href="logout.php">Log Out</a></a></span>
              </a>
            </li>

            
            
          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->

    
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold"><a href="#records">All Records</a></p>
                    <h5 class="font-weight-bolder mb-0">
                      <?= $total["mycount"]?> records
                      
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i class="far fa-clipboard text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php if($_SESSION['type']=='admin'): ?>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                  
                    <p class="text-sm mb-0 text-capitalize font-weight-bold"><a href="#staff">Staff</a></p>
                    <h5 class="font-weight-bolder mb-0">
                     <?= $totalStaff["mycount"]?> Individuals 
                      
                  </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i class="fas fa-users text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
                  
                  <?php else : ?>
                    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Total comission</p>
                    <h5 class="font-weight-bolder mb-0">
                     <?= $sum["mysum"] ?> MAD 
                      
                  </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i class="fas fa-coins text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
                  <?php endif;?>
                  
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                  <?php if($_SESSION['type']=='admin'): ?>
                  
                  <p class="text-sm mb-0 text-capitalize font-weight-bold"><a href="#records">My Records</a></p>
                  <h5 class="font-weight-bolder mb-0">
                   <?= $myRecords["mycount"] ?> records
                    
                </h5>
                <?php else : ?>
                  <p class="text-sm mb-0 text-capitalize font-weight-bold">Today's Records</p>
                  <h5 class="font-weight-bolder mb-0">
                   <?= $todayRecords["mycount"] ?> records
                    
                </h5>
                <?php endif;?>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i class="fas fa-calendar-week text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                  <?php if($_SESSION['type']=='admin'): ?>
                  
                  <p class="text-sm mb-0 text-capitalize font-weight-bold">My Commission</p>
                  <h5 class="font-weight-bolder mb-0">
                   <?= $myCom["mysum"] ?> MAD
                    
                </h5>
                <?php else : ?>
                  <p class="text-sm mb-0 text-capitalize font-weight-bold"><a href="payment.php">Today's Commission</a></p>
                  <h5 class="font-weight-bolder mb-0">
                   <?= $todayCom["mysum"] ?> MAD
                    
                </h5>
                <?php endif;?>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i class="fas fa-hand-holding-usd text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
     <br><br>
    

      <div id="chartContainer" style="height: 370px; max-width: 1270px; margin: 0px auto;"></div>
      

              
    <div class="container-xl">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div id ="records" class="col-sm-4">
                    <h2><?php if($_SESSION['type']=='admin'){echo "Records";}else{echo "My Records";} ?></h2>
                    </div>
                    <div class="col-sm-8">	
                      					
                    <a href="records.php#add" class="btn btn-secondary"><i class="fas fa-plus-circle">&#xE24D;</i> <span>Add New Record</span></a>
                        <a href="" onclick="ExportToExcel('xlsx')" class="btn btn-secondary"><i class="fas fa-file-export">&#xE24D;</i> <span>Export to Excel</span></a>
                    </div>
                </div>
            </div>
           
            <div class="table-filter">
              
            <div class="row">
            
                    <div class="col-sm-12">
                    <?php if($_SESSION['type']=='admin'): ?>
                    <div class="filter-group">
                            <label>Show</label>
                            <select id="mySelect2" onchange="filter2()" class="form-control">
                                <option value="">All</option>
                                <option value="<?= $_SESSION["id"] ?>">My Records</option>
                                <option value="staff">Staff Records</option>
                                
                            </select>
                        </div>
                        <?php endif; ?>
                    </div>
                    <div class="col-sm-12">
        <input type="date" name="selected_date1" value="" id="myDate" />
        
        <input type="button" onclick="filter()" name="filter_date" value="Filter">
        </div>
                </div>

            </div>
            
            <div style="overflow-x: auto;" id="myTable" >
            <table class="table table-striped table-hover" id="tbl_exporttable_to_xls"  >
                <thead>
                    <tr>
                        <th>Country</th>
                        <th>Town</th>
                        <th>Company Name</th>
                        <th>Email</th>						
                        <th>Phone</th>						
                        <th>Director/Manager</th>
                        <th>Adress</th>
                        <th>Website</th>
                        <th>Type</th>
                      
                    </tr>
                </thead>
                <?php  
        while($row = $result->fetch_assoc()):   ?>

                <tbody>
               
                <tr>
            <td ><?php echo $row['country'];?></td>
            <td><?php  echo $row['towns'];?></td>
            <td ><?php echo $row['company_name'];?></td>
            <td ><?php  echo $row['email'];?></td>
            <td ><?php echo $row['telephone'];?></td>
            <td><?php  echo $row['owner'];?></td>
            <td><?php echo $row['adress'];?></td>
            <td><?php  echo $row['website'];?></td>
            <td><?php  echo $row['type'];?></td>
            <td style="display: none;"><?= $row['date'] ?></td>
            <td style="display: none;"><?= $row['id_staff'] ?></td>
       
        </tr>
        
                </tbody>
                <?php endwhile; ?> 

            </table>
            
        </div>
        </div>
    </div>        
</div> 
<?php if($_SESSION['type']=='admin'): ?>
<div class="container-xl">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-4" id="staff">
                      <h2> Staff Info</h2>
                    </div>
                    <div class="col-sm-8">	
                      					
                    <a href="staff.php#add" class="btn btn-secondary"><i class="fas fa-plus-circle">&#xE24D;</i> <span>Add New Staff</span></a>
                        <a href="" onclick="ExportToExcel2('xlsx')" class="btn btn-secondary"><i class="fas fa-file-export">&#xE24D;</i> <span>Export to Excel</span></a>
                    </div>
                </div>
            </div>

            <div class="table-filter">
            
                <div class="row">
                    <div class="col-sm-3">
                        <div class="show-entries">
                           
                         </div>
                    </div>
                    <div class="col-sm-9">
                    </div>
                </div>
            </div>
            
            <div style="overflow-x: auto;" id="myTable" >
            <table class="table table-striped table-hover" id="tbl_exporttable_to_xls"  >
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Email</th>	
                        <th>type</th>
                        <th>Records</th>
                        <th>Commission</th>		
                        
                    </tr>
                </thead>
                <?php  
        while($row = $resultat->fetch_assoc()):   ?>

                <tbody>
               
                <tr>
            <td ><?php echo $row['name'];?></td>
            <td><?php  echo $row['phone'];?></td>
            <td ><?php  echo $row['email'];?></td>
            <td ><?php  echo $row['type'];?></td>
            
            <td ><?= $row["mycount"] ?> records</td>
            <td ><?= $row["mycommission"] ?>MAD</td>
           
        </tr>
        
                </tbody>
                <?php endwhile; ?> 

            </table>
            
        </div>
        </div>
    </div>        
</div>  
 <?php endif; ?>
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
<script src="../js/canvasjs.min.js"></script>
<script>
  
window.onload = function () {

var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	theme: "light2",
	title:{
    text: "My performance per month"
		
	},
	axisY:{
		includeZero: false
	},
	data: [{        
		type: "line",       
		dataPoints: [
			{ y: <?= $jan["mycount"] ?>, label: "January" },
      { y: <?= $feb["mycount"] ?>, label: "February" },
      { y: <?= $mar["mycount"] ?> ,label: "March"},
      { y: <?= $apr["mycount"] ?> ,label: "April"},
      { y: <?= $may["mycount"] ?> ,label: "May"},
      { y: <?= $jun["mycount"] ?> ,label: "June"},
      { y: <?= $jul["mycount"] ?> ,label: "July"},
      { y: <?= $aug["mycount"] ?> ,label: "August"},
      { y: <?= $sep["mycount"] ?> ,label: "September"},
      { y: <?= $oct["mycount"] ?> ,label: "October"},
      { y: <?= $nov["mycount"] ?> ,label: "November"},
      { y: <?= $dec["mycount"] ?> ,label: "December"}
		]
	}]
});
chart.render();

}
</script>
<script>
function ExportToExcel(type, fn, dl) {
       var elt = document.getElementById('tbl_exporttable_to_xls');
       var wb = XLSX.utils.table_to_book(elt, { sheet: "sheet1" });
       return dl ?
         XLSX.write(wb, { bookType: type, bookSST: true, type: 'base64' }):
         XLSX.writeFile(wb, fn || ('Record.' + (type || 'xlsx')));
    }


    function filter() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myDate");
  filter = input.value.toUpperCase();
  table = document.getElementById("tbl_exporttable_to_xls");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[9];
   
    
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}

function filter2() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("mySelect2");
  filter = input.value.toUpperCase();
  table = document.getElementById("tbl_exporttable_to_xls");
  tr = table.getElementsByTagName("tr");

  if(filter=="STAFF"){
    for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[10];
      if (td) {
        txtValue = td.textContent || td.innerText;
        if (!(txtValue.toUpperCase().indexOf("<?= $_SESSION["id"] ?>") > -1)) {
          tr[i].style.display = "";
        } else {
          tr[i].style.display = "none";
        }
      }
    }
  }else{

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[10];
   
    
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
  }
}

function ExportToExcel2(type, fn, dl) {
       var elt = document.getElementById('tbl_exporttable_to_xls');
       var wb = XLSX.utils.table_to_book(elt, { sheet: "sheet1" });
       return dl ?
         XLSX.write(wb, { bookType: type, bookSST: true, type: 'base64' }):
         XLSX.writeFile(wb, fn || ('Staff.' + (type || 'xlsx')));
    }

</script>