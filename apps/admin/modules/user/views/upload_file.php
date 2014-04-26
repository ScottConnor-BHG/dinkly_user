<html>
<body>
<div class="jumbotron" >
<h2> Upload Image</h2>
<hr>
<form action="/admin/user/upload/" method="post"
enctype="multipart/form-data" >
<label for="file">Filename:</label>
<input type="file" name="file" id="file"><br>
<input type="submit" class="btn btn-success" name="submit" value="Submit">
</form>
</div>
<div class="jumbotron">
<h2> Image List</h2>
<hr>
<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="image-list">
  <thead>
    <tr>
      <th>ID</th>
      <th>Created</th>
      <th>Updated</th>
      <th>Title</th>
      <th>Hash</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($images as $pos => $image): ?>
    <tr class="<?php echo ($pos % 2 == 0) ? 'odd' : 'even'; ?>">
      <td><?php echo $image->getId(); ?></td>
      <td><?php echo $image->getCreatedAt(); ?></td>
      <td><?php echo $image->getUpdatedAt(); ?></td>
      <td><?php echo $image->getTitle(); ?></td>
      <td><?php echo $image->getHash(); ?></td>
      <td></td>
    </tr> 
    <?php endforeach; ?>
  </tbody>
</table>
</div>

</body>
</html>