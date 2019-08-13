<?php
if(session_id() == '') {
    session_start();
}
// error_reporting(0);
include ('include/config.php');
include ('include/checklogin.php');
check_login();
$datefrom = $_SESSION['Serverfixdatefrom'] ;
$dateto = $_SESSION['Serverfixdateto'] ;
$dateToday = date("Y-m-d") ;
if($datefrom <$dateToday && $dateToday<$dateto && $_SESSION['usertype'] !="admin" ){
    header('location:fixServer.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Admin | Manage Patients</title>
<meta charset="utf-8" />
<meta name="viewport"
	content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta content="" name="description" />
<meta content="" name="author" />
<link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
<link rel="stylesheet" href="vendor/themify-icons/themify-icons.min.css">
<link href="vendor/animate.css/animate.min.css" rel="stylesheet" media="screen">
<link href="vendor/perfect-scrollbar/perfect-scrollbar.min.css" rel="stylesheet" media="screen">
<link href="vendor/switchery/switchery.min.css" rel="stylesheet" media="screen">
<link href="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" media="screen">
<link href="vendor/select2/select2.min.css" rel="stylesheet" media="screen">
<link href="vendor/bootstrap-datepicker/bootstrap-datepicker3.standalone.min.css" rel="stylesheet" media="screen">
<link href="vendor/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet" media="screen">
<link rel="stylesheet" href="assets/css/styles.css">
<link rel="stylesheet" href="assets/css/plugins.css">
<link rel="stylesheet" href="assets/css/themes/theme-1.css" id="skin_color" />
</head>
<body>
	<div id="app">		
<?php include('include/sidebar.php');?>
			<div class="app-content">
						<?php include('include/header.php');?>
				<!-- end: TOP NAVBAR -->
			<div class="main-content">
				<div class="wrap-content container" id="container">
					<!-- start: PAGE TITLE -->
					<section id="page-title">
						<div class="row">
							<div class="col-sm-8">
								<h1 class="mainTitle">Admin | Patient has not Doctor</h1>
							</div>
							<div></div>
							<ol class="breadcrumb">
								<li><span>Admin</span></li>
								<li class="active"><span>Manage Patients</span></li>
								<li class="active"><span>Add Patients</span></li>
							</ol>
						</div>
					</section>
					<!-- end: PAGE TITLE -->
					<!-- start: BASIC EXAMPLE -->
					<div class="container-fluid container-fullw bg-white">
						<div class="row">
							<div class="col-md-12">
								<h5 class="over-title margin-bottom-15">
									Manage <span class="text-bold">Patients</span>
								</h5>
								<p style="color: red;"><?php echo htmlentities($_SESSION['msg']);?>
								<?php echo htmlentities($_SESSION['msg']="");?></p>
								<table class="table table-hover" id="tabledata">
									<thead>
										<tr>
											<th class="center">PaId</th>
											<th><a href="<?php echo sortorder('fullName'); ?>"class="sort">Name</a></th>
											<th><a href="<?php echo sortorder('address'); ?>" class="sort">Address</a></th>
											<th><a href="<?php echo sortorder('city'); ?>" class="sort">City</a></th>
											<th><a href="<?php echo sortorder('gender'); ?>" class="sort">Gender</a></th>
										</tr>
									</thead>
									<tbody>
<?php

function sortorder($fieldname)
{
    $sorturl = "?order_by=" . $fieldname . "&sort=";
    $sorttype = "asc";
    if (isset($_GET['order_by']) && $_GET['order_by'] == $fieldname) {
        if (isset($_GET['sort']) && $_GET['sort'] == "asc") {
            $sorttype = "asc";
        }
    }
    else {
        $sorttype = "desc";
    }
    $sorturl .= $sorttype;
    return $sorturl;
}
?>
<?php
$orderby = " ORDER BY id desc ";
if (isset($_GET['order_by']) && isset($_GET['sort'])) {
    $orderby = ' order by ' . $_GET['order_by'] . ' ' . $_GET['sort'];
}
$row = 0;
$rowperpage = 50;
$select = "SELECT * FROM patient where doctorID is null" . $orderby . " limit $row," . $rowperpage;
$sql = mysqli_query($con, $select);

$cnt = 1;
while ($row = mysqli_fetch_array($sql)) {
    ?>
											<tr>
											<td class="center"><?php echo $cnt;?>.</td>
											<td class="hidden-xs"><?php echo $row['fullName'];?></td>
											<td><?php echo $row['address'];?></td>
											<td><?php echo $row['city'];?></td>
											<td><?php echo $row['gender'];?></td>
												</td>
									
										</tr>
											<?php
    $cnt = $cnt + 1;
}
?>
										</tbody>
								</table>
							</div>
					</div>
						</div>
				</div>
			</div>
			<!-- end: BASIC EXAMPLE -->
			<!-- end: SELECT BOXES -->
		</div>
	</div>
	</div>
	<!-- start: FOOTER -->
	<?php include('include/footer.php');?>
			<!-- end: FOOTER -->

	<!-- start: SETTINGS -->
	<?php include('include/setting.php');?>
			
			<!-- end: SETTINGS -->
	</div>
	<!-- start: MAIN JAVASCRIPTS -->
	<script src="//code.jquery.com/jquery.js"></script>
   	<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.10.1/bootstrap-table.min.js"></script>
	<script src="vendor/jquery/jquery.min.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="vendor/modernizr/modernizr.js"></script>
	<script src="vendor/jquery-cookie/jquery.cookie.js"></script>
	<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
	<script src="vendor/switchery/switchery.min.js"></script>
	<!-- end: MAIN JAVASCRIPTS -->
	<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
	<script src="vendor/maskedinput/jquery.maskedinput.min.js"></script>
	<script src="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
	<script src="vendor/autosize/autosize.min.js"></script>
	<script src="vendor/selectFx/classie.js"></script>
	<script src="vendor/selectFx/selectFx.js"></script>
	<script src="vendor/select2/select2.min.js"></script>
	<script src="vendor/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
	<script src="vendor/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
	<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
	<!-- start: CLIP-TWO JAVASCRIPTS -->
	<script src="assets/js/main.js"></script>
	<!-- start: JavaScript Event Handlers for this page -->
	<script src="assets/js/form-elements.js"></script>
	<script>
			jQuery(document).ready(function() {
				Main.init();
				FormElements.init();
			});
		</script>
	<!-- end: JavaScript Event Handlers for this page -->
	<!-- end: CLIP-TWO JAVASCRIPTS -->
</body>
</html>
