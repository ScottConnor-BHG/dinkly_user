<div class="jumbotron" style="margin-left:auto;margin-right:auto;">
  <div>
        <div class="row">
          <div class="col-md-4">
          </div>
          <div class="col-md-4">
            <div id="form_sub_container1" style="display: block;">
<!--                     <form id="sign-in-form" class="form" action="/login/" method="post" id="login">
                      <div class="form-group" >
                       <input name="username" type="text" placeholder="Username" class="input-block-level">
                      </div>
                      <div class="form-group">
                        <input name="password" type="password" placeholder="Password" class="input-block-level" >
                      </div>
                      <div class="form-group">
                        <button class="btn" id="sign-in">
                          Sign in
                        </button>
                        <a href="javascript:void(0)" onclick="swapForm()" class="forgot-password pull-right" id="forgot-password">Forgot Password?</a>
                      </div>
                    </form> -->
                    <div class="container">
                      <form class="form-signin" id="sign-in-form" action="/login/" method="post">
                        <h2 class="form-signin-heading">Please sign in</h2>
                        <input name ="username" type="username" class="form-control" placeholder="Username" required autofocus>
                        <input name="password" type="password" class="form-control" placeholder="Password" required>
                        <label class="checkbox">
                          <input type="checkbox" value="remember-me"> Remember me
                        <a href="javascript:void(0)" onclick="swapForm()" class="forgot-password pull-right" id="forgot-password"> Password?</a>
                        </label>
                        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
                      </form>
                    </div> <!-- /container -->
            </div>
            <div id="form_sub_container2" style="display: none;">
                    <form id="forgot-password-form" class="form" action="/login/" method="post">
                      <div class="form-group" >
                       <input name="forgot" type="text" placeholder="Username" class="form-control">
                      </div>
                      <div class="form-group">
                          <button class="btn btn-lg btn-primary btn-block" type="submit">Email New Password</button>
                      </div>
                    </form>
            </div>

          </div>
          <div class="col-md-4">
          </div>
        </div>
  </div>
</div>