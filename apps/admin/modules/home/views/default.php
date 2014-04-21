</div>
    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
        <?php if(AdminUser::isLoggedIn()): ?>
        <h4>
        <h4>Logged in as <?php echo AdminUser::getLoggedUsername(); ?></h4>
        </h4>
        <?php endif; ?>
        <h1>
          <?php echo Dinkly::getConfigValue('app_name'); ?>
        </h1>
        <p>
          <?php echo Dinkly::getConfigValue('app_description'); ?>
          (v<?php echo Dinkly::getConfigValue('dinkly_version', 'global'); ?>)
        </p>
        <p><a class="btn btn-primary btn-lg" href="/" role="button">Back To Site &raquo;</a></p>
      </div>
    </div>