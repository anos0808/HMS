<?php
if (session_id() == '') {
    session_start();
}
// error_reporting(0);
include ('include/config.php');
include ('include/checklogin.php');
check_login();
if (isset($_POST['btnsubmit'])) {
    $datefrom = $_POST['Datefrom'];
    $dateto = $_POST['Dateto'];
    $result = $_POST['Description'];
    $sql = mysqli_query($con, "insert into Serverreparatur(fixFrom,fixTo,result) values('$datefrom','$dateto','$result')");
    if ($sql) {
     echo "<script type='text/javascript'>alert('inserted Success'); </script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Admin | Manage Server</title>
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
								<h1 class="mainTitle">	<?php echo $_SESSION["login"]; ?> | Manage Server
								</h1>
							</div>

						</div>
					</section>
					<form method="post" action="" >
					<label for="peas">From:</label>
				<input type="date" data-date="" name="Datefrom"data-date-format="DD MMMM YYYY" value="2019-08-09"><br><br>
							<label for="peas">To:</label>
				<input type="date" data-date=""name="Dateto" data-date-format="DD MMMM YYYY" value="2019-08-09"><br><br>
					<textarea type="text"name="Description"rows="4" cols="50"  > Enter you Result.</textarea><br><br>
					 
					<button type="submit" name="btnsubmit" id="buttonServer"
					class="btn btn-o btn-primary" >Submit</button>
				
	</form>
				</div>
			</div>
			<!-- end: BASIC EXAMPLE -->
			<!-- end: SELECT BOXES -->

		</div>
	</div>
	</div>
	<div id="dataModal" title="Download complete">
  <p>
    <span class="ui-icon ui-icon-circle-check" style="float:left; margin:0 7px 50px 0;"></span>
    Your files have downloaded successfully into the My Downloads folder.
  </p>
  <p>
    Currently using <b>36% of your storage space</b>.
  </p>
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
	<script>


</script>

</body>
</html>