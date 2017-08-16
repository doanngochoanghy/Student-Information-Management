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
            <a class="btn btn-info" href="<?php echo base_url()."homework/download_homework/".$homework['homework_id'] ?>">Download</a>
          </td>
          <?php if ($this->session->userdata('is_teacher')!=1): ?>
            <td>
              <a class="btn btn-info" href="<?php echo base_url()."homework/upload_answer_form/".$homework['homework_id'] ?>">Upload bài làm</a>
            </td>
          <?php else: ?>
            <td>
              <a class="btn btn-info" href="<?php echo base_url()."homework/list_answers/".$homework['homework_id'] ?>">Danh sách bài làm</a>
            <?php endif; ?>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table> 
</div>