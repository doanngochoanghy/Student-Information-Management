<div class="row">
  <h1 class="col-md-2 "><?php echo "Đố vui"; ?></h1>
  <?php if ($this->session->userdata('is_teacher')==1):?>
    <a href="upload_puzzle_form" class="btn btn-info col-md-1 col-md-offset-9">Upload</a>
  <?php endif; ?>
  <table class="table table-striped table-hover ">
    <thead>
      <tr>
        <th>STT</th>
        <th>Upload at</th>
        <th>Hint</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($list_puzzles as $index => $puzzle): ?>
        <tr>
          <td><?php echo $index+1; ?></td>
          <td><?php echo $puzzle['time']; ?></td>
          <td><?php echo $puzzle['hint']; ?></td>
          <?php if ($this->session->userdata('is_teacher')!=1): ?>
            <td>
            <a class="btn btn-info" href="<?php echo base_url()."puzzle/submit_form/".$puzzle['puzzle_id'] ?>">Submit</a>
            </td>
          <?php else: ?>
            <td>
              <!-- <a class="btn btn-info" href="<?php echo base_url()."homework/list_answers/".$homework['homework_id'] ?>">Danh sách bài làm</a> -->
            <?php endif; ?>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table> 
</div>