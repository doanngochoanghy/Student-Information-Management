<h1>Upload Puzzle</h1>
<?php echo form_open_multipart('puzzle/upload_puzzle');?>

<input type="file" name="puzzle" size="20"  />
<br>
<label>Hint:</label>
<input type="text" class="form-control" name="hint"><br><br>
<input type="submit" value="upload" class="btn btn-success" />

</form>