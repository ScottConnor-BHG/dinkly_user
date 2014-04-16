<div class="jumbotron">

  	<?php if(User::isLoggedIn()): ?>
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


  <div style="height:500px;">
  </div>
</div>



