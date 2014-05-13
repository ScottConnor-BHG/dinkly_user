<script type="text/javascript">
function addComment(username,comment) {
    var html = '<li class="comment"><button type="button" class="btn btn-default btn-lg" disabled><span class="glyphicon glyphicon-user"></span></button><h3 class="username"> <strong>'+username+'</strong></h3><p class= "comment-body">'+comment+'</p></li>';
    // var html = '<li class="comment"><p>hello world</p><button type="button" class="btn btn-default btn-lg" disabled><span class="glyphicon glyphicon-user"></span></button></li>';
    $('.comments').append(html);
}
function addCommentFromModal(username,comment,image_id) {
    var html = '<li class="comment"><button type="button" class="btn btn-default btn-lg" disabled><span class="glyphicon glyphicon-user"></span></button><h3 class="username"> <strong>'+username+'</strong></h3><p class= "comment-body">'+comment+'</p></li>';
    // var html = '<li class="comment"><p>hello world</p><button type="button" class="btn btn-default btn-lg" disabled><span class="glyphicon glyphicon-user"></span></button></li>';
    
    var user_id = <?php if(User::isLoggedIn()){ echo json_encode(User::getLoggedId());} else{echo json_encode(0);} ?>;
            if(user_id!=0)
            {
              $('.comments').append(html);
             //ajax code goes here to make database changes
            $.ajax({
                  type: "POST",
                  url: "/api/api/add_comment/",
                  data: {id:image_id,user_id:user_id,text:comment},
            success: function(msg) {        
                  
                },
                error: function(error){
                  var message = "There was an error processing your request. Please try again later.";
                  //showMessage(message, "error");
                }
            });
          }else{
            document.getElementById("comment-alert").style.display = 'block';
          }
}
$(document).ready(function() {
$('body').on('click','.login',function(){
   window.location.href="/login";
   $('.comments').empty();
});
//save user information
$('body').on('click','.button-like',function(){
  var id = this.id;
  var reference = "#"+id;
  // var image_id = this.data("image");
  // var reference = "";
  // console.log(image_id);
  //change class of button to show that is or is not liked
  if($(reference).hasClass( "btn-default" ))
  {
    $(reference ).removeClass("btn-default");
    $(reference).addClass("btn-success");
      var user_id = <?php if(User::isLoggedIn()){ echo json_encode(User::getLoggedId());} else{echo json_encode(0);} ?>;
  
         //ajax code goes here to make database changes
            $.ajax({
                  type: "POST",
                  url: "/api/api/add_like/",
                  data: {id:id,user_id:user_id},
            success: function(msg) {        
                  //console.log("success");
                  //console.log(id);
                  // image_list.fnDeleteRow(image_list.fnGetPosition(row));
                  //showMessage(message, 'success');
                  
                },
                error: function(error){
                  var message = "There was an error processing your request. Please try again later.";
                  //showMessage(message, "error");
                }
            });
  }else if($(reference).hasClass( "btn-success" ))
  {
    $(reference ).removeClass("btn-success");
    $(reference).addClass("btn-default");
    var user_id = <?php echo json_encode(User::getLoggedId()); ?>;
             //ajax code goes here to make database changes
            $.ajax({
                  type: "POST",
                  url: "/api/api/delete_like/",
                  data: {id:id,user_id:user_id},
            success: function(msg) {        
                  //console.log("success");
                  //console.log(id);
                  // image_list.fnDeleteRow(image_list.fnGetPosition(row));
                  //showMessage(message, 'success');
                  
                },
                error: function(error){
                  var message = "There was an error processing your request. Please try again later.";
                  //showMessage(message, "error");
                }
            });
  }

});
$('body').on('click','.button-comment',function(){
  var id = this.id;
         //ajax code goes here to make database changes
            $.ajax({
                  type: "POST",
                  url: "/api/api/view_comments/",
                  data: {id:id},
            success: function(data) {        
                  //console.log("success");
                  //console.log(id);
                  var $newDiv = $('.new-comment');
                  //set the id
                  $newDiv.attr("id",id);
                  var comments = data["comments"];
                  
                  comments.forEach(function(entry) {
                      addComment(entry[1],entry[0]['Text']);
                  });

                  //console.log();
                  // image_list.fnDeleteRow(image_list.fnGetPosition(row));
                  //showMessage(message, 'success');
                  
                },
                error: function(error){
                  var message = "There was an error processing your request. Please try again later.";
                  //showMessage(message, "error");
                }
            });


  
});
$('body').on('click','.clear-modal',function(){
  $('.comments').empty();
});
$('body').on('click','.add-comment',function(e){
  e.preventDefault();
  var new_comment = $('#comment-field').val();
  var image_id= $('.new-comment').attr('id');
  if(new_comment !="")
  {
    var username = <?php echo json_encode(User::getLoggedUsername()); ?>;
    $('#comment-field').val(''); 
    addCommentFromModal(username,new_comment,image_id);
    
  }
});
});
</script>