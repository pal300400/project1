<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="style/bootstrap.css">
	<script src="JS/jquery-1.8.2.min.js"></script>
	<script src="JS/bootstrap.bundle.js"></script>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
	<style>
		.btn-space {
			margin-right: 5px;
		}

	</style>
	<script>
		$(document).ready(function() {

			/*$(document).ajaxStart(function() {
				$("#loading").css("display", "block");
			});
			$(document).ajaxStop(function() {
				$("#loading").css("display", "none");
			});*/

			$("#txtuid").blur(function() {
				var uid = $("#txtuid").val();
				$.get("ajax-checkuid.php?uid=" + uid, function(response) {
					//alert(response);
					$("#erruid").html(response);
				});
			});


			$("#login").click(function() {
				var uid = $("#txtuidl").val();
				var pswd = $("#txtpswdl").val();
				$.get("ajax-login.php?uid=" + uid + "&pswd=" + pswd, function(response) {
					alert(response); //<a href="https://www.google.com" target="_blank">
				});
				
			});

			$("#SignUp").click(function() {
				var uid = $("#txtuid").val();
				var pswd = $("#txtpswd").val();
				var mob = $("txtmob").val();
				$.get("ajax-signup.php?uid=" + uid + "&pswd=" + pswd + "&mob=" + mob, function(response) {
					alert(response);
				});
				
			});
		});

	</script>

</head>

<body>
	<div class="container col-md-10">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<a class="navbar-brand" href="#">Navbar</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
				<div class="navbar-nav">
					<a class="nav-item nav-link active" href="#">Home <span class="sr-only">(current)</span></a>
					<a class="nav-item nav-link" href="#">Features</a>
					<a class="nav-item nav-link" href="#">Pricing</a>
					<a class="nav-item nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
				</div>
				<div class="ml-auto">

					<form>

						<button class="btn btn-outline-success btn-space" type="button" data-toggle="modal" data-target="#Login-Modal">Login</button>
						<button class="btn  btn-outline-secondary btn-space" type="button" data-toggle="modal" data-target="#SignUp-Modal">SignUp</button>
						<!-- ModalLogin -->
						<div class="modal fade" id="Login-Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">

										<div class="form-group">
											<label for="txtuidl">Email address</label>
											<input type="email" class="form-control" id="txtuidl" aria-describedby="emailHelp" placeholder="Enter email" required>
											<small class="form-text text-muted"> </small>
										</div>
										<div class="form-group">
											<label for="txtpswdl">Password</label>
											<input type="password" class="form-control" id="txtpswdl" placeholder="Password" required>
										</div>


									</div>
									<div class="modal-footer">
										<button class="btn btn-outline-success btn-space" type="submit" id="login" name="login" value="login">Login</button>
									</div>
								</div>
							</div>
						</div>
						<!-- ModalSignUp -->
						<div class="modal fade" id="SignUp-Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">

										<div class="form-group">
											<label for="txtuid">Email address</label>
											<input type="email" class="form-control" id="txtuid" name="txtuid" aria-describedby="emailHelp" placeholder="Enter email" required>
											<label id="erruid" class="form-text text-muted"></label>
										</div>
										<div class="form-group">
											<label for="txtpswd">Password</label>
											<input type="password" class="form-control" id="txtpswd" name="txtpswd" placeholder="Password" required>
										</div>

										<div class="form-group">
											<label for="txtmob">Mobile</label>
											<input type="tel" class="form-control" id="txtmob" name="txtmob" placeholder="Mobile" required>
										</div>
										
										<div class="form-group">
											<label for="txtacc">Account</label>
											<select class="form-control" id="txtacc" name="txtacc" required>
											<option value="" selected></option>
											<option value="Students">Students</option>
											<option value="Consultants">Consultants</option>
											<option value="Institutes">Institutes</option>
											
											</select>
										</div>


									</div>
									<div class="modal-footer">
										<Button class="btn  btn-outline-secondary btn-space" type="button" name="btn" id="SignUp" value="SignUp">SignUp</Button>
										

									</div>
								</div>
							</div>
						</div>

					</form>
				</div>
			</div>
		</nav>
	</div>
</body>

</html>
