</div>
    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
        <h1>
          Congratulations 
          <?php 
          echo $user->getUsername();
          ?>
        </h1>
        <p>
          You have been signed up for 
          <?php echo Dinkly::getConfigValue('app_name'); ?>
        </p>
        <p><a class="btn btn-primary btn-lg" href="/login" role="button">Login &raquo;</a></p>
      </div>
    </div>
