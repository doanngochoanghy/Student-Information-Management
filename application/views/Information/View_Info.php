 <!-- <h1>Information of <?php echo $user_info['username']; ?></h1> -->
 <div class="panel panel-info">
 	<div class="panel-heading">
 		<h2 class="panel-title">Information: <?php echo $user_info['username']; ?></h2>
 	</div>
 	<div class="panel-body">
 		<div class="col-md-12 col-md-offset-0">
 			<b><label class="">Name:</label> <?php echo $user_info['name']; ?></b>
 		</div>
 		<div class="col-md-12 col-md-offset-0">
 			<b><label class="">Email:</label> <?php echo $user_info['email']; ?></b>
 		</div>
 		<div class="col-md-12 col-md-offset-0">
 			<b><label class="">Phone:</label> <?php echo $user_info['phone']; ?></b>
 		</div>
 	</div>

 </div>
 <div class="row">
 	<div class="col-md-2">

 		<!-- Hiển thị nút Back -->
 		<?php echo form_open('information'); ?>
 		<button type="" class="btn btn-info col-md-8">Back</button>
 		<?php echo form_close(); ?>

 		

 	</div>
 	<div class="col-md-2">


 		<!-- Hiển thị nút Change Info -->
 		<?php if ($this->session->userdata('is_teacher')==1||$this->session->userdata('user_id')==$user_info['user_id']): ?>
 			<?php echo form_open('information/form_change', 'user_id',array('user_id'=>$user_info['user_id'])); ?>
 			<button type="submit" class="btn btn-warning col-md-8" >Change Info</button>
 			<?php echo form_close(); ?>
 		<?php endif; ?>

 	</div>
 	 	<div class="col-md-2">

 		<!-- Hiển thị nút Message -->
 		<?php if ($this->session->userdata('user_id')!=$user_info['user_id']): ?>
 			<?php echo form_open('information/view_message', array('sender_id','receiver_id'),array('sender_id'=>$this->session->userdata('user_id'),'receiver_id'=>$user_info['user_id'])); ?>
 			<button type="submit" class="btn btn-success col-md-8" >Message</button>
 			<?php echo form_close(); ?>

 		<?php endif; ?>

 	</div>

 </div>
