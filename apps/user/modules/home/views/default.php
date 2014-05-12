<div class="container" >

      <div class="row">
        <div class="col-sm-2">
        </div>
        <div class="col-sm-8">

            
            <?php if(isset($images)): ?>
              <?php foreach($images as $pos => $image): ?>
                <div class="blog-post show-image" style="max-width:600px;">
                  <h4 class="pull-right" style="font-weight: lighter;"><?php echo $image->getCaption();?></h4>
                  <?php
                  $url="/img/files/thumbnails/" . $image->getTitle();


                  echo '<img src="' . $url . '"  class="img-responsive" alt="Responsive image">';
                  

                      if(in_array($image->getId(), $like_array))
                      {
                        echo '<button type="button" class="btn btn-success btn-sm button-like" id="' . $image->getId(). '" >
                                <span class="glyphicon glyphicon-thumbs-up"></span>
                              </button>';
                      }else
                      {
                        echo '<button type="button" class="btn btn-default btn-sm button-like" id="' . $image->getId(). '" >
                                <span class="glyphicon glyphicon-thumbs-up"></span>
                              </button>';
                      }
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




</div>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close clear-modal" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Image Comments</h4>
      </div>
      <div class="modal-body">
        <div class="comments">
        </div>
                    <form  name="input" class="form-comment" action=""  method="post"  >
                      <div class="form-group" >
                       <textarea class="form-control" id="comment-field" rows="3" placeholder="Add a comment..."></textarea>
                      </div>
                      <div class="form-group new-comment">
                        <button type="submit" class="btn btn-success pull-right add-comment" >
                          Add Comment
                        </button>
                      </div>
                    </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default clear-modal" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>



