<script type="text/javascript">
$(document).ready(function() {
//save user information
$('body').on('click','.button-like',function(){
  var id = this.id;
  
         //ajax code goes here to make database changes
            $.ajax({
                  type: "POST",
                  url: "/api/api/view_likes/",
                  data: {id:id},
            success: function(msg) {        
                  //console.log("success");
									console.log(id);
                  // image_list.fnDeleteRow(image_list.fnGetPosition(row));
                  //showMessage(message, 'success');
                  
                },
                error: function(error){
                  var message = "There was an error processing your request. Please try again later.";
                  //showMessage(message, "error");
                }
            });
});
$('body').on('click','.button-comment',function(){
  var id = this.id;
  console.log(id);


  
});
});
</script>