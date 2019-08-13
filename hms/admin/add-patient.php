<?php
if(session_id() == '') {
    session_start();
}
// error_reporting(0);
include ('include/config.php');
include ('include/checklogin.php');
check_login();

if (isset($_POST['submit'])) {
    $docspecialization = $_POST['DoctorsName'];
    $roomId = $_POST['PaRoom'];
    $pacfirstname = $_POST['pacfirstname'];
    $paclastname = $_POST['paclasttname'];
    $paccontactno = $_POST['Gender'];
    $pacemail = $_POST['pacemail'];
    $startdate = $_POST['pacstartDate'];
    $enddate = $_POST['pacendDate'];
    $street = $_POST['street'];
    $streetNumber = $_POST['streetNumber'];
    $city = $_POST['city'];
    $plz = $_POST['plz'];
    $userloginId = $_SESSION['id'];
    $sql1 = "insert into address(street,streetNumber,city,plz)value('$street','$streetNumber','$city','$plz');";
    $test = mysqli_query($con, $sql1);
    $retid = mysqli_query($con, "SELECT  * FROM address WHERE ID = (SELECT MAX(ID) FROM address)");
    $rowid = mysqli_fetch_array($retid);
    $intid = htmlentities($rowid['id']);
    $sql = mysqli_query($con, "insert into patient(firstName,LastName,doctorId,addressId,userloginId,gender,email,roomId,startDate,endDate) 
                                            values('$pacfirstname','$paclastname','$docspecialization','$intid','$userloginId','$paccontactno','$pacemail','$roomId','" . $startdate . "','" . $enddate . "')");
    if ($sql) {
        header('location: manage-patients.php');
    }
}
$datefrom = $_SESSION['Serverfixdatefrom'] ;
$dateto = $_SESSION['Serverfixdateto'] ;
$dateToday = date("Y-m-d") ;
if($datefrom <$dateToday && $dateToday<$dateto && $_SESSION['usertype'] !="admin" ){
    header('location:fixServer.php');
}
timeOut();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Admin | Add Doctor</title>
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
<link rel="stylesheet" href="assets/css/themes/theme-1.css"
	id="skin_color" />
<script type="text/javascript">
function valid()
{
 if(document.adddoc.npass.value!= document.adddoc.cfpass.value)
{
alert("Password and Confirm Password Field do not match  !!");
document.adddoc.cfpass.focus();
return false;
}
return true;
}
</script>
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
								<h1 class="mainTitle"><?php echo $_SESSION["login"]; ?> | Add Patient</h1>
							</div>
						</div>
					</section>
					<!-- end: PAGE TITLE -->
					<!-- start: BASIC EXAMPLE -->
					<div class="container-fluid container-fullw bg-white">
						<div class="row">
							<div class="col-md-12">
								<div class="row margin-top-30">
									<div class="col-lg-8 col-md-12">
										<div class="panel panel-white">
											<div class="panel-heading">
												<h5 class="panel-title">Add Patient</h5>
											</div>
											<div class="panel-body">
												<form role="form" name="adddoc" method="post"
													onSubmit="">
													<div class="form-group">
														<label for="DoctorsName"> Doctor Name </label> <select
															name="DoctorsName" class="form-control"
															required="required">
															<option value="">Select Doctor</option>
<?php

$ret = mysqli_query($con, "SELECT d.id, d.doctorName, COUNT(p.id) AS patients
 FROM doctor d left JOIN patient p
 ON d.id = p.doctorId
GROUP BY 
       d.id,
       d.doctorname
HAVING patients < 4");
while ($row = mysqli_fetch_array($ret)) {
    ?>
																<option value="<?php echo htmlentities($row['id']);?>">
																	<?php echo htmlentities($row['doctorName']);?>
																</option>
																<?php } ?>
																
															</select>
													</div>

													<div class="form-group">
														<label for="doctorname"> First Name </label> <input
															type="text" name="pacfirstname" class="form-control"
															placeholder="Enter Patient Name">
													</div>
													<div class="form-group">
														<label for="doctorname"> Last Name </label> <input
															type="text" name="paclasttname" class="form-control"
															placeholder="Enter Patient Name">
													</div>
													<div class="form-group">
														<label for="fess"> Patient Adress </label> <br /> <input
															style="width: 174px; float: left" type="text"
															name="street" class="form-control"
															placeholder="Enter Street"> <input
															style="width: 100px; float: left" type="text"
															name="streetNumber" class="form-control"
															placeholder=" StreetNumber"> <input
															style="width: 174px; float: left" type="text" name="city"
															class="form-control" placeholder="Enter City"> <input
															style="width: 174px; float: left" type="text" name="plz"
															class="form-control" placeholder="Enter PLZ"><br />
													</div>
													<br />

													<div class="form-group">
														<label for="fess"> Patient Contact no </label> <input
															type="text" name="paccontact" class="form-control"
															placeholder="Enter Patient Contact no">
													</div>

													<div class="form-group">
														<label for="fess"> Patient Email </label> <input
															type="email" name="pacemail" class="form-control"
															placeholder="Enter Doctor Email id">
													</div>

													<div class="form-group">
														<label for="fess"> Gender </label> <input type="text"
															name="Gender" class="form-control"
															placeholder="Enter Gender">
													</div>

													<label for="DoctorSpecialization"> Patient room </label> <select
														name="PaRoom" class="form-control" required="required">
														<option value="">Select Room</option>
										
														
<?php
$ret = mysqli_query($con, "SELECT roomId FROM patient GROUP BY roomId HAVING COUNT(*) < 4");

while ($row = mysqli_fetch_array($ret)) {
    ?>
																<option
															value="<?php echo htmlentities($row['roomId']);?>">
																	<?php echo htmlentities($row['roomId']);?>
																</option>
																<?php } ?>
											
															</select><br>
													<div class="form-group">
														<label for=""> StartDate </label><input type="date"
															name="pacstartDate" value="<?php echo date(""); ?>"
															id="datepicker" />
													</div>

													<div class="form-group">
														<label for=""> EndDate </label> <input type="date"
															name="pacendDate" value="<?php echo date(""); ?>"
															id="datepicker" />
													</div>

													<button type="submit" name="submit"
														class="btn btn-o btn-primary">Submit</button>
													</button>
													<button type=" " name="cancel" href="manage-patients.php"
														class="btn btn-o btn-primary">
														<a href="manage-patients.php"> <span> Cancel </span>
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
			<>
			<!-- end: SETTINGS -->
	</div>
	<!-- start: MAIN JAVASCRIPTS -->
	<script src="//code.jquery.com/jquery.js"></script>
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
