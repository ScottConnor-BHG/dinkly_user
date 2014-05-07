<div class="container" >

      <div class="row">
        <div class="col-sm-2">
        </div>
        <div class="col-sm-8">

            <div class="frame show-image" style="max-width:600px;">
            <?php if(isset($images)): ?>
              <?php foreach($images as $pos => $image): ?>
                <div class="blog-post">
                  <?php
                  $url="/img/files/thumbnails/" . $image->getTitle();


                  echo '<img src="' . $url . '"  class="img-responsive" alt="Responsive image">';
                  
                  echo '<button type="button" class="btn btn-default btn-sm button-like">
                          <span class="glyphicon glyphicon-thumbs-up"></span>
                        </button>';
                  // echo '<a href="#" class="pull-right">Comments</a>';
                  echo '<button type="button" class="btn btn-default btn-sm button-comment">
                          <span class="glyphicon glyphicon-comment"></span>
                        </button>';
                  ?>
               </div><!-- /.blog-post -->
              <?php endforeach; ?>
            <?php endif; ?>
          </div>


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



