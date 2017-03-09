$(document).on('click','a[id*=deleteDeck]',function(){
	var deck_id = $(this).siblings('input[id*=onDelete]').val();
	// alert(card_id);
	$.ajax({
		url:'/delete_deck/'+deck_id,
		type:'POST',
		success:function(response){
			alert(response);
			location.reload();
		}
	});
});