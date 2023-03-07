<?php require_once "recordconfig.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  
  <link rel="icon" type="image/png" href="">
  <title>
    Payment
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="../assets/css/soft-ui-dashboard.css?v=1.0.3" rel="stylesheet" />
  <link href="style.css" rel="stylesheet" />
  <style>
    .hidden{
      display: none;}
      table, th, td {
      padding: 10px;
      border: 1px solid black;
      border-collapse: collapse;
      }
  </style>
</head>

<body class="g-sidenav-show  bg-gray-100">
<?php

$mysqli = new mysqli('localhost','root','','staff') or die(mysqli_error($mysqli));
$total_query = $mysqli->query("SELECT count(id) as mycount from records WHERE id_staff=".$_SESSION['id']);
$total = $total_query->fetch_assoc();
  
  $sum_query=$mysqli->query("SELECT sum(commission) as mysum from records WHERE id_staff=".$_SESSION['id']);
$sum =$sum_query->fetch_assoc();
$records = $mysqli->query("SELECT * from records WHERE id_staff=".$_SESSION['id']);
$res= $mysqli-> query("SELECT * from login")or die($mysqli->error);
$resultat= $mysqli-> query("SELECT l.*, count(r.id) as mycount, sum(r.commission) as mycommission FROM login l, records r where r.id_staff=l.id group by l.id")or die($mysqli->error);
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
          <h6 class="font-weight-bolder mb-0">Payment</h6>
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
                      <h2>My Records History</h2>
                    </div>
                <div class="col-sm-8">	
                      					
        <a href="" onclick="ExportToExcel('xlsx')" class="btn btn-secondary"><i class="fas fa-file-export">&#xE24D;</i> <span>Export to Excel</span></a>
                                </div>
            </div>

            <div class="table-filter">
            
                <div class="row">
                    <div class="col-sm-12">
                  <input type="month" name="selected_date1" value="" id="myDate" />
                  <input type="button" onclick="filter()" name="filter_date" value="Filter">
                  
                  </div>
                </div>
            </div>
            <BR>
            
    <div style="overflow-x: auto;" id="myTable" >
            <table class="table table-striped table-hover" id="tbl_exporttable_to_xls"  >
                <thead>
                    <tr><th></th>
                        <th>Records Id</th>
                        <th>Commission</th>
                        <th>Date</th>	
                    </tr>
                </thead>
       
                 <tbody>
                  <?php while($record=$records->fetch_assoc()){ ?>
                <tr>
                  <td></td>
            <td><?= $record["id"] ?></td>
            <td class="commission"><?= $record["commission"] ?></td>
            <td ><?= $record["date"] ?></td>
            
           
    </tr>
    <?php } ?>
                  </tbody>
                
               <tR style="background-color:#98FB98">
             <td >TOTAL</td>
             <td id="records" > <?= $total["mycount"]?> records</td>
             <td  id="total">MAD</td>
             <td></td>
                  </tr>
             
             </table>
              
            
           <!-- <div class="mb-4">
            <label>Transaction</label>
                    <select class="form-control" name="type" value="<?php echo $type; ?>">
                                <option>Pending</option>
                                <option>Paid</option>
                                <option>Canceled</option>
                            </select>
                           </div>
                           <button type="submit"  class="btn btn-primary" name="save">Save</button> -->
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
                    <div class="col-sm-4">
                      <h2> Staff Records Summary</h2>
                    </div>
                    <div class="col-sm-8">	
                      					
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
                        <div class="filter-group">
                       
                        <input type="text" id="myInput2" onkeyup="SearchFunction()" placeholder="Search Names ..">
                        </div>
                       
                    </div>
                </div>
            </div>
           
            <div style="overflow-x: auto;" id="myTable2" >
            <table class="table table-striped table-hover" id="tbl_exporttable_to_xls"  >
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Records</th>
                        <th>Commission</th>	
                    </tr>
                </thead>
                <?php  
        while($row=$resultat->fetch_assoc()): ?>

                <tbody>
                <tr>
            <td ><?php echo $row['name'];?></td>
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
<div class="fixed-plugin">
</body>
</html>
<script>
   function filter() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myDate");
  filter = input.value.toUpperCase();
  table = document.getElementById("tbl_exporttable_to_xls");
  tbody = table.getElementsByTagName("tbody")[0];
  tr = tbody.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[3];
   
    
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].getElementsByTagName("td")[2].classList.add("commission");
        tr[i].classList.remove("hidden");
      } else {
        tr[i].classList.add("hidden");
        tr[i].getElementsByTagName("td")[2].classList.remove("commission");
      }
    }
  }
  total();
}
function total(){
  var table = document.getElementById('tbl_exporttable_to_xls');
  var tdsCompulsory = document.getElementsByClassName('commission');

  var cData = [];
  var oneData = [];
  var twoData = [];
  var sum = 0;
  var recs = 0;

  for(var i in tdsCompulsory){
      if(typeof tdsCompulsory[i].textContent != 'undefined')
      cData.push(tdsCompulsory[i].textContent);
  }
  console.log(cData);

  for(var i in cData){
      sum +=parseFloat(cData[i]);
      recs++;
  }
  console.log(sum);    
  document.getElementById('total').innerHTML = sum;
  document.getElementById('records').innerHTML = recs+" records";
}

    total();
</script>
<script>
function SearchFunction() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput2");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable2");
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
</script>
<SCRIPT>
function ExportToExcel(type, fn, dl) {
       var elt = document.getElementById('myTable');
       var wb = XLSX.utils.table_to_book(elt, { sheet: "sheet1" });
       return dl ?
         XLSX.write(wb, { bookType: type, bookSST: true, type: 'base64' }):
         XLSX.writeFile(wb, fn || ('Payment.' + (type || 'xlsx')));
    }

function ExportToExcel2(type, fn, dl) {
       var elt = document.getElementById('myTable2');
       var wb = XLSX.utils.table_to_book(elt, { sheet: "sheet1" });
       return dl ?
         XLSX.write(wb, { bookType: type, bookSST: true, type: 'base64' }):
         XLSX.writeFile(wb, fn || ('StaffPayment.' + (type || 'xlsx')));
    }

</script>