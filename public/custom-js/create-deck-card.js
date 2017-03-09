$(document).on('click', 'input[id=btnSubmit]', function(){
	// alert($("#deck").val());
	if($("#deck").val() === '0'){
		alert('Deck is required!');
	}else{
		if($("#first_card").val() === '0' && $("#second_card").val() === '0' && $("#third_card").val() === '0'){
			alert('Please choose at least 1 card');
		}else{
			$.ajax({
				url:'/create_deck_card',
				type:'POST',
				data:{
					'deck_id':$("#deck").val(),
					'first_card':$("#first_card").val(),
					'second_card':$("#second_card").val(),
					'third_card':$("#third_card").val(),
				},
				success:function(response){
					alert(response);
					location.reload();
				}
			});
		}
	}
});

$(document).on('click', 'a[id*=showDeckID]', function(){
	// alert($(this).siblings('input[id*=user_id]').val()+$(this).siblings('input[id*=deck_id]').val());
	$.ajax({
		url:'/show_deck_card/'+$(this).siblings('input[id*=user_id]').val()+'/'+$(this).siblings('input[id*=deck_id]').val(),
		type:'GET',
		success:function(response){
			var wrapper = "";
			for(var a in response){
				for(var b in response[a].card){
					wrapper += '<div class="panel panel-default">'
					wrapper += '<div class="panel-heading">'+response[a].card[b].card_name+'</div>';
					wrapper += '<div class="panel-body">';
					if(response[a].card[b].skill == null){
						wrapper += '<h5>No skill</h5>';
					}else{
						wrapper += '<h5>'+response[a].card[b].skill+'</h5>';
					}
					wrapper += '<p>'+response[a].card[b].strength+'</p>';
					wrapper += '<p>'+response[a].card[b].defense+'</p>';
					wrapper += '</div>';
					wrapper += '</div>'
				}
				
			}
			$("div[id*=deckInfo]").html(wrapper);
		}
	});
});