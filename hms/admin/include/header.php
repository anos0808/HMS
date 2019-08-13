<?php error_reporting(0);?>
<header  class="navbar navbar-default navbar-static-top ">
					<!-- start: NAVBAR HEADER -->
					<div class="navbar-header" style="background-color: #bcbd00">
						<a href="#" class="sidebar-mobile-toggler pull-left hidden-md hidden-lg" class="btn btn-navbar sidebar-toggle" data-toggle-class="app-slide-off" data-toggle-target="#app" data-toggle-click-outside="#sidebar">
							<i class="ti-align-justify"></i>
						</a>
						<a class="navbar-brand" href="#" style="background-color: #bcbd00">
							<h2 style="padding-top:31% ">HSP</h2>
						</a>
						<a href="#" class="sidebar-toggler pull-right visible-md visible-lg" data-toggle-class="app-sidebar-closed" data-toggle-target="#app" style="background-color: #bcbd00">
							<i class="ti-align-justify" style="background-color: #bcbd00"></i>
						</a>
						<a class="pull-right menu-toggler visible-xs-block" id="menu-toggler" data-toggle="collapse" href=".navbar-collapse" style="background-color: #bcbd00">
							<span class="sr-only" style="background-color: #bcbd00">Toggle navigation</span>
							<i class="ti-view-grid"></i>
						</a>
					</div>
					<!-- end: NAVBAR HEADER -->
					<!-- start: NAVBAR COLLAPSE -->
					<div class="navbar-collapse collapse navbar-red" style="background-color: #bcbd00">
						<ul class="nav navbar-right" style="background-color: #bcbd00">
							<!-- start: MESSAGES DROPDOWN -->
								<li  style="padding-top:2% " style="background-color: #bcbd00">
								<h2>Hospital Management System</h2>
							</li>
							<li class="dropdown current-user" style="background-color: #bcbd00">
								<a href class="dropdown-toggle" data-toggle="dropdown" style="background-color: #bcbd00">
									<img src="assets/images/avatar-1.jpg" alt="Peter"> <span class="username">
			<?php echo $_SESSION["login"]; ?>
									<i class="ti-angle-down"></i></i></span>
								</a>
								<ul class="dropdown-menu dropdown-dark">
									<li>
										<a href="change-password.php">
											Change Password
										</a>
									</li>
									<li>
										<a href="logout.php">
											Log Out
										</a>
									</li>
								</ul>
							</li>
							<!-- end: USER OPTIONS DROPDOWN -->
						</ul>
						<!-- start: MENU TOGGLER FOR MOBILE DEVICES -->
						<div class="close-handle visible-xs-block menu-toggler" data-toggle="collapse" href=".navbar-collapse" >
							<div class="arrow-left" style="background-color: red"></div>
							<div class="arrow-right" style="background-color: red"></div>
						</div>
						<!-- end: MENU TOGGLER FOR MOBILE DEVICES -->
					</div>
					<!-- end: NAVBAR COLLAPSE -->
				</header>
