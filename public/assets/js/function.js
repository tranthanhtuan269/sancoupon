$(document).ready(function(){
	$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

	$('#show-login-panel').click(function(){
		if($('#login-panel').hasClass('d-none')){
			$('#login-panel').removeClass('d-none')
		}else{
			$('#login-panel').addClass('d-none')
		}
	})

	$('#show-logout').click(function(){
		if($('.user-link').hasClass('d-none')){
			$('.user-link').removeClass('d-none')
		}else{
			$('.user-link').addClass('d-none')
		}
	})

	$('.btn-cancel-login').click(function(){
		$('#login-panel').addClass('d-none')
	})

	$('#btn-login').click(function(){
		var email = $('#inputEmailLogin').val();
		var password = $('#inputPasswordLogin').val();

		var data    = {
            email    : email,
            password : password
        };

        $.ajax({
			url: '/login',
			data : data,
			method: "POST",
			dataType:'json',
			success: function(data) {
				location.reload();
			},
			error: function(data) {
				console.log('Error:', data);
			},
		});
	})

	$('#btn-register').click(function(){
		var name = $('#inputNameRegister').val();
		var email = $('#inputEmailRegister').val();
		var phone = $('#inputPhone').val();
		var password = $('#inputPasswordRegister').val();
		var retypePassword = $('#inputRepasswordRegister').val();

		var data    = {
            name   	 : name,
            email    : email,
            phone    : phone,
            password : password,
            password_confirmation: retypePassword
        };

        $.ajax({
			url: '/register',
			data : data,
			method: "POST",
			dataType:'json',
			success: function(data) {
				location.reload();
			},
			error: function(data) {
				console.log('Error:', data);
			},
		});
	})

	$('#buy-roll').click(function(){
		var coin = parseInt($("#user-coin").text());
		if(coin >= 10){
		  $.ajaxSetup({
			  headers: {
				  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			  }
		  });

		  $.ajax({
			url: '/buy-roll',
			method: "POST",
			dataType:'json',
			success: function(data) {
			  if(data.message == "success"){
				var count = $('#history-list .item-history').length + 1;
				$('#user-roll').text(data.roll)
				$('#user-coin').text(data.coin)
				$('#history-list').prepend('<div class="item-history"><div class="column-1">'+ count +'</div><div class="column-2">'+data.history.rolls+'</div><div class="column-3">'+data.history.detail+'</div><div class="column-4"></div><div class="column-5">'+returnDateFormat(data.created_at)+'</div></div>')
			  }else{
				Swal.fire(
				  'Lỗi',
				  'Bạn không đủ coin để mua thêm lượt quay!',
				  'error'
				)
			  }
			},
			error: function(data) {
			  console.log('Error:', data);
			},
		  });
		}else{
		  Swal.fire(
			'Lỗi',
			'Bạn không đủ coin để mua thêm lượt quay!',
			'error'
		  )
		}
	})

	$('#show-list').click(function(){
		if($('.gift-panel').hasClass('d-none')){
			$('.gift-panel').removeClass('d-none')
		}else{
			$('.gift-panel').addClass('d-none')
		}
	})

	$('#close-svg-btn').click(function(){
		if($('.gift-panel').hasClass('d-none')){
			$('.gift-panel').removeClass('d-none')
		}else{
			$('.gift-panel').addClass('d-none')
		}
	})
	
})