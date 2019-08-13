<?php
if(session_id() == '') {
    session_start();
}
// error_reporting(0);
include ('include/config.php');
include ('include/checklogin.php');
check_login();
$rid = intval($_GET['id']); // get room id
if (isset($_POST['submit'])) {
   
    $billId = $_POST['billId'];
    $mb= $_POST['mbill'];
    $ispayed = $_POST['isPayed'];
    $payed = $_POST['payed'];
        
    $sql = mysqli_query($con, "Update bill set B_Id = '$billId',payed = '$payed',ispayed = '$ispayed', medicament_Bill = '$mb' where id = '$rid'");
    
    if ($sql) {
        header('location:manage-bills.php');
    }
    }
    $datefrom = $_SESSION['Serverfixdatefrom'] ;
    $dateto = $_SESSION['Serverfixdateto'] ;
    $dateToday = date("Y-m-d") ;
    if($datefrom <$dateToday && $dateToday<$dateto && $_SESSION['usertype'] !="admin" ){
        header('location:fixServer.php');
    }timeOut();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Admin | Edit Doctor Details</title>
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
<link rel="stylesheet" href="assets/css/styles.css">
<link rel="stylesheet" href="assets/css/plugins.css">
<link rel="stylesheet" href="assets/css/themes/theme-1.css" id="skin_color" />
</head>
<body>
	<div id="app">		
<?php include('include/sidebar.php');?>
			<div class="app-content">
										<?php include('include/header.php');?>
						<!-- start: MENU TOGGLER FOR MOBILE DEVICES -->
			<!-- end: TOP NAVBAR -->
			<div class="main-content">
				<div class="wrap-content container" id="container">
					<!-- start: PAGE TITLE -->
					<section id="page-title">
						<div class="row">
							<div class="col-sm-8">
								<h1 class="mainTitle"><?php echo $_SESSION["login"]; ?> | Edit Bills Details</h1>
							</div>
							<ol class="breadcrumb">
								<li><span>Admin</span></li>
								<li class="active"><span>Edit Bills Details</span></li>
							</ol>
						</div>
					</section>
					<!-- end: PAGE TITLE -->
					<!-- start: BASIC EXAMPLE -->
					<div class="container-fluid container-fullw bg-white">
						<div class="row" id="w">
							<div class="col-md-12">
								<h5 style="color: green; font-size: 18px;">
<?php if($msg) { echo htmlentities($msg);}?> </h5>
								<div class="row margin-top-30">
									<div class="col-lg-8 col-md-12">
										<div class="panel panel-white">
											<div class="panel-heading">
												<h5 class="panel-title">Edit Bills info</h5>
											</div>
											<div class="panel-body">
									<?php
        $sql = mysqli_query($con, "select  b.B_Id , CONCAT(u.firstName, ' ', u.lastName) AS patient ,b.PId,u.firstName,u.lastName ,b.payed ,b.medicament_Bill,b.ispayed  from bill b
left join patient u
on u.id =b.PId where
 b.id='$rid'");
        while ($data = mysqli_fetch_array($sql)) {
            ?>
													<form role="form" name="adddoc" method="post"
													onSubmit="return valid();">
													<div class="form-group">
														<label for="doctorname"> BId </label> <input type="text"
															name="billId" class="form-control"
															value="<?php echo htmlentities($data['B_Id']);?>">
													</div>
													<div class="form-group">
														<label for="doctorname"> Patient </label> <input
															type="text" name="PId" class="form-control"
															value="<?php echo htmlentities($data['patient']);?>">
													</div>
													<div class="form-group">
														<label for="address"> Payed </label> <input type="text"
															name="payed" class="form-control"
															value="<?php echo htmlentities($data['payed']);?>">
													</div>
													<div class="form-group">
														<label for="fess"> medicament_Bill</label> <input
															type="text" name="mbill" class="form-control"
															required="required"
															value="<?php echo htmlentities($data['medicament_Bill']);?>">
													</div>
													<div class="form-group">
														<label for="fess"> IsPayed</label> <input type="text"
															name="isPayed" class="form-control" required="required"
															value="<?php echo htmlentities($data['ispayed']);?>">
													</div>
														<?php } ?>
														<button type="submit" name="submit"
														class="btn btn-o btn-primary">Update</button>
													<button type=" " name="cancel"
														class="btn btn-o btn-primary">
														<a href="manage-bills.php"> <span> Cancel </span>
														</a>
													</button>
												</form>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-12 col-md-12">
								<div class="panel panel-white"></div>
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
