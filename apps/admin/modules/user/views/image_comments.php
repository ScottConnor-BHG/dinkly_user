<h3> Image Comment List</h3>
<div class="jumbotron">
<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="admin-user-list">
  <thead>
    <tr>
      <th>ID</th>
      <th>User Post ID</th>
      <th>Image ID</th>
      <th>Text</th>
    </tr>
  </thead>
  <tbody>
    <?php if(isset($image_comments)): ?>
    <?php foreach($image_comments as $pos => $comment): ?>
    <tr class="<?php echo ($pos % 2 == 0) ? 'odd' : 'even'; ?>">
      <td><?php echo $comment->getId(); ?></td>
      <td><?php echo $comment->getUserId(); ?></td>
      <td><?php echo $comment->getImageId(); ?></td>
      <td><?php echo $comment->getText(); ?></td>
    </tr> 
    <?php endforeach; ?>
  <?php endif; ?>
  </tbody>
</table>


</div>