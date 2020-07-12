$(document).ready(function() {
    function validation(){

		var name = document.getElementById('name').value;
		var email = document.getElementById('email').value;
		var password = document.getElementById('password').value;
		var ConfirmPassword = document.getElementById('ConfirmPassword').value;
	
	
		if(name == '' || password == '' || email == '' || ConfirmPassword == '')
		{
			document.getElementById("result").innerHTML = "Te gjitha Fushat Duhet Plotsuar !";
			return false;
		}
		else if(name.length<4)
		{
			document.getElementById("result").innerHTML = "Emri Duhet te permbaj Minimum 4 Karaktere !";
			return false;
		}
		else if(password.length<6) 
		{
			document.getElementById("result").innerHTML = "Paswordi duhet te Permbaj minimum 6 Karaktere !";
			return false;
		}
		else if(ConfirmPassword != password)
		{
			document.getElementById("result").innerHTML = "Paswordi nuk eshte i Konfirmuar !";
			return false;
		}
		else if(!email.includes("@",".com"))
		{
			document.getElementById("result").innerHTML = "Shtoni Email Valide !"
			return false;
		}
	
	
		else {
			return true ;
		}
	
	}
	validation();
	
	



	$('.btn-login').click(function(e) {
		$('.login-form').show();
 		$('.register-form').hide();
		$('.btn-register').removeClass('active');
		$(this).addClass('active');
		e.preventDefault();
	});
	$('.btn-register').click(function(e) {
		$('.register-form').show();
 		$('.login-form').hide();
		$('.btn-login').removeClass('active');
		$(this).addClass('active');
		e.preventDefault();
	});
	
});
