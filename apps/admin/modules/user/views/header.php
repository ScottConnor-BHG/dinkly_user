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
});
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

    //delete image
    $('body').on('click','.delete-image',function(){
        var hash = $(this).data('hash');
        var row = $(this).closest("tr").get(0);
        var file_path ="img/files/"+hash;
        console.log(file_path);
        var deleteImage = confirm("Are you sure you would like to delete this Image?");
        if(deleteImage){
            
            
         //ajax code goes here to make database changes
            $.ajax({
                  type: "POST",
                  url: "/api/api/delete_image/",
                  data: {hash: hash,file_path:file_path},
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
});
</script>