$(document).on('click', 'input[id*=btnUpdateDeck]', function(){
	var deck_id = $(this).parent().siblings().children().children('input#udeck_id').val();
	var deck_name = $(this).parent().siblings().children().children('input#udeck_name').val();
	$.ajax({
		url:'/update_deck/'+deck_id,
		type:'POST',
		data:{
			'deck_name':deck_name,
		},
		success:function(response){
			alert(response);
			location.reload();
		}
	});
});
