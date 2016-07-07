$(document).ready(function(){
	num1=0;
	num2=0;
	console.log("JQ Ready");
	$('a#confirm').click(function(e){
		e.preventDefault();
		console.log("clicked");
	});
	
	$('select#payment').change(function(e){
		var id = $(this).children(":selected").attr("id");
		$('div#question').show('slow');
		
		if(id==1){
			console.log(id);
			$('p#paymentdesc').text("Cash ON Delivery. Pay After you recieve the product.");
		}else if(id==2){
			$('p#paymentdesc').text("Debit Card. Pay using your debit card.We dont Store card details");
		}else if(id==3){
			$('p#paymentdesc').text("Credit Card. Pay using you credit card.We dont store credit card details");
		}else if(id==4){
			$('p#paymentdesc').text("NetBanking. Pay using your netbanking account.");
		}else if(id==0){
			$('div#question').hide();
		}
		num1 = Math.floor((Math.random() * 10) + 1);
		num2 = Math.floor((Math.random() * 10) + 1);
		$('#challengeform label').html("What is "+num1 + "+"+num2 );
		$('#challengeform').submit(function(e){
			console.log("WTF");
			ans = $('#answer').val();
			console.log(num1+num2);
			console.log(ans);
			if(ans==num1+num2){
				
			}else{
				e.preventDefault();
			}
		});
	});
});
