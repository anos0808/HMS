<div class="sidebar app-aside" id="sidebar">
	<div class="sidebar-container perfect-scrollbar">

		<nav>

			<!-- start: MAIN NAVIGATION MENU -->
			<div class="navbar-title">
				<span>Main Navigation</span>
			</div>
			<ul class="main-navigation-menu">
				<li><a href="dashboard">
						<div class="item-content">
							<div class="item-media">
								<i class="ti-home"></i>
							</div>
							<div class="item-inner">
								<span class="title"> Dashboard </span>
							</div>
						</div>
				</a></li>
				<li><a href="javascript:void(0)">
						<div class="item-content">
							<div class="item-media">
								<i class="ti-user"></i>
							</div>
							<div class="item-inner">
								<span class="title"> Doctors </span><i class="icon-arrow"></i>
							</div>
						</div>
				</a>
					<ul class="sub-menu">
						<li><a href="doctor-specilization"> <span class="title">
									Doctor Specialization </span>
						</a></li>
						<li><a href="add-doctor"> <span class="title"> Add Doctor</span>
						</a></li>
						<li><a href="Manage-doctor"> <span class="title"> Manage
									Doctors </span>
						</a></li>

					</ul></li>

				<li><a href="javascript:void(0)">
						<div class="item-content">
							<div class="item-media">
								<i class="ti-user"></i>
							</div>
							<div class="item-inner">
								<span class="title"> Patients </span><i class="icon-arrow"></i>
							</div>
						</div>
				</a>
					<ul class="sub-menu">

						<li><a href="manage-patients"> <span class="title"> Manage
									Patients </span>
						</a></li>
						<li><a href="add-patient.php"> <span class="title"> Add Patients </span>
						</a></li>
						<li><a href="usershasnotdoctor"> <span class="title"> Patient
									have not Doctor</span>
						</a></li>
					</ul></li>
				<li><a href="javascript:void(0)">
						<div class="item-content">
							<div class="item-media">
								<i class="ti-home"></i>
							</div>
							<div class="item-inner">
								<span class="title"> Rooms </span><i class="icon-arrow"></i>
							</div>
						</div>
				</a>
					<ul class="sub-menu">

						<li><a href="manage-rooms"> <span class="title"> Manage Rooms
							</span>
						</a></li>

					</ul></li>

				<li><a href="javascript:void(0)">
						<div class="item-content">
							<div class="item-media">
								<i class="ti-money"></i>
							</div>
							<div class="item-inner">
								<span class="title"> Bill </span><i class="icon-arrow"></i>
							</div>
						</div>
				</a>
					<ul class="sub-menu">

						<li><a href="manage-Bills"> <span class="title"> Manage Bill </span>
						</a></li>

					</ul></li>

				<li><a href="appointment-history">
						<div class="item-content">
							<div class="item-media">
								<i class="ti-file"></i>
							</div>
							<div class="item-inner">
								<span class="title"> Appointment History </span>
							</div>
						</div>
				</a></li>

				<li><a href="doctor-logs">
						<div class="item-content">
							<div class="item-media">
								<i class="ti-list"></i>
							</div>
							<div class="item-inner">
								<span class="title"> Doctor Session Logs </span>
							</div>
						</div>
				</a></li>

			<?php if($_SESSION['usertype'] == "admin") { ?>
					<li><a href="ServerSetting">
						<div class="item-content">
							<div class="item-media">
								<i class="ti-list"></i>
							</div>
							<div class="item-inner">
								<span class="title"> ServerSetting </span>
							</div>
						</div>
				</a></li>
			<?php } ?>
				
			</ul>
			<!-- end: CORE FEATURES -->

		</nav>
	</div>
</div>