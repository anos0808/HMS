<?php
if (session_id() == '') {
    session_start();
}
// error_reporting(0);
include ('include/config.php');
include ('include/checklogin.php');
check_login();
if (isset($_GET['del'])) {
    mysqli_query($con, "delete from doctor where id = '" . $_GET['id'] . "'");
    $_SESSION['msg'] = "data deleted !!";
}
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
<title>Admin | Manage Doctors</title>
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
								<h1 class="mainTitle">	<?php echo $_SESSION["login"]; ?> | Manage Doctors</h1>
							</div>

						</div>
					</section>
					<!-- end: PAGE TITLE -->
					<!-- start: BASIC EXAMPLE -->
					<div class="container-fluid container-fullw bg-white">
						<div class="row">
							<div class="col-md-12" style="height:453px ;">
							<input type="text" id="input" placeholder="Enter Name">
								<p style="color: red;"><?php echo htmlentities($_SESSION['msg']);?>
								<?php echo htmlentities($_SESSION['msg']="");?></p>
							<table  data-toggle="table" class="table table-hover  table-condensed" id="tabledata"   data-row-style="rowColors" data-striped="true"data-sort-name="Quality"data-sort-order="desc"data-pagination="true">
									<thead>
										<tr>
											<th data-sortable="true"><a
												>Specialization</a></th>
											<th data-sortable="true"><a >Doctor</a></th>
											<th style="width: 117px;"data-sortable="true" ><a>Start
													Date</a></th>
											<th style="width: 117px;" data-sortable="true"><a>End Date</a></th>
											<th style="width: 117px;" ><a
												>Action</a></th>
										</tr>
									</thead>
									<tbody>

<?php
$row = 0;
$rowperpage = 50;
$select = "SELECT * FROM doctor " . $orderby . " limit $row," . $rowperpage;
$sql = mysqli_query($con, $select);

$cnt = 1;
while ($row = mysqli_fetch_array($sql)) {
    ?>
											<tr>
											<td class="hidden-xs"><?php echo $row['specilization'];?></td>
											<td><?php echo $row['doctorName'];?></td>
											<td><?php echo $row['startDate'];?>
											<td><?php echo $row['endDate'];?>
												</td>
											<td>
												<div class="visible-md visible-lg hidden-sm hidden-xs">
													<a href="edit-doctor.php?id=<?php echo $row['id'];?>"
														class="btn btn-warning btn-xs" tooltip-placement="top"
														tooltip="Edit"><i class="fa fa-pencil"></i></a> <a
														href="manage-doctor.php?id=<?php echo $row['id']?>&del=delete"
														onClick="return confirm('Are you sure you want to delete?')"
														class="btn btn-warning btn-xs tooltips"
														tooltip-placement="top" tooltip="Remove"><i
														class="fa fa-times fa fa-white"></i></a>
												</div>
												<div class="visible-xs visible-sm hidden-md hidden-lg">
													<div class="btn-group" dropdown is-open="status.isopen">
														<button type="button"
															class="btn btn-primary btn-o btn-sm dropdown-toggle"
															dropdown-toggle>
															<i class="fa fa-cog"></i>&nbsp;<span class="caret"></span>
														</button>
														<ul class="dropdown-menu pull-right dropdown-light"
															role="menu">
															<li><a href="#"> Edit </a></li>
															<li><a href="#"> Share </a></li>
															<li><a href="#"> Remove </a></li>
														</ul>
													</div>
												</div>
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

$('#input').keyup(function () {
    table_search($('#input').val(),$('#tabledata tbody tr'),'012');
});
</script>
	<script>
function table_search(search,tr,indexSearch='0') {
    var regEx=/^[0-9]*$/;
    if (tr.length==0 || !regEx.test(indexSearch)){
        return;
    }
    /*hide tr don't contain search in input*/
    for (var i = 0; i <tr.length ; i++) {
        var resule='false';
        for (var j = 0; j < indexSearch.length ; j++) {
            if (tr.eq(i).children().length > indexSearch[j]) {
                if (tr.eq(i).children().eq(indexSearch[j]).text().indexOf(search)!=-1){
                    resule='success';
                    break;
                }
            }
        }
        if (resule=='success'){
            tr.eq(i).show();
        } else {
            tr.eq(i).hide();
        }
    }
}
</script>
</body>
</html>
