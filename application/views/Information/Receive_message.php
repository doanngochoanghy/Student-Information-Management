<h1>Received Message</h1>
<table class="table table-striped table-hover ">
  <thead>
    <tr>
      <th>STT</th>
      <th>From</th>
      <th>Name</th>
      <th>Content</th>
      <th>Time</th>

    </tr>
  </thead>
  <tbody>
  <?php foreach ($list_messages as $index => $message): ?>
    <tr>
      <td><?php echo $index+1; ?></td>
      <td><?php echo $message['username']; ?></td>
      <td><?php echo $message['name']; ?></td>
      <td><?php echo $message['content'];?></td>
      <td><?php echo $message['time'];?></td>
    </tr>
  <?php endforeach; ?>
  </tbody>
</table> 
