<div class="jumbotron" style="margin-left:auto;margin-right:auto;">
  <div>
        <div class="row">
          <div class="col-md-4">
          </div>
          <div class="col-md-4">
            <div id="form_sub_container1" style="display: block;">
                    <form  class="form" action="javascript:handleEdit()" >
                      <div class="form-group" >
                       <input name="username" id="username" type="text" placeholder="Username" value="<?= $user->getUsername();?>" class="form-input form-control" disabled>
                      </div>
                      <div class="form-group" >
                       <input name="firstname" id="firstname" type="text" placeholder="First Name" value="<?php echo $user->getFirstName();?>" class="form-input form-control"disabled>
                      </div>
                      <div class="form-group" >
                       <input name="lastname" id="lastname" type="text" placeholder="Last Name" value="<?php echo $user->getLastName();?>" class="form-input form-control"disabled>
                      </div>
                      <div class="form-group" >
                       <input name="title" id ="title" type="text" placeholder="Occupation" value="<?php echo $user->getTitle();?>" class="form-input form-control"disabled>
                      </div>
                      <div class="form-group">
                        <button class="btn pull-right" id="edit">
                          Edit
                        </button>
                        <button class="save_user_info btn pull-right" class ="save_user_info" id="save_user_info" style="display:none;">
                          Save
                        </button>
                      </div>
                    </form>
            </div>
          </div>
          <div class="col-md-4">
          </div>
          <div class="col-md-4">
          </div>
        </div>
        </div>
  </div>
</div>