<div class="row">
  <h1 class="col-md-2 "><?php echo "List Answers"; ?></h1>
  <table class="table table-striped table-hover ">
    <thead>
      <tr>
        <th>STT</th>
        <th>Username</th>
        <th>Homework</th>
        <th>Upload at</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($list_answers as $index => $answer): ?>
        <tr>
          <td><?php echo $index+1; ?></td>
          <td><?php echo $answer['username']; ?></td>
          <td><?php echo $answer['name']; ?></td>
          <td><?php echo $answer['time']; ?></td>
          <td>
            <a class="btn btn-info" href="<?php echo base_url()."homework/download_answer/".$answer['user_id'].'/'.$answer['homework_id']; ?>">Download</a>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table> 
</div>