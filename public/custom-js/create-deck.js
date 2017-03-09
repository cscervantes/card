$(document).on('click', 'input[id=btnAddDeck]', function(){
	var deck_name = $("#deck_name").val();
	$.ajax({
		url:'/add_deck',
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
