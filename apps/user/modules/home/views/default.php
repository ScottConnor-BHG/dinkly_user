<div class="container" >

      <div class="row">
        <div class="col-sm-2">
        </div>
        <div class="col-sm-8">

            
            <?php if(isset($images)): ?>
              <?php foreach($images as $pos => $image): ?>
                <div class="blog-post show-image" style="max-width:600px;">
                  <?php
                  $url="/img/files/thumbnails/" . $image->getTitle();


                  echo '<img src="' . $url . '"  class="img-responsive" alt="Responsive image">';
                  
                  echo '<button type="button" class="btn btn-primary btn-sm button-like" id="' . $image->getId(). '" data-toggle="modal" data-target="#myModal">
                          <span class="glyphicon glyphicon-thumbs-up"></span>
                        </button>';
                  // echo '<a href="#" class="pull-right">Comments</a>';
                  echo '<button type="button" class="btn btn-primary btn-sm button-comment" id="' . $image->getId(). '" data-toggle="modal" data-target="#myModal">
                          <span class="glyphicon glyphicon-comment"></span>
                        </button>';
                  ?>
               </div><!-- /.blog-post -->

              <?php endforeach; ?>
            <?php endif; ?>
          


<!--           <ul class="pager">
            <li><a href="#">Previous</a></li>
            <li><a href="#">Next</a></li>
          </ul> -->

        </div><!-- /.blog-main -->
        <div class="col-sm-2">
        </div>
      </div><!-- /.row -->



  <div style="height:500px;">
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>



