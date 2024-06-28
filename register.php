<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>CodePen - A Pen by Mohithpoojary</title>
  <link rel="stylesheet" href="../forum/assets/css/style.css">
  <div> <!--FONT-->
	<script src="assets/js/plugin/webfont/webfont.min.js"></script>
	<script>
	  WebFont.load({
		google: { families: ["Public Sans:300,400,500,600,700"] },
		custom: {
		  families: [
			"Font Awesome 5 Solid",
			"Font Awesome 5 Regular",
			"Font Awesome 5 Brands",
			"simple-line-icons",
		  ],
		  urls: ["assets/css/fonts.min.css"],
		},
		active: function () {
		  sessionStorage.fonts = true;
		},
	  });
	</script>
  </div>  

</head>
<body>
<!-- partial:index.partial.html -->
<div class="container">
	<div class="screen">
		<div class="screen__content">
			<form class="login">
				<div class="login__field">
					<i class="login__icon fas fa-user"></i>
					<input type="text" class="login__input" placeholder="Username">
				</div>
				<div class="login__field">
					<i class="login__icon fas fa-lock"></i>
					<input type="password" class="login__input" placeholder="Password">
				</div>
				<div class="login__field">
					<i class="login__icon fas fa-lock"></i>
					<input type="password" class="login__input" placeholder="Confirmation Password">
				</div>
				<button class="button login__submit">
					<span class="button__text">Register Account</span>
					<i class="button__icon fas fa-chevron-right"></i>
				</button>			
			</form>
		</div>
		<div class="screen__background">
			<span class="screen__background__shape screen__background__shape4"></span>
			<span class="screen__background__shape screen__background__shape3"></span>		
			<span class="screen__background__shape screen__background__shape2"></span>
			<span class="screen__background__shape screen__background__shape1"></span>
		</div>		
	</div>
</div>
<!-- partial -->
  
</body>
</html>
