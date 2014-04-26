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
      <td><a class="delete-image" data-hash="<?php echo $image->getHash(); ?>"><span class="glyphicon glyphicon-remove"></span></a>
          <a class="view-image" data-hash="<?php echo $image->getHash(); ?>"data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-eye-open"></span></a>
      </td>
    </tr> 
    <?php endforeach; ?>
  </tbody>
</table>
</div>


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel"><?php echo $image->getTitle();?></h4>
      </div>
      <div class="modal-body">
        <img src="<?php echo "/img/files/".$image->getHash(); ?>">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

</body>
</html>