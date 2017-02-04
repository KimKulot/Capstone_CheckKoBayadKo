<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>


	<input type="password" name="password" id="password">
	<input type="password" name="confirm_password" id="confirm_password">


	<script>
	 var password = document.getElementById("password")
	  , confirm_password = document.getElementById("confirm_password");

	function validatePassword(){
	  if(password.value != confirm_password.value) {
	    confirm_password.setCustomValidity("Password Don't Match");
	  } else {
	    confirm_password.setCustomValidity('');
	  }
	}

	password.onchange = validatePassword;
	confirm_password.onkeyup = validatePassword;
	</script>
</body>
</html>