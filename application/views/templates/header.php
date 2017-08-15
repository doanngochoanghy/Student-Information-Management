<!DOCTYPE html>
<html>
<head>
	<title>QLTTSV</title>
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="">
 <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
 <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
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
              <div class="btn-group">
                <a href="#" class="btn btn-success"><?php echo form_open('information/view_info','user_id',array('user_id'=>$this->session->userdata('user_id'))); ?>
                  <button type="" class="btn btn-success col-md-8 col-md-offset-2">Infomation</button>
                  <?php echo form_close(); ?></a>
                <a href="#" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><span class="caret"></span></a>
                <ul class="dropdown-menu" style="width: 20%">
                  <li>
                  <?php echo form_open('information/view_info','user_id',array('user_id'=>$this->session->userdata('user_id'))); ?>
                  <button type="" class="btn btn-success btn-sm col-md-8 col-md-offset-2">Infomation</button>
                  <?php echo form_close(); ?>
                  </li>
                  <li>
                  <?php echo form_open('information/receive_message'); ?>
                  <button type="" class="btn btn-success btn-sm col-md-8 col-md-offset-2">Message</button>
                  <?php echo form_close(); ?>
                  </li>

                </ul>
              </div>
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