<script type="text/javascript">
$(document).ready(function() {
//save user information
$('body').on('click','.button-like',function(){
  var id = this.id;
  var user_id = <?php echo json_encode(User::getLoggedId()); ?>;
  
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
                  var comments = data["comments"];
                  comments.forEach(function(entry) {
                      console.log(entry[0]['Text']);
                      console.log(entry[1]);
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
});
</script>