<h3> Image Like List</h3>
<div class="jumbotron">
<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="like-list">
  <thead>
    <tr>
      <th>ID</th>
      <th>User Post ID</th>
      <th>Image ID</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php if(isset($image_likes)): ?>
    <?php foreach($image_likes as $pos => $image_like): ?>
    <tr class="<?php echo ($pos % 2 == 0) ? 'odd' : 'even'; ?>">
      <td><?php echo $image_like->getId(); ?></td>
      <td><?php echo $image_like->getUserId(); ?></td>
      <td><?php echo $image_like->getImageId(); ?></td>
      <td>
        <a class="delete-like" data-id="<?php echo $image_like->getId(); ?>"><span class="glyphicon glyphicon-remove"></span></a>
      </td>

    </tr> 
    <?php endforeach; ?>
  <?php endif; ?>
  </tbody>
</table>


</div>