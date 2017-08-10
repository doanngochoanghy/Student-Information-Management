<!DOCTYPE html>
<html>
<head>
	<title>QLTTSV</title>
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="">
</head>
<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="<?php echo base_url(); ?>">QLTTSV</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="<?php echo base_url(); ?>information">Thông tin sinh viên</a></li>
        <li><a href="#">Bài tập</a></li>
        <li><a href="#">Đố vui</a></li>
      </ul>
      <?php if(!$this->session->userdata('loggedin')): ?>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="<?php echo base_url(); ?>users/login">Log In</a></li>
        <li><a href="<?php echo base_url(); ?>users/register">Register</a></li>
      </ul>
    <?php else: ?>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="<?php echo base_url(); ?>users/logout">Log Out</a></li>
        <li><a href="#"><?php echo $this->session->userdata('username'); ?></a></li>
      </ul>
    </div>
  <?php endif; ?>
  </div>
</nav>
<div class="container">
<?php if ($this->session->flashdata('message')): ?>
<div class="alert alert-dismissible alert-warning">
  <p>
    <?php echo $this->session->flashdata('message'); ?>
  </p>
</div>
<?php endif; ?>