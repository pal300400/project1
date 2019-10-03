<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="style/bootstrap.css">
	<script src="JS/bootstrap.bundle.js"></script>
	<script src="JS/jquery-1.8.2.min.js"></script>
	<script src="JS/cities.js"></script>
	<script>
		function showpreview(file, ref, pikname) {

			if (file.files && file.files[0]) {

				var reader = new FileReader();
				reader.onload = function(e) {
					$(ref).prop('src', e.target.result);
					$(pikname).text(file.files[0].name);
				}
				reader.readAsDataURL(file.files[0]);
			}

		}

	</script>
	
	<script>
			
		$(document).ready(function() {

			$(document).ajaxStart(function() {
				$("#loading").css("display", "block");
			});
			$(document).ajaxStop(function() {
				$("#loading").css("display", "none");
			});
			
			$("#btnSrch").click(function() {
				var uid = $("#txtuid").val();
				$.getJSON("json-get-record.php?uid=" + uid, function(jsonAry) {
					alert(JSON.stringify(jsonAry));

					$("#txtins").val(jsonAry[0].institute);
					$("#txtweb").val(jsonAry[0].website);
					$("#txtcper").val(jsonAry[0].cperson);
					$("#email").val(jsonAry[0].email);
					$("#txtmob").val(jsonAry[0].mobile);
					$("#txtestd").val(jsonAry[0].estd);
					$("#txtadds").val(jsonAry[0].address);
					
					$("#txtzip").val(jsonAry[0].zip);
					$("#txtdetails").val(jsonAry[0].details);
					
					var stt=jsonAry[0].state;
					$("#state").val(stt).prop("selected",true);
					var city = jsonAry[0].city;
					$("#state").onchange="print_city('city', stt);"
					//$("#city").val(city).prop("selected", true);

					/*var city = jsonAry[0].city;
					$("#city").val(city).prop("selected", true);*/


					var picpath1 = jsonAry[0].pic1;
					$("#prev1").prop("src", "uploads/" + picpath1);
					$("#pikname1").text(picpath1);
					
					var picpath2 = jsonAry[0].pic2;
					$("#prev2").prop("src", "uploads/" + picpath2);
					$("#pikname2").text(picpath2);
					
					var picpath3 = jsonAry[0].pic3;
					$("#prev3").prop("src", "uploads/" + picpath3);
					$("#pikname3").text(picpath3);
				});



			});

		});
			

	</script>
	<style>
	
	.btn:hover {
			box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
		}


		#loading {
			position: absolute;
			left: 45%;
			top: 25%;
			width: 100px;
			height: 100px;
			background-image: url(class/pics/animated.gif);
			z-index: 100;
			display: none;

		}

		.btn-space {
			margin-right: 5px;
		}
	</style>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

</head>

<body>
<div id="loading"></div>
	<div class="container col-md-12 " >
		<form action="">
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
					</div>
				</nav>
			</div>
		</form>

		<!--form-->
		<div class="container col-md-10 mt-2 " >
			<form action="institute-process.php" method="post" enctype="multipart/form-data">
				<div class="form-row ">
					<div class="form-group col-md-5">
						<label for="txtuid">Username</label>
						<input type="text" class="form-control" id="txtuid" name="txtuid" placeholder="Username">
					</div>
					<div class="form-group col-md-1">
					<label for="btn"> &nbsp;</label>
					<button type="button" class="btn form-control btn text-white active" id="btnSrch" name="btnSrch" value="Search" style="background-color:#819d52">Search</button>	
					</div>
					<div class="form-group col-md-6">
						<label for="txtins">Institute</label>
						<input type="text" class="form-control" id="txtins"  name="txtins" placeholder="Institute Name">
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-md-6">
						<label for="txtweb">Website</label>
						<input type="text" class="form-control" id="txtweb" name="txtweb" placeholder="Url">
					</div>
					<div class="form-group col-md-6">
						<label for="txtcper">Contact Person</label>
						<input type="text" class="form-control" id="txtcper" name="txtcper" placeholder="Contact Person">
					</div>

				</div>
				<div class="form-row">

					<div class="form-group col-md-6">
						<label for="email">Email</label>
						<input type="email" class="form-control" id="email" name="email" placeholder=" ">
					</div>
					<div class="form-group col-md-4">
						<label for="txtmob">Mobile</label>
						<input type="text" class="form-control" id="txtmob" name="txtmob" placeholder="Url">
					</div>
					<div class="form-group col-md-2">
						<label for="txtestd">Established</label>
						<input type="text" class="form-control" id="txtestd" name="txtestd" placeholder="Estd Year">
					</div>

				</div>
				<div class="form-group">
					<label for="txtadds">Address</label>
					<input type="text" class="form-control" id="txtadds" name="txtadds" placeholder="1234 Main St">
				</div>

				<div class="form-row">

					<div class="form-group col-md-5">
						<label for="state">State</label>
						<select class="form-control" onchange="print_city('city', this.selectedIndex);" id="state" name="state" ></select></div>
					<div class="form-group col-md-5">
						<label for="city">City</label>
						<select id="city" name="city" class="form-control" ></select></div>
					<script language="javascript">
						print_state("state");

					</script>



					<div class="form-group col-md-2">
						<label for="txtzip">Zip</label>
						<input type="text" class="form-control" id="txtzip" name="txtzip">
					</div>
				</div>


				<div class="form-group form-inline ">
					<div class="form-group  col-md-4 justify-content-start ">
						<input type="file" id="pik1" name="pik1" hidden onchange="showpreview(this,prev1,pikname1);">
						<div style="text-align: center">
							<img id="prev1" src="pics/userinfo.png" alt="" width="135" height="135">
							<small id="pikname1" name="pikname1" class="form-text  "> </small>
							<br>
							<label for="pik1" class="btn text-white  " style="background-color:#819d52 ">Upload Pic1</label></div>
					</div>
					<div class="form-group  col-md-4 justify-content-center ">
						<input type="file" id="pik2" name="pik2" hidden onchange="showpreview(this,prev2,pikname2);">
						<div style="text-align: center">
							<img id="prev2" src="pics/userinfo.png" alt="" width="135" height="135">
							<small id="pikname2" name="pikname2" class="form-text  "> </small>
							<br>
							<label for="pik2" class="btn text-white  " style="background-color:#819d52 ">Upload Pic2</label></div>
					</div>
					<div class="form-group  col-md-4 justify-content-end ">
						<input type="file" id="pik3" name="pik3" hidden onchange="showpreview(this,prev3,pikname3);">
						<div style="text-align: center">
							<img id="prev3" src="pics/userinfo.png" alt="" width="135" height="135">
							<small id="pikname3" name="pikname3" class="form-text  "> </small>
							<br>
							<label for="pik3" class="btn text-white  " style="background-color:#819d52 ">Upload Pic3</label></div>
					</div></div>

					<div class="form-group">
						<label for="txtdetails">Details</label>
						<textarea class="form-control" id="txtdetails" name="txtdetails" rows="3" placeholder="Please enter fee and any other details in no more than 500 characters"></textarea>
					</div>

				<br>
				<div class="form-group text-center">

					<button type="submit" class="btn btn-primary active btn-space" id="btn" name="btn" value="save" style="background-color:#819d52">Save</button>
					<button type="submit" class="btn btn-primary active btn-space" id="btn" name="btn" value="update"  style="background-color:#819d52">Update</button>
					<button type="submit" class="btn btn-primary active btn-space" style="background-color:#819d52" id="btn" name="btn" value="delete" >Delete</button>
				</div>
			</form>








		</div>

	</div>
</body>

</html>
