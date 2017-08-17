<h1>Submit</h1>
<label>Hint:</label>
<div class="well">
  <?php echo $puzzle['hint']; ?>
</div>
<?php echo form_open('puzzle/submit', 'answer,puzzle_id', array('puzzle_id'=>$puzzle['puzzle_id'])) ?>
<label>Your Answer:</label>
<input type="text" name="answer" required="" class="form-control" autofocus="">
<button type="submit" class="btn btn-success">Submit</button>
<?php echo form_close(); ?>