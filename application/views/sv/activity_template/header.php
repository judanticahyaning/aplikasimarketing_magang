<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="<?= base_url('assets/') ?>img/logo/logo_gt.png" type="image/x-icon" />
	<title><?php echo $title ?> </title>
	<!-- Fonts and icons -->
	<script src="<?= base_url('assets/') ?>js/plugin/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {
				"families": ["Lato:300,400,700,900"]
			},
			custom: {
				"families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"],
				urls: ['../assets/css/fonts.min.css']
			},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!-- CSS Files -->
	<link rel="stylesheet" href="<?= base_url('assets/') ?>css/bootstrap.min.css">
	<link rel="stylesheet" href="<?= base_url('assets/') ?>css/atlantis.min.css">
	<link rel="stylesheet" href="<?= base_url('assets/') ?>css/additional.css">


	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link rel="stylesheet" href="<?= base_url('assets/') ?>css/demo.css">
</head>

<body>

	<div class="wrapper">
		<div class="main-header">