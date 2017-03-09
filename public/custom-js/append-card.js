function updateTextArea() {
    //var text = "";
    var arr = [];
    $('input[type=checkbox]:checked').each( function() {
        // text += "("+$(this).val()+")" +$(this).parent().text()+" ";
        arr.push("<li id='card"+$(this).val()+"'>"+"<input type='hidden' id='hid"+$(this).val()+"' name='hid["+$(this).val()+"]' value='"+$(this).val()+"'>"+$(this).val()+" "+$(this).parent().text()+"</li>");
    });
    // alert(arr);
    $('#selected-cards').html(arr);
}

// $('input[type=checkbox]').change(function () {
//     updateTextArea();
// });


$(document).on('change', 'input[id*=card_]', function(){
	// alert($(this).val()+" "+$(this).parent().text());
	// // var b = "<button id='"+$(this).val()+"'>"+$(this).parent().text()+"</button>";
	// var b = '<a>Hello</a>';
	// $("#cards").append(b);
	 updateTextArea();
});

$("#purchaseBtn").click(function(){
	var user_id = $(this).siblings('input[id*=user_id]').val();
	var	deck_id = $(this).siblings('input[id*=deck_id]').val();
	// var cards = $("#s").val().trim();
	// if(cards.length == 0 || cards.length == '' || cards.length == null){
	// 	alert('Please Select CArds');

	// }else{
	// 	// alert('Cards Selected');
	// 	// console.log(cards.split(','));
	// 	var count = cards.split(',');
	// 	if(count.length > 3){
	// 		alert('Card selection exceeded than 3');
	// 	}else{
	// 		//ajax here.
	// 		alert('You can send it now!');
	// 	}
	// }
	// alert("I am purchaseBTBN");

	var formData = new FormData($('#frm_cards')[0]);

	
	if($('#selected-cards').html().trim() === '' || $('#selected-cards').length === 0){
		alert('Select at least 1 Card');
	}else if($("li[id*=card]").length > 3){
		alert('Only 3 Cards are allowed per Deck');
	}else{
		$.ajax({
			url : '/purchased/'+user_id+'/'+deck_id,
			type: 'POST',
			data : formData,
			contentType : false,
			processData : false,
			success:function(response){
				console.log(response);
				alert(response);
				location.reload();
			}

		});
	}
});