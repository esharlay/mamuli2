if (window.jQuery) $(document).ready(function() {
	var r = $('#siteRoot').val();
	if (!r) r = '/';


	$('.item-link').on('click', function(){
		var rel = $(this).attr('rel');
		$(rel).show();
		$('.bg-popup').show();
		return false;
	});

	$('.btn-close a, .bg-popup').on('click', function(){
		$('.popup').hide();
		$('.bg-popup').hide();
		return false;
	});

	if ($('.btn-buy input, .add-item').length) addBasket();
	if ($('#cart').length) cartToogle();
	if ($('.order-clear')) clearOrder();

	$('.qnty input').on('change', function(){

	});

	$('.qnty input').live('keydown', function(e){
		if ((e.keyCode > 47) && (e.keyCode < 59)) return true;
		if ((e.keyCode > 95) && (e.keyCode < 111)) return true;
		if (e.keyCode == 8) return true;
		return false;
	});

	$('.qnty .minus').live('click', function(){
		var input = $(this).parent().find('input');
		var id = input.attr('pid');
		var count = input.val() * 1 - 1;

			input.val(input.val() * 1 - 1);
			if (id){
				var callback = function(msg){
					console.log(msg);
					$('.basket-container').html(msg);
					$('.hidden-basket').show();
					updatePrice();
				}
				updateCount(id, count, callback);
			}

		return false;
	});

	$('.qnty .plus').live('click', function(){
		var input = $(this).parent().find('input');
		var id = input.attr('pid');
		var count = input.val() * 1 + 1;
		if (id){
			var callback = function(msg){

				$('.basket-container').html(msg);
				$('.hidden-basket').show();
				updatePrice();
			}
			updateCount(id, count, callback);
		}
		input.val(input.val() * 1 + 1);
		return false;
	});


	$('.add-person').live('click', function(){
		var count = $('#order-persons').val();
		$('#order-persons').val(count * 1 + 1);
		var rand = Math.floor(Math.random() * (9)) + 1;
		$('.pokemon').append('<img class="person-icon" src="' + r + 'img/person'+ rand +'.jpg" alt="">');
		return false;
	});

	$('.person-icon').live('click', function(){
		var count = $('#order-persons').val();
		if (count < 2) return false;
		$('#order-persons').val(count * 1 - 1);
		$(this).remove();
		return false;
	});

	$('.process-button').on('click',function(){
		var id = $(this).attr('itemid');
		var action = $(this).parent('li').val();
		var caption = $(this).html();
		//~ $('.dropdown ul').hide();
		$.ajax({
			type: "POST",
			url: r + "orders/process.php",
			data: { id: id, action: action},
			success: function(msg){
				$('#ordercaption-'+id).html(caption);
				}
		});
		return false;
	});

	$('.send-order').live('click', function(){
		var name = $('#order-name');
		if (! name.val()){
			name.css('border', '1px solid red');
			name.focus();
			return false;
		}
		var phone = $('#order-phone');
		if (! phone.val()){
			phone.css('border', '1px solid red');
			phone.focus();
			return false;
		}
		var street = $('#order-street');
		if (! street.val()){
			street.css('border', '1px solid red');
			street.focus();
			return false;
		}
		var house = $('#order-house');
		if (! house.val()){
			house.css('border', '1px solid red');
			house.focus();
			return false;
		}
		var persons = $('#order-persons');
		if (! persons.val()){
			persons.css('border', '1px solid red');
			persons.focus();
			return false;
		}
		var comment = $('#order-comment');

		var items = $('.item');
		if (!items.length) return false;

		var itemsstring = '';
		$('.item').each(function(i){
			var id = $(this).attr('pid');
			var curcount = $('#itemcount-'+id).val();
			curcount = parseInt(curcount);
			if (curcount != $('#itemcount-'+id).val()){
				$('#itemcount-'+id).css('border', '1px solid red');
				$('#itemcount-'+id).focus();
				return false;
			}
			itemsstring += id + '/' + curcount;
			if (i != items.length - 1)
				itemsstring += '|';
		});

		$.ajax({
		type: "POST",
		url: r + "orders/add.php",
		data: { js: 1,
				action: "order",
				clientname: name.val(),
				phone: phone.val(),
				street: street.val(),
				house: house.val(),
				count: persons.val(),
				description: comment.val(),
				items: itemsstring
				},
		success: function(msg){
			//~ console.log(msg);
			document.location.reload();
			}
		});

		return false;
		});

	$('.togglePanel').on('click', function(){
		$('#panel').slideToggle(200);
		$("html, body").animate({scrollTop: 0})
	});

	updatePrice();

});

function updateCount(id, count, callback){

	$.ajax({
		type: "POST",
		url: "/ajax/basket/update.php",
		data: {id: id, count: count},
		success: function(msg){
			callback(msg);
		}
	});

}

function clearOrder(){
	$('.order-clear').live('click', function(){
		$.ajax({
			type: "POST",
			url: "/ajax/basket/clear.php",
			success: function(msg){
				console.log(msg);
				document.location.reload();
			}
		});

		return false;
	})
}

function cartToogle(){

	$('#cart, .close-basket').live('click', function(){
		$('.hidden-basket').slideToggle(200);
		if ($('#cart').hasClass('active'))
			$('#cart').removeClass('active');
		else{
			$('#cart').addClass('active');
			$("html, body").animate({scrollTop: 0}, "slow")
		}
		return false;
	})

}

function updatePrice(){

	var total = 0;
		counter = 0;

	$('.add-item .tooltip').hide();
	$('.add-item').removeClass('active');

	$('tr.item .cost').each(function(){
		total += $(this).find('span').html() * 1;
	});

	$('tr.item .qnty').each(function(){
		counter += $(this).find('input').val() * 1;
	});

	$('tr.item .qnty').each(function(){
		var count = $(this).find('input').val();
		var id = $(this).parent('tr').attr('pid');
		$('#additemlink-' + id).addClass('active');
		$('#additemlink-' + id).find('.tooltip').show();
		$('#additemlink-' + id).find('.items-count').html(count);
	});

	if (total){
		$('span.totalcost').html(total);
		$('span.counter').html(counter);
		$('#cart .tooltip').show();
	}
	else{
		$('span.totalcost').html('');
		$('span.counter').html('');
		$('#cart .tooltip').hide();
	}

	return total;
}

function addBasket(){

	$('.btn-buy input, .add-item').on('click', function(){
		var id = $(this).attr('pid');
		if (! id) id = $(this).attr('itemid');
		var count = $('#count-' + id).val();
		var data = {id: id, count: count};
		var th = this;
		$.ajax({
			type: "POST",
			url: "/ajax/basket/add.php",
			data: data,
			success: function(msg){
				$('.popup').hide();
				$('.bg-popup').hide();
				$(th).addClass('active');
				$('.basket-container').html(msg);
				updatePrice();
		}
		});

		return false;
	})

}

