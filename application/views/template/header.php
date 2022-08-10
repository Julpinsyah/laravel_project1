<?php $this->benchmark->mark('code_start'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Basic Page Needs
    ================================================== -->
  <meta charset="utf-8" />
  <!--[if IE]><meta http-equiv="x-ua-compatible" content="IE=9" /><![endif]-->
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>IJECK FC - Football Club</title>
  <meta name="description" content="IJECK FC - Football Club" />
  <meta name="keywords" content="prosoccer, football, club, soccer, bootstrap" />
  <meta name="author" content="iject-fc.com" />

  <!-- ==============================================
	Favicons
	=============================================== -->
  <link rel="shortcut icon" href="<?= base_url('adminfc/public/images/img/') . 'logo.png' ?>" />
  <link rel="apple-touch-icon" href="<?= base_url('adminfc/public/images/img/') . 'ijeck-icon.png' ?>" />
  <link rel="apple-touch-icon" sizes="72x72" href="<?= base_url('adminfc/public/images/img/') . 'ijeck-icon.png' ?>" />
  <link rel="apple-touch-icon" sizes="114x114" href="<?= base_url('adminfc/public/images/img/') . 'ijeck-icon.png' ?>" />

  <!-- ==============================================
	CSS
	=============================================== -->
  <!-- <link rel="stylesheet" type="text/css" href="<?= base_url('vendor/') . 'css/font-awesome.min.css' ?>" /> -->
  <link rel="stylesheet" type="text/css" href="<?= base_url('vendor/') . 'css/bootstrap.css' ?>" />
  <link rel="stylesheet" href="<?= base_url('vendor/') . 'fontawesome/css/fontawesome.css' ?>" />
  <link rel="stylesheet" href="<?= base_url('vendor/') . 'fontawesome/css/brands.css' ?>" />
  <link rel="stylesheet" href="<?= base_url('vendor/') . 'fontawesome/css/solid.css' ?>" />
  <link rel="stylesheet" type="text/css" href="<?= base_url('vendor/') . 'css/owl.carousel.css' ?>" />
  <link rel="stylesheet" type="text/css" href="<?= base_url('vendor/') . 'css/owl.theme.css' ?>" />
  <link rel="stylesheet" type="text/css" href="<?= base_url('vendor/') . 'css/magnific-popup.css' ?>" />

  <!-- ==============================================
	Google Fonts
	=============================================== -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet" type="text/css" />
  <?php if ($this->uri->segment(2) == 'contact') echo '
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet" />
  '; ?>


  <!-- ==============================================
	Custom Stylesheet
	=============================================== -->
  <link rel="stylesheet" type="text/css" href="<?= base_url('vendor/') . 'css/style.css' ?>" />

  <script type="text/javascript" src="<?= base_url('vendor/') . 'js/modernizr.min.js' ?>"></script>

  <script>
    var BASE_URL = '<?= base_url(); ?>';
  </script>
</head>

<body>

  <!-- Load page -->
  <div class="animationload">
    <div class="loader"></div>
  </div>