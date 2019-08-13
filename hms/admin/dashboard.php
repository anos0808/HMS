<?php
if(session_id() == '') {
    session_start();
}
//error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();
?>
<?php 
$select = "SELECT Date(fixFrom),Date(fixTo),DATE(current_date()) FROM hms.serverreparatur
where  Date(fixFrom)<DATE(current_date()) and DATE(current_date())<Date(fixTo) ORDER BY id DESC
LIMIT 1";
$sql = mysqli_query($con, $select);
$cnt = 1;
$_SESSION['Serverfixdateto'] ="";
$_SESSION['Serverfixdatefrom'] ="";
while ($row = mysqli_fetch_array($sql)) {
    $_SESSION['Serverfixdateto'] = $row['Date(fixTo)'];
    $_SESSION['Serverfixdatefrom'] = $row['Date(fixFrom)'];
}

Timeout();
    ?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Admin  | Dashboard</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
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
		<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
		<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.10.1/bootstrap-table.min.css">
		<script src="//code.jquery.com/jquery.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.10.1/bootstrap-table.min.js"></script>
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
								<h1 class="mainTitle"><?php echo $_SESSION["login"]; ?> | Dashboard</h1>
							</div>
						</div>
					</section>
					<!-- end: PAGE TITLE -->
					<!-- start: BASIC EXAMPLE -->
					<div class="container-fluid container-fullw bg-white">
						<div class="row">
							<a href="manage-patients">
								<div class="col-sm-4">
									<div class="panel panel-white no-radius text-center">
										<div class="panel-body">
											<span class="fa-stack fa-2x"> <i
												class="fa fa-square fa-stack-2x text-primary"></i> <i
												class="fa fa-smile-o fa-stack-1x fa-inverse"></i>
											</span>
											<h2 class="StepTitle">Manage Patients</h2>

											<p class="links cl-effect-1">
												<a href="manage-patients">
												<?php
$result = mysqli_query($con, "SELECT * FROM patient ");
            $num_rows = mysqli_num_rows($result);
            {
                ?>
											Total Patients :<?php echo htmlentities($num_rows);  } ?>		
												</a>
											</p>
										</div>
									</div>
								</div>
							</a> <a href="manage-doctor">
								<div class="col-sm-4">
									<div class="panel panel-white no-radius text-center">
										<div class="panel-body">
											<span class="fa-stack fa-2x"> <i
												class="fa fa-square fa-stack-2x text-primary"></i> <i
												class="fa fa-users fa-stack-1x fa-inverse"></i>
											</span>
											<h2 class="StepTitle">Manage Doctors</h2>
											<p class="cl-effect-1">
												<a href="manage-doctor">
												<?php
$result1 = mysqli_query($con, "SELECT * FROM doctor ");
            $num_rows1 = mysqli_num_rows($result1);
            {
                ?>
											Total Doctors :<?php echo htmlentities($num_rows1);  } ?>		
												</a>
											</p>
										</div>
									</div>
								</div>
							</a> <a href="appointment-history">
								<div class="col-sm-4">
									<div class="panel panel-white no-radius text-center">
										<div class="panel-body">
											<span class="fa-stack fa-2x"> <i
												class="fa fa-square fa-stack-2x text-primary"></i> <i
												class="fa fa-terminal fa-stack-1x fa-inverse"></i>
											</span>
											<h2 class="StepTitle">Appointments</h2>
											<p class="links cl-effect-1">
												<a href="book-appointment"> <a
													href="appointment-history">
												<?php
$sql = mysqli_query($con, "SELECT * FROM appointment");
            $num_rows2 = mysqli_num_rows($sql);
            {
                ?>
											Total Appointments :<?php echo htmlentities($num_rows2);  } ?>	
												</a>
												</a>
											</p>
										</div>
									</div>
								</div>
							</a>
						</div>
						<div class="row">
							<a href="manage-rooms">
								<div class="col-sm-4">
									<div class="panel panel-white no-radius text-center">
										<div class="panel-body">
											<span class="fa-stack fa-2x"> <i
												class="fa fa-square fa-stack-2x text-primary"></i> <i
												class="fa fa-home fa-stack-1x fa-inverse"></i>
											</span>
											<h2 class="StepTitle">Manage Rooms</h2>
											<p class="links cl-effect-1">
												<a href="manage-rooms">
												<?php
$result = mysqli_query($con, "select  u.firstName,r.roomID,r.floor ,d.doctorName from room r join patient u on r.roomID=u.roomId join doctor d on d.id=u.doctorId");
            $num_rows = mysqli_num_rows($result);
            {
                ?>
											Total Rooms :<?php echo htmlentities($num_rows);  } ?>		
												</a>
											</p>
										</div>
									</div>
								</div>
							</a> <a href="manage-bills">
								<div class="col-sm-4">
									<div class="panel panel-white no-radius text-center">
										<div class="panel-body">
											<span class="fa-stack fa-2x"> <i
												class="fa fa-square fa-stack-2x text-primary"></i> <i
												class="fa fa-money fa-stack-1x fa-inverse"></i>
											</span>
											<h2 class="StepTitle">Manage Bills</h2>
											<p class="links cl-effect-1">
												<a href="manage-bills">
												<?php
$result = mysqli_query($con, "SELECT b.id,CONCAT(u.firstName, ' ', u.lastName) AS patient,u.firstName,u.LastName,b.PId,b.payed,b.medicament_Bill ,b.ispayed FROM hms.Bill b
left join patient u
on u.id=b.PId");
            $num_rows = mysqli_num_rows($result);
            {
                ?>
											Total Bills :<?php echo htmlentities($num_rows);  } ?>		
												</a>
											</p>
										</div>
									</div>
								</div>
							</a>
						</div>
					</div>
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
