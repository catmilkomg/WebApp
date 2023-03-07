<?php require_once'recordconfig.php'; ?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 
  <link rel="icon" type="image/png" href="">
  <title>
   Records
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
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
 
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>
<link href="style.css" rel="stylesheet" />
</head>

<body class="g-sidenav-show  bg-gray-100">


        <?php

$mysqli = new mysqli('localhost','root','','staff') or die(mysqli_error($mysqli)); 
if($_SESSION['type']=='admin'){
  $result= $mysqli-> query("SELECT * FROM records")or die($mysqli->error);
}else{
  $result= $mysqli-> query("SELECT * FROM records WHERE id_staff=".$_SESSION['id'])or die($mysqli->error);}

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
        <H4><?= $_SESSION['name'] ?> </h4>
          <h6 class="font-weight-bolder mb-0">Records</h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            <div class="input-group">
              
            </div>
          </div>
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
    <!-- End Navbar -->
   
    
    <div class="container-xl">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-4">
                      <h2> Records Details</h2>
                    </div>
                    <div class="col-sm-8">	
                      					
                    <a href="#add" class="btn btn-secondary"><i class="fas fa-plus-circle">&#xE24D;</i> <span>Add New Record</span></a>
                      
                    </div>
                </div>
            </div>

            <div class="table-filter">
            
                <div class="row">
                    <div class="col-sm-3">
                        <div class="show-entries">
                        <?php if($_SESSION['type']=='admin'): ?>
                    <div class="filter-group">
                            <label>Show</label>
                            <select id="mySelect2" onchange="filterRec()" class="form-control">
                                <option value="">All</option>
                                <option value="<?= $_SESSION["id"] ?>">My Records</option>
                                <option value="staff">Staff Records</option>
                                
                            </select>
                        </div>
                        <?php endif; ?>
                         </div>
                    </div>
              
                    
                    <div class="col-sm-9">
                        <div class="filter-group">
                       
                        <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search Countries ..">
                        </div>

                        
                        <div class="filter-group">
                            <label>Type</label>
                            <select id="mySelect" onchange="myFunction2()" class="form-control">
                                <option value="">Any</option>
                                <option value="Client">Client</option>
                                <option value="Wholesaler">Wholesaler</option>
                                
                            </select>
                        </div>
                        
                        
                       
                    </div>
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
                        <th>Options</th>
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
            <td style="display: none;"><?= $row['id_staff'] ?></td>
                  
                <td class="align-middle">
                
                            <p><a href="recordconfig.php?delete=<?php echo $row['id'];?>"
                             onclick="return confirm('Are you sure you want to delete this record ?');" 
                             class="text-secondary font-weight-bold text-xs" 
                             data-toggle="tooltip" data-original-title="Edit user"><i class="far fa-trash-alt me-2"></i>
                            Delete
                            </a></p>
                            <p><a href="records.php?edit=<?php echo $row['id'];?>#add"  class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user"><i class="fas fa-pencil-alt"></i>
                            Edit
                            </a></p>
                          </td>
        </tr>
        
                </tbody>
                <?php endwhile; ?> 

            </table>
        
        </div>
        </div>
    </div>        
</div>  

<div class="container-xl">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div id="add"class="table-title">
                <div class="row">
                    <div class="col-sm-4">
                      <h2> Add New Record </h2>
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
                  <form role="form" method="POST" >
                  <input type="hidden" class="form-control" name="id" value="<?php echo $id; ?>">
                  
                    <label>Country</label>
                    <div class="mb-3">
                      <input  type="text" class="form-control" value="<?php echo $country; ?>"  name="country"  >
                    </div>
                    <label>Town</label>
                    <div class="mb-3">
                      <input type="text" name="towns" value="<?php echo $towns; ?>" class="form-control"   >
                    </div>

                    <label>Company Name</label>
                    <div class="mb-3">
                      <input type="text" class="form-control" value="<?php echo $company_name; ?>" name="name"  >
                    </div>
                    <label>Email</label>
                    <div class="mb-3">
                      <input type="email" class="form-control"  value="<?php echo $email; ?>" name="email" required >
                    </div>
                    <label>Phone Number</label>
                    <div class="mb-3">
                      <input type="number" class="form-control" value="<?php echo $telephone; ?>"  name="phone"  >
                    </div>
                    <label>Director/Manager</label>
                    <div class="mb-3">
                      <input type="text" class="form-control" value="<?php echo $owner; ?>"   name="dm"  >
                    </div>
                    <label>Adress</label>
                    <div class="mb-3">
                      <input type="text" class="form-control" value="<?php echo $adress; ?>"  name="adress"  >
                    </div>
                    <label>Website</label>
                    <div class="mb-3">
                      <input type="url" class="form-control"  value="<?php echo $website; ?>" name="website"  >
                    </div>
                    <label>Type</label>
                    <div class="mb-3">
                    <select class="form-control" name="type" value="<?php echo $type; ?>">
                                <option>Wholesaler</option>
                                <option>Client</option>
                            </select>
                    </div>
                    
                    <table>
                    <div class ="form-group">
   
<td>
<?php if($update==true):?>
<button type="submit" class="btn btn-primary" name="update">Update</button> 
<?php else :?>
    <button type="submit"  class="btn btn-primary" name="save">Save</button>
    
    <?php endif;?>
</td>
 <td>   
    <button type="reset" class="btn btn-primary" name="reset">Reset</button> 
    </td>
    
</div>
    </table>           


                  </form>
                </div>
                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                  
                </div>
              </div>
            </div>
            
            </div>
          </div>
        </div>
      </div>
    </section>
</div>
</div>
</div>


  
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
<script>
function myFunction() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
   
    
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



function myFunction2() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("mySelect");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[8];
   
    
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
function filterRec() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("mySelect2");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  if(filter=="STAFF"){
    for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[9];
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
}

</script>
