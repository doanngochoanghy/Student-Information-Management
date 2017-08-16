<h1>Upload Answer</h1>
<?php echo form_open_multipart('homework/upload_answer/'.$homework_id);?>

<input type="file" name="answer" size="20"  />
<br>
<input type="submit" value="upload" class="btn btn-success" />

</form>