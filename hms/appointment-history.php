<?php
 if(!isset($_SESSION)) 
//error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();
if(isset($_GET['cancel']))
{
    mysqli_query($con,"update appointment set userStatus='0' where id = '".$_GET['id']."'");
    $_SESSION['msg']="Your appointment canceled !!";
}
$datefrom = $_SESSION['Serverfixdatefrom'] ;
$dateto = $_SESSION['Serverfixdateto'] ;
$dateToday = date("Y-m-d") ;
if($datefrom <$dateToday && $dateToday<$dateto && $_SESSION['usertype'] !="admin" ){
    header('location:fixServer.php');
}
Timeout();
?>
    <!DOCTYPE html>
    <html lang="en">
    
    <head>
    
        <title>User | Appointment History</title>
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
                                            <h1 class="mainTitle">User  | Appointment History</h1>
                                        </div>
                                        <ol class="breadcrumb">
                                            <li>
                                                <span>User </span>
                                            </li>
                                            <li class="active">
                                                <span>Appointment History</span>
                                            </li>
                                        </ol>
                                    </div>
                                </section>
                                <!-- end: PAGE TITLE -->
                                <!-- start: BASIC EXAMPLE -->
                                <div class="container-fluid container-fullw bg-white">

                                    <div class="row">
                                        <div class="col-md-12">

                                            <p style="color:red;">
                                                <?php echo htmlentities($_SESSION['msg']);?>
                                                    <?php echo htmlentities($_SESSION['msg']="");?>
                                            </p>
                                          
                                            <table  data-toggle="table" class="table table-hover  table-condensed" id="tabledata"  
                                            data-striped="true"data-sort-name="Quality"data-sort-order="desc"data-pagination="true">
                                                <thead>
                                                    <tr>
                                                        <th >#</th>
                                                        <th  data-sortable="true">Doctor Name</th>
                                                        <th data-sortable="true">Specialization</th>
                                                        <th data-sortable="true">Consultancy Fee</th>
                                                        <th data-sortable="true">Appointment Date / Time </th>
                                                        <th data-sortable="true">Appointment Creation Date </th>
                                                        <th data-sortable="true">Current Status</th>
                                                        <th data-sortable="true">Action</th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
$sql=mysqli_query($con,"select doctor.doctorName as docname,appointment.*  from appointment join doctor on doctor.id=appointment.doctorId where appointment.userId='".$_SESSION['id']."'");
$cnt=1;
while($row=mysqli_fetch_array($sql))
{
?>

                                                        <tr>
                                                            <td class="center">
                                                                <?php echo $cnt;?>.</td>
                                                            <td class="hidden-xs">
                                                                <?php echo $row['docname'];?>
                                                            </td>
                                                            <td>
                                                                <?php echo $row['doctorSpecialization'];?>
                                                            </td>
                                                            <td>
                                                                <?php echo $row['consultancyFees'];?>
                                                            </td>
                                                            <td>
                                                                <?php echo $row['appointmentDate'];?> /
                                                                    <?php echo
												 $row['appointmentTime'];?>
                                                            </td>
                                                            <td>
                                                                <?php echo $row['postingDate'];?>
                                                            </td>
                                                            <td>
                                                                <?php if(($row['userStatus']==1) && ($row['doctorStatus']==1))  
{
	echo "Active";
}
if(($row['userStatus']==0) && ($row['doctorStatus']==1))  
{
	echo "Cancel by You";
}

if(($row['userStatus']==1) && ($row['doctorStatus']==0))  
{
	echo "Cancel by Doctor";
}

												?>
                                                            </td>
                                                            <td>
                                                                <div class="visible-md visible-lg hidden-sm hidden-xs">
                                                                    <?php if(($row['userStatus']==1) && ($row['doctorStatus']==1))  

	{ ?>

                                                                        <a href="appointment-history.php?id=<?php echo $row['id']?>&cancel=update" onClick="return confirm('Are you sure you want to cancel this appointment ?')" class="btn btn-transparent btn-xs tooltips" title="Cancel Appointment" tooltip-placement="top" tooltip="Remove">Cancel</a>
                                                                        <?php }
 else {

		echo "Canceled";
		} ?>
                                                                </div>
                                                                <div class="visible-xs visible-sm hidden-md hidden-lg">
                                                                    <div class="btn-group" dropdown is-open="status.isopen">
                                                                        <button type="button" class="btn btn-primary btn-o btn-sm dropdown-toggle" dropdown-toggle>
                                                                            <i class="fa fa-cog"></i>&nbsp;<span class="caret"></span>
                                                                        </button>
                 
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>

                                                        <?php 
$cnt=$cnt+1;
											 }?>

                                                </tbody>
                                            </table>
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
    </body>

    </html>