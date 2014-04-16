<script>
function addUser(){
  alert("test");
 	var url = window.location.href;
  url= url+myselect.options[myselect.selectedIndex].value;
	window.location.href ="admin/account/add_user";
}
</script>