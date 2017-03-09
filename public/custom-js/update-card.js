$(document).on('click', 'input[id*=btnUpdateCard]', function(){
	var card_id = $(this).parent().siblings().children().children('input#ucard_id').val();
	var card_name = $(this).parent().siblings().children().children('input#ucard_name').val();
	var card_skill = $(this).parent().siblings().children().children('input#ucard_skill').val();
	var card_strength = $(this).parent().siblings().children().children('input#ucard_strength').val();
	var card_defense = $(this).parent().siblings().children().children('input#ucard_defense').val();
	// alert(card_name+card_id);
	$.ajax({
		url:'/update_card/'+card_id,
		type:'POST',
		data:{
			'card_name':card_name,
			'card_skill':card_skill,
			'card_strength':card_strength,
			'card_defense':card_defense,
		},
		success:function(response){
			alert(response);
			location.reload();
		}
	});
});
