<div class="row">
<h1 class="col-md-2 "><?php echo "Bài tập"; ?></h1>
<?php if ($this->session->userdata('is_teacher')==1):?>
<a href="homework/upload_form" class="btn btn-info col-md-1 col-md-offset-9">Upload</a>
<?php endif; ?>
<table class="table table-striped table-hover ">
  <thead>
    <tr>
      <th>STT</th>
      <th>Name</th>
      <th>Upload at</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
  <?php foreach ($list_homeworks as $index => $homework): ?>
    <tr>
      <td><?php echo $index+1; ?></td>
      <td><?php echo $homework['name']; ?></td>
      <td><?php echo $homework['time']; ?></td>
      <td>
      <!-- <?php echo form_open('information/view_info', 'homework_id',array('homework_id'=>$homework['user_id'])); ?> -->
      <button type="submit" class="btn btn-info">Download</button>
      <!-- <?php echo form_close(); ?> -->
      </td>
    </tr>
  <?php endforeach; ?>
  </tbody>
</table> 
</div>