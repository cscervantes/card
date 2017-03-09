$(document).on('click', 'input[id=btnAddCard]', function(){
	var card_name = $("#card_name").val();
	var card_skill = $("#card_skill").val();
	var card_strength = $("#card_strength").val();
	var card_defense = $("#card_defense").val();
	$.ajax({
		url:'/add_card',
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
