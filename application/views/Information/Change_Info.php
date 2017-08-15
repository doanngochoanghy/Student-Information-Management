<h1><?php echo "Change Information"; ?></h1>
<?php echo validation_errors(); ?>
<?php echo form_open('Information/change_info','user_id',array('user_id'=>$user_info['user_id'])); ?>
<div class="row">
	<div class="col-md-4 col-md-offset-4">
		<div class="form-group">
			<label>Username</label>

			<input type="text" class="form-control" name="username" value="<?php echo $user_info['username'] ?>" placeholder="Username" required="" readonly>

		</div>
		<div class="form-group">
			<label>Name</label>
			<input type="text" class="form-control" name="name" placeholder="Name" value="<?php echo $user_info['name'] ?>" required="" readonly>
		</div>
		<div class="form-group">
			<label>Email</label>
			<input type="text" class="form-control" name="email" placeholder="Email" value="<?php echo $user_info['email']; ?>" required="" >
		</div>
		<div class="form-group">
			<label>Phone</label>
			<input type="text" class="form-control" name="phone" placeholder="Phone" value="<?php echo $user_info['phone']; ?>" required="">
		</div>
		<div class="form-group">
			<div class="col-md-12 col-md-offset-0">
				<button type="submit" class="btn btn-warning">Change</button>
				<button type="reset" class="btn btn-danger disable">Cancel</button>
			</div>

		</div>
	</div>
</div>
<?php form_close(); ?>
