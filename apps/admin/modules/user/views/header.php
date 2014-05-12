<link rel="stylesheet" href="/css/datatables-bootstrap.css">
<script type="text/javascript" src="/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="/js/dataTables.bootstrap.js"></script>
<script type="text/javascript">
    //save Image url to database
    function saveImage(hash,title){
              //console.log(hash);
              $.ajax({
              type: "POST",
              url: "/api/api/save_image/",
              data: {hash: hash,title:title},
        success: function(msg) {        
              //console.log("success");
            },
            error: function(error){
              var message = "There was an error processing your request. Please try again later.";
              //showMessage(message, "error");
            }
        });

    }
    function addCaption(caption,image_id){
              //console.log(hash);
              $.ajax({
              type: "POST",
              url: "/api/api/add_image_caption/",
              data: {caption: caption,image_id:image_id},
        success: function(msg) {        
              //console.log("success");
            },
            error: function(error){
              var message = "There was an error processing your request. Please try again later.";
              //showMessage(message, "error");
            }
        });

    }

$(document).ready(function() {
	/* Admin User Table initialisation */
	$('#admin-user-list').dataTable({
    "sDom": "<'row'<'col-6'><'col-6'l><'pull-right' f>r>t<'row'<'col-6'i><'col-6'<'pull-right' p>>>",
    "sPaginationType": "full_numbers",
    "oLanguage": {
        "sLengthMenu": "Show _MENU_ Rows",
                "sSearch": ""
    }
	});
	/* User Table initialisation */
	$('#user-list').dataTable({
    "sDom": "<'row'<'col-6'><'col-6'l><'pull-right' f>r>t<'row'<'col-6'i><'col-6'<'pull-right' p>>>",
    "sPaginationType": "full_numbers",
    "oLanguage": {
        "sLengthMenu": "Show _MENU_ Rows",
                "sSearch": ""
    }
});
/* Image Table initialisation */
image_list = $('#image-list').dataTable({
"sDom": "<'row'<'col-6'><'col-6'l><'pull-right' f>r>t<'row'<'col-6'i><'col-6'<'pull-right' p>>>",
"sPaginationType": "full_numbers",
"oLanguage": {
    "sLengthMenu": "Show _MENU_ Rows",
            "sSearch": ""
}
});
    /* Image Table initialisation */
comment_list = $('#comment-list').dataTable({
"sDom": "<'row'<'col-6'><'col-6'l><'pull-right' f>r>t<'row'<'col-6'i><'col-6'<'pull-right' p>>>",
"sPaginationType": "full_numbers",
"oLanguage": {
    "sLengthMenu": "Show _MENU_ Rows",
            "sSearch": ""
}
});
    /* Image Table initialisation */
like_list = $('#like-list').dataTable({
"sDom": "<'row'<'col-6'><'col-6'l><'pull-right' f>r>t<'row'<'col-6'i><'col-6'<'pull-right' p>>>",
"sPaginationType": "full_numbers",
"oLanguage": {
    "sLengthMenu": "Show _MENU_ Rows",
            "sSearch": ""
}
});

    //view image in modal and pass in data
    $('body').on('click', '.view-image', function () {
         var title = $(this).data('title');
         var hash = $(this).data('hash');
         var caption= $(this).data('caption');
         var src = "/img/files/"+title;
         $(".modal-header #myModalLabel").html(caption);
         $(".modal-body #myModalImage").attr("src", src);
         $(".add-caption").attr('id',hash);
         
         // As pointed out in comments, 
         // it is superfluous to have to manually call the modal.
         // $('#addBookDialog').modal('show');
    });

    //delete image
    $('body').on('click','.delete-image',function(){
        var hash = $(this).data('hash');
        var title = $(this).data('title');
        var row = $(this).closest("tr").get(0);
        var file_path ="img/files/"+title;
        var file_path_resize ="img/files/thumbnails/"+title;

        //console.log(file_path);
        var deleteImage = confirm("Are you sure you would like to delete this Image?");
        if(deleteImage){
            
            
         //ajax code goes here to make database changes
            $.ajax({
                  type: "POST",
                  url: "/api/api/delete_image/",
                  data: {hash: hash,file_path:file_path,file_path_resize:file_path_resize},
            success: function(msg) {        
                  //console.log("success");

                  image_list.fnDeleteRow(image_list.fnGetPosition(row));
                  //showMessage(message, 'success');
                  
                },
                error: function(error){
                  var message = "There was an error processing your request. Please try again later.";
                  //showMessage(message, "error");
                }
            });
        }
      
    });
    //delete comment from an image
    $('body').on('click','.delete-comment',function(){
        var id = $(this).data('id');
        var row = $(this).closest("tr").get(0);
        //console.log(file_path);
        var deleteComment = confirm("Are you sure you would like to delete this Comment?");
        if(deleteComment){
            
            
         //ajax code goes here to make database changes
            $.ajax({
                  type: "POST",
                  url: "/api/api/delete_comment/",
                  data: {id:id},
            success: function(msg) {        
                  //console.log("success");

                  comment_list.fnDeleteRow(comment_list.fnGetPosition(row));
                  //showMessage(message, 'success');
                  
                },
                error: function(error){
                  var message = "There was an error processing your request. Please try again later.";
                  //showMessage(message, "error");
                }
            });
        }
      
    });
    //delete comment from an image
    $('body').on('click','.delete-like',function(){
        var id = $(this).data('id');
        var row = $(this).closest("tr").get(0);
        //console.log(file_path);
        var deleteLike = confirm("Are you sure you would like to delete this Like?");
        if(deleteLike){
            
            
         //ajax code goes here to make database changes
            $.ajax({
                  type: "POST",
                  url: "/api/api/delete_like/",
                  data: {id:id},
            success: function(msg) {        
                  //console.log("success");

                  like_list.fnDeleteRow(like_list.fnGetPosition(row));
                  //showMessage(message, 'success');
                  
                },
                error: function(error){
                  var message = "There was an error processing your request. Please try again later.";
                  //showMessage(message, "error");
                }
            });
        }
      
    });
$('body').on('click','.add-caption',function(e){
  e.preventDefault();
  var new_caption = $('#caption-field').val();
  var image_id= $(".add-caption").attr('id');
  if(new_caption !="")
  {

    $(".modal-header #myModalLabel").html(new_caption);
    $('#caption-field').val(''); 
    addCaption(new_caption,image_id);
    
  }
});



});//end on document ready
$(function(){
    $('#admin-user-list').each(function(){
        var datatable = $(this);
        // SEARCH - Add the placeholder for Search and Turn this into in-line formcontrol
        var search_input = datatable.closest('.dataTables_wrapper').find('div[id$=_filter] input');
        search_input.attr('placeholder', 'Search')
        search_input.addClass('form-control input-small')
        search_input.css('width', '250px')

        
        
       // search_input.css('position', 'absolute')
        //search_input.css('right', '100px')
 
        // SEARCH CLEAR - Use an Icon
        var clear_input = datatable.closest('.dataTables_wrapper').find('div[id$=_filter] a');
        clear_input.html('<i class="icon-remove-circle icon-large"></i>')
        clear_input.css('margin-left', '5px')

 
        // LENGTH - Inline-Form control
        var length_sel = datatable.closest('.dataTables_wrapper').find('div[id$=_length] select');
        length_sel.addClass('form-control input-small')
        length_sel.css('width', '75px')
 
        // LENGTH - Info adjust location
        var length_sel = datatable.closest('.dataTables_wrapper').find('div[id$=_info]');
        length_sel.css('margin-top', '18px')
    });


});
$(function(){
    $('#image-list').each(function(){
        var datatable = $(this);
        // SEARCH - Add the placeholder for Search and Turn this into in-line formcontrol
        var search_input = datatable.closest('.dataTables_wrapper').find('div[id$=_filter] input');
        search_input.attr('placeholder', 'Search')
        search_input.addClass('form-control input-small')
        search_input.css('width', '250px')

        
        
       // search_input.css('position', 'absolute')
        //search_input.css('right', '100px')
 
        // SEARCH CLEAR - Use an Icon
        var clear_input = datatable.closest('.dataTables_wrapper').find('div[id$=_filter] a');
        clear_input.html('<i class="icon-remove-circle icon-large"></i>')
        clear_input.css('margin-left', '5px')

 
        // LENGTH - Inline-Form control
        var length_sel = datatable.closest('.dataTables_wrapper').find('div[id$=_length] select');
        length_sel.addClass('form-control input-small')
        length_sel.css('width', '75px')
 
        // LENGTH - Info adjust location
        var length_sel = datatable.closest('.dataTables_wrapper').find('div[id$=_info]');
        length_sel.css('margin-top', '18px')
    });
});
$(function(){
    $('#user-list').each(function(){
        var datatable = $(this);
        // SEARCH - Add the placeholder for Search and Turn this into in-line formcontrol
        var search_input = datatable.closest('.dataTables_wrapper').find('div[id$=_filter] input');
        search_input.attr('placeholder', 'Search')
        search_input.addClass('form-control input-small')
        search_input.css('width', '250px')

        
        
       // search_input.css('position', 'absolute')
        //search_input.css('right', '100px')
 
        // SEARCH CLEAR - Use an Icon
        var clear_input = datatable.closest('.dataTables_wrapper').find('div[id$=_filter] a');
        clear_input.html('<i class="icon-remove-circle icon-large"></i>')
        clear_input.css('margin-left', '5px')

 
        // LENGTH - Inline-Form control
        var length_sel = datatable.closest('.dataTables_wrapper').find('div[id$=_length] select');
        length_sel.addClass('form-control input-small')
        length_sel.css('width', '75px')
 
        // LENGTH - Info adjust location
        var length_sel = datatable.closest('.dataTables_wrapper').find('div[id$=_info]');
        length_sel.css('margin-top', '18px')
    });

});
$(function(){
    $('#comment-list').each(function(){
        var datatable = $(this);
        // SEARCH - Add the placeholder for Search and Turn this into in-line formcontrol
        var search_input = datatable.closest('.dataTables_wrapper').find('div[id$=_filter] input');
        search_input.attr('placeholder', 'Search')
        search_input.addClass('form-control input-small')
        search_input.css('width', '250px')

        
        
       // search_input.css('position', 'absolute')
        //search_input.css('right', '100px')
 
        // SEARCH CLEAR - Use an Icon
        var clear_input = datatable.closest('.dataTables_wrapper').find('div[id$=_filter] a');
        clear_input.html('<i class="icon-remove-circle icon-large"></i>')
        clear_input.css('margin-left', '5px')

 
        // LENGTH - Inline-Form control
        var length_sel = datatable.closest('.dataTables_wrapper').find('div[id$=_length] select');
        length_sel.addClass('form-control input-small')
        length_sel.css('width', '75px')
 
        // LENGTH - Info adjust location
        var length_sel = datatable.closest('.dataTables_wrapper').find('div[id$=_info]');
        length_sel.css('margin-top', '18px')
    });
});
$(function(){
    $('#like-list').each(function(){
        var datatable = $(this);
        // SEARCH - Add the placeholder for Search and Turn this into in-line formcontrol
        var search_input = datatable.closest('.dataTables_wrapper').find('div[id$=_filter] input');
        search_input.attr('placeholder', 'Search')
        search_input.addClass('form-control input-small')
        search_input.css('width', '250px')

        
        
       // search_input.css('position', 'absolute')
        //search_input.css('right', '100px')
 
        // SEARCH CLEAR - Use an Icon
        var clear_input = datatable.closest('.dataTables_wrapper').find('div[id$=_filter] a');
        clear_input.html('<i class="icon-remove-circle icon-large"></i>')
        clear_input.css('margin-left', '5px')

 
        // LENGTH - Inline-Form control
        var length_sel = datatable.closest('.dataTables_wrapper').find('div[id$=_length] select');
        length_sel.addClass('form-control input-small')
        length_sel.css('width', '75px')
 
        // LENGTH - Info adjust location
        var length_sel = datatable.closest('.dataTables_wrapper').find('div[id$=_info]');
        length_sel.css('margin-top', '18px')
    });
});
</script>