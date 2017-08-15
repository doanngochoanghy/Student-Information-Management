<h1><?php echo "Send Message"; ?></h1>
<?php echo validation_errors(); ?>
<?php echo form_open('information/send_message',array('sender_id','receiver_id','content'),array('sender_id'=>$message_info['sender_id'],'receiver_id'=>$message_info['receiver_id'],'content'=>$message_info['content'])); ?>
<div class="row">
	<div class="col-md-4 col-md-offset-4">
		<div class="form-group">
			<label>From</label>

			<input type="text" class="form-control" name="sender_username" value="<?php echo $sender_info['username'] ?>" required="" readonly>

		</div>
		<div class="form-group">
			<label>To</label>
			<input type="text" class="form-control" name="receiver_username" value="<?php echo $receiver_info['username'] ?>" required="" readonly>
		</div>
		<div class="form-group">
			<label>Content</label>
			<input type="text" class="form-control" name="content" placeholder="Write message here" value="<?php echo $message_info['content']; ?>" required="">
		</div>
		<div class="form-group">
			<div class="col-md-12 col-md-offset-0">
				<label>Sent at: <?php echo $message_info['time']; ?></label>
			</div>
			<div class="col-md-12 col-md-offset-0">
				<button type="submit" class="btn btn-warning">Send</button>
				<button type="reset" class="btn btn-danger disable">Cancel</button>
			</div>
		</div>
	</div>
</div>
<?php form_close(); ?>
