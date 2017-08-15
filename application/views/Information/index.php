<h1>Thông tin sinh viên</h1>
<table class="table table-striped table-hover ">
  <thead>
    <tr>
      <th>STT</th>
      <th>Username</th>
      <th>Name</th>
      <th>Role</th>
      <th>Info</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach ($list_user as $index => $user): ?>
    <tr>
      <td><?php echo $index+1; ?></td>
      <td><?php echo $user['username']; ?></td>
      <td><?php echo $user['name']; ?></td>
      <td><?php echo $user['is_teacher']==1?"Teacher":"Student"; ?></td>
      <td>
      <?php echo form_open('information/view_info', 'user_id',array('user_id'=>$user['user_id'])); ?>
      <button type="submit" class="btn btn-info btn-sm">Info</button>
      <?php echo form_close(); ?>
      </td>
    </tr>
  <?php endforeach; ?>
  </tbody>
</table> 
