<!-- Logo Header -->
<div class="logo-header bg-logo">

	<a href="<?php base_url('index') ?>" class="logo">
		<img src="<?= base_url('template/') ?>img/logo2.png" alt="logo" style="width: 65px; margin-left: 50px"> </a>
	</a>
	<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon">
			<i class="icon-menu"></i>
		</span>
	</button>
	<button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
	<div class="nav-toggle">
		<button class="btn btn-toggle toggle-sidebar">
			<i class="icon-menu"></i>
		</button>
	</div>
</div>
<!-- End Logo Header -->
<!-- Navbar Header -->
<nav class="navbar navbar-header navbar-expand-lg bg-topbar">

	<div class="container-fluid">

		<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
			<li class="nav-item dropdown hidden-caret">
				<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
					<div class="avatar-sm">
						<img src=" <?php echo base_url('assets/image/'); ?><?php echo $profile->foto_am; ?> " class="avatar-img rounded-circle">
					</div>
				</a>
				<ul class="dropdown-menu dropdown-user animated fadeIn">
					<div class="dropdown-user-scroll scrollbar-outer">
						<li>
							<div class="user-box">
								<div class="avatar-lg"><img src=" <?php echo base_url('assets/image/'); ?><?php echo $profile->foto_am; ?> " class="avatar-img rounded-circle"></div>
								<div class="u-text">
									<h4><?php
										echo $this->session->userdata('nama_am');
										?>
									</h4>
									<p class="text-muted">
										<?php
										echo $this->session->userdata('kode_am');
										?>
									</p>
								</div>
							</div>
						</li>
						<li>
							<div class="dropdown-divider"></div>
							<?php $kode_am = $this->session->userdata('kode_am') ?>
							<a class="dropdown-item" href="<?= base_url('activity_am/profile') ?>">My Profile</a>
							<a class="dropdown-item log-out" href="<?= base_url('login/logout') ?>">Logout</a>
						</li>
					</div>
				</ul>
			</li>
		</ul>
	</div>
</nav>
<!-- End Navbar -->
</div>