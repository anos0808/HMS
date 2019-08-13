<?php
require_once "RoomManagement.php";
$projectName = "StartTuts";
$RoomManagement = new RoomManagement();
$roomsResult = $RoomManagement->getAllRooms();
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
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<style>
body {
	font-family: arial;
}
.task-board {
	background: #9c2c9c;
	display: inline-block;
	padding: 12px;
	border-radius: 3px;
	width: 1200px;
	height: 700px;
	margin-left: 150px;
	white-space: nowrap;
	overflow-x: scroll;
	min-height: 300px;
	margin-left: -14px;
	margin-top: 0px;
}

.status-card {
	width: 250px;
	margin-right: 8px;
	background: #0c0d0e;
	border-radius: 3px;
	display: inline-block;
	vertical-align: top;
	font-size: 0.9em;
}

.status-card:last-child {
	margin-right: 0px;
}

.card-header {
	width: 100%;
	padding: 10px 10px 0px 10px;
	box-sizing: border-box;
	border-radius: 3px;
	display: block;
	font-weight: bold;
}

.card-header-text {
	display: block;
}

ul.sortable {
	padding-bottom: 10px;
}

ul.sortable li:last-child {
	margin-bottom: 0px;
}

ul {
	list-style: none;
	margin: 0;
	padding: 0px;
}

.text-row {
	padding: 15px 10px;
	margin: 10px;
	background: #fff;
	box-sizing: border-box;
	border-radius: 3px;
	border-bottom: 1px solid #ccc;
	cursor: pointer;
	font-size: 0.8em;
	white-space: normal;
	line-height: 20px;
}

.ui-sortable-placeholder {
	visibility: inherit !important;
	background: transparent;
	border: #666 2px dashed;
}
</style>
</head>
<body>
	<div id="app">		
<?php include('include/sidebar.php');?>
										<?php include('include/header.php');?>
						<!-- start: MENU TOGGLER FOR MOBILE DEVICES -->
		<!-- end: TOP NAVBAR -->
		<div class="main-content">
			<div class="wrap-content container" id="container">
				<!-- start: PAGE TITLE -->
				<div class="task-board">
            <?php
            foreach ($roomsResult as $statusRow) {
                $taskResult = $RoomManagement->getPatientByRoom($statusRow["id"], $projectName);
                ?>
                <div class="status-card">
						<div class="card-header">
							<span style="color: white;" class="card-header-text">Room:<?php echo  $statusRow["roomId"] ; ?></span>
						</div>
						<ul class="sortable ui-sortable"
							id="sort<?php echo $statusRow["id"] ; ?>"
							data-status-id="<?php echo $statusRow["id"]; ?>">
                <?php
                if (! empty($taskResult)) {
                    foreach ($taskResult as $taskRow) {
                        ?>
                     <li class="text-row ui-sortable-handle"
								data-room-id="<?php echo $taskRow["id"]; ?>"><?php echo $taskRow["firstName"]; ?></li>
                <?php
                    }
                }
                ?>
                                                 </ul>
					</div>
                <?php
            }
            ?>
        </div>
			</div>
			<!-- end: BASIC EXAMPLE -->
			<!-- end: SELECT BOXES -->
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
	<script
		src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
	<script>
 $( function() {
     var url = 'edit-status.php';
     $('ul[id^="sort"]').sortable({
         connectWith: ".sortable",
         receive: function (e, ui) {
             var room_id = $(ui.item).parent(".sortable").data("status-id");
             var id = $(ui.item).data("room-id");
          
             $.ajax({
                 url: url+'?roomId='+room_id+'&id='+id,
                 success: function(response){      
                     }
             });
             }
     }).disableSelection();
     } );
  </script>
</body>
</html>
