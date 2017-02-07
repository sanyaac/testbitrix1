//Активация/Деактивация элемента инфоблока;
function sendCntAjax(id){
$.ajax({
	  type: 'POST',
	  url: '/partners/active.php',
	  data: {'ID':id},
	  success: function(data) {
		if (data != "AccessDenied")$("#a_button" + id).val(data);
	  }
	});
}
