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
		if($('#btn-logout').hasClass('d-none')){
			$('#btn-profile').removeClass('d-none')
			$('#btn-logout').removeClass('d-none')
		}else{
			$('#btn-profile').addClass('d-none')
			$('#btn-logout').addClass('d-none')
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
})