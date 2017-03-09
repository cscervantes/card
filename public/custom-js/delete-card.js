$(document).on('click','a[id*=deleteCard]',function(){
	var card_id = $(this).siblings('input[id*=onDelete]').val();
	// alert(card_id);
	$.ajax({
		url:'/delete_card/'+card_id,
		type:'POST',
		success:function(response){
			alert(response);
			location.reload();
		}
	});
});