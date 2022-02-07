<!-- Sidebar -->
<!-- kelas sama kaya sidebaricon.php -->
<div class="sidebar sidebar-style-2">
	<div class="sidebar-wrapper scrollbar scrollbar-inner">
		<div class="sidebar-content">
			<div class="user">
				<div class="avatar-sm float-left mr-2">
					<img src=" <?php echo base_url('assets/image/'); ?><?php echo $profile->foto_am; ?> " class="avatar-img rounded-circle">
				</div>
				<div class="info">
					<a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
						<span>
							<?php
							echo $this->session->userdata('nama_am');
							?>
							<span class="user-level">
								<?php
								echo $this->session->userdata('kode_am');
								?></span>
							<span class="caret"></span>
						</span>
					</a>
					<div class="clearfix"></div>

					<div class="collapse in" id="collapseExample">
						<ul class="nav">
							<li class="nav-item">
								<?php $kode_am = $this->session->userdata('kode_am') ?>
								<a class="nav-link" href="<?= base_url('activity_am/profile') ?>">
									<i class="fas fa-user-circle"></i>
									<span class="link-collapse">My Profile</span>
								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<ul class="nav nav-primary">

				<?php if ($title == 'Plan') { ?>
					<li class="nav-item active">
					<?php } else { ?>
					<li class="nav-item">
					<?php } ?>
					<a class="nav-link" href="<?= base_url('activity_am/index') ?>">
						<i class="far fa-list-alt"></i>
						<span>Plan</span>
					</a>
					</li>

					<?php if ($title == 'Activity') { ?>
						<li class="nav-item active ">
						<?php } else { ?>
						<li class="nav-item"> <?php } ?>
						<a class="nav-link" href="<?= base_url('activity_am/activity') ?>">
							<i class="fas fa-clipboard-list"></i>
							<span>Activity</span>
						</a>
						</li>

						<?php if ($title == 'Customer Data') { ?>
							<li class="nav-item active submenu">
								<a data-toggle="collapse" href="#sidebarLayouts">
									<i class="far fa-chart-bar"></i>
									<span>Customer</span>
									<span class="caret"></span>
								</a>
								<div class="collapse" id="sidebarLayouts" class="collapse show">
									<ul class="nav nav-collapse">
										<li class="active">
											<a class="nav-link" href="<?= base_url('activity_am/dataCustomer') ?>">
												<span class="sub-item">Customer Data</span>
											</a>
										</li>
										<li>
											<a class="nav-link" href="<?= base_url('activity_am/customer') ?>">
												<span class="sub-item">Customer Engagement</span>
											</a>
										</li>
									</ul>
								</div>
							</li>
						<?php } elseif ($title == 'Customer') { ?>
							<li class="nav-item active submenu">
								<a data-toggle="collapse" href="#sidebarLayouts">
									<i class="far fa-chart-bar"></i>
									<span>Customer</span>
									<span class="caret"></span>
								</a>
								<div class="collapse" id="sidebarLayouts">
									<ul class="nav nav-collapse">
										<li>
											<a class="nav-link" href="<?= base_url('activity_am/dataCustomer') ?>">
												<span class="sub-item">Customer Data</span>
											</a>
										</li>
										<li class="active">
											<a class="nav-link" href="<?= base_url('activity_am/customer') ?>">
												<span class="sub-item">Customer Engagement</span>
											</a>
										</li>
									</ul>
								</div>
							</li>
						<?php } else { ?>
							<li class="nav-item">
								<a data-toggle="collapse" href="#sidebarLayouts">
									<i class="far fa-chart-bar"></i>
									<span>Customer</span>
									<span class="caret"></span>
								</a>
								<div class="collapse" id="sidebarLayouts">
									<ul class="nav nav-collapse">
										<li>
											<a class="nav-link" href="<?= base_url('activity_am/dataCustomer') ?>">
												<span class="sub-item">Customer Data</span>
											</a>
										</li>
										<li>
											<a class="nav-link" href="<?= base_url('activity_am/customer') ?>">
												<span class="sub-item">Customer Engagement</span>
											</a>
										</li>
									</ul>
								</div>
							</li>
						<?php } ?>


						<?php if ($title == 'Log') { ?>
							<li class="nav-item active">
							<?php } else { ?>
							<li class="nav-item">
							<?php } ?>

							<a class="nav-link" href="<?= base_url('activity_am/log') ?>">
								<i class="fas fa-search"></i>
								<span>Log</span>
							</a>
							</li>


							<?php if ($title == 'About') { ?>
								<li class="nav-item active ">
								<?php } else { ?>
								<li class="nav-item"> <?php } ?>

								<a class="nav-link" href="<?= base_url('activity_am/about') ?>">
									<i class="fas fa-info"></i>
									<span>About</span>
								</a>
								</li>

								<!-- disini untuk privacy policy -->

								<?php if ($title == 'Privacy Policy') { ?>
									<li class="nav-item active ">
									<?php } else { ?>
									<li class="nav-item"> <?php } ?>

									<a class="nav-link" href="<?= base_url('activity_am/privacy') ?>">
										<i class="fas fa-balance-scale"></i>
										<span>Privacy Policy</span>
									</a>
									</li>

									<!-- disini untuk versi -->

									<?php if ($title == 'Version') { ?>
										<li class="nav-item active ">
										<?php } else { ?>
										<li class="nav-item"> <?php } ?>

										<a class="nav-link" href="<?= base_url('activity_am/version') ?>">
											<i class="fas fa-code-branch"></i>
											<span>Version</span>
										</a>
										</li>


										<li class="nav-item" style="position: fixed;bottom: 0;">
											<a class="nav-link" href="<?= base_url('activity_am/menu') ?>">
												<i class="fas fa-arrow-circle-left"></i>
												<span>Back</span>
											</a>
										</li>

			</ul>
		</div>
	</div>
</div>
<!-- End Sidebar -->