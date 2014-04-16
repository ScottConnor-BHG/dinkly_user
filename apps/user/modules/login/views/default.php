<div class="jumbotron" style="margin-left:auto;margin-right:auto;">
  <div>
        <div class="row">
          <div class="col-md-4">
          </div>
          <div class="col-md-4">
            <div id="form_sub_container1" style="display: block;">
                    <form id="sign-in-form" class="form" action="/login/" method="post" id="login">
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
                    </form>
            </div>
            <div id="form_sub_container2" style="display: none;">
                    <form id="forgot-password-form" class="form" action="/login/" method="post">
                      <div class="form-group" >
                       <input name="forgot" type="text" placeholder="Username" class="input-block-level">
                      </div>
                      <div class="form-group">
                        <button class="btn" id="forgot-pwd">
                          Get New Password
                        </button>
                      </div>
                    </form>
            </div>
          </div>
          <div class="col-md-4">
          </div>
        </div>
  </div>
</div>