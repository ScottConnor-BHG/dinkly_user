<div class="jumbotron">

      <div class="row">
        <div class="col-sm-2">
        </div>
        <div class="col-sm-8">


            <?php if(isset($images)): ?>
              <?php foreach($images as $pos => $image): ?>
                <div class="blog-post">
                  <?php
                  $url="/img/files/" . $image->getTitle();
                  echo '<img src="' . $url . '"  class="img-responsive" alt="Responsive image">';
                  echo '<br>';
                  echo '<br>';
                  echo '<br>';
                  echo '<br>';
                  ?>
               </div><!-- /.blog-post -->
              <?php endforeach; ?>
            <?php endif; ?>


          <ul class="pager">
            <li><a href="#">Previous</a></li>
            <li><a href="#">Next</a></li>
          </ul>

        </div><!-- /.blog-main -->
        <div class="col-sm-2">
        </div>
      </div><!-- /.row -->


  <div style="height:500px;">
  </div>
</div>



