<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Captcha Validation</title>

	<script src="https://kit.fontawesome.com/dd09a4070a.js" crossorigin="anonymous"></script>

	<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,300;0,400;1,300&display=swap" rel="stylesheet">


	<style type="text/css">
		.main{
			display: flex;
			flex-direction: column;
			height: auto;
			width: 400px;
			border: 1px solid #000;
			border-radius: 4px;
			align-items: center;
			justify-content: center;
		}
		.captcha{
			display: flex;
			flex-direction: row;
			border: none;
			margin-bottom: 2%;
			width: 90%;
		}
		.child1{
			border: 1px solid #76448A;
			padding: 2rem;
			width: 60%;
			border-top-left-radius: 10px;
			border-bottom-left-radius: 10px;
			font-size: 2.1rem;
			margin-right: 2px;
			font-family: 'Roboto Condensed', sans-serif;
			background: #76448A;
			color: #fff;
		}
		.child2{
			border: 1px solid #28B463;
			width: 20%;
			padding: 2rem;
			font-size: 2.5rem;
			border-top-right-radius: 10px;
			border-bottom-right-radius: 10px;
			background: #28B463;
		}
		.textbox{
			width: 90%;
			padding: 0.5rem;
			border-radius: 10px;
			border: none;
			border-bottom: 2px solid #000;
			margin-bottom: 10px;
			color: #fff;
			font-size: 1rem;
			background: #283747;
			outline: none;
		}
		.btn{
			background: green;
			color: #fff;
			width: 50%;
			border: none;
			padding: 0.8rem;
			border-radius: 14px;
			margin-bottom: 10px;
		}
	</style>
</head>
<body>
	<center>
		<div class="main">
			<h1>Captcha Validation</h1>
			<div class="captcha">
				<div class="child1"></div>
				<div class="child2" id="btn"><i class="fa-sharpe fa-solid fa-arrows-rotate"></i></div>
			</div>
			<input type="text" name="valid" placeholder="Enter Captcha" class="textbox" required>
			<button class="btn" onclick="validateFun()">Validate</button>
		</div>
	</center>

	<script type="text/javascript">
		$(document).ready(function(){
			$.ajax({
				type: "GET",
				url: "captcha.php",
				success:function(data){
					document.getElementsByClassName("child1")[0].innerHTML = data;
				}
			});
		});
	</script>

	<script type="text/javascript">
		$(document).ready(function(){
			$('#btn').click(function(){
				$.ajax({
					type: "GET",
					url: "captcha.php",
					success:function(data){
						document.getElementsByClassName("child1")[0].innerHTML = data;
					}
				});
			});
		});
	</script>

	<script type="text/javascript">
		function validateFun(){
			var a = document.getElementsByClassName("child1")[0].innerHTML;
			var b = document.getElementsByName("valid")[0].value;

			if(a == b){
				alert("Validation Successful");
			}else{
				alert("Failed to Validate");
				$.ajax({
					type: "GET",
					url: "captcha.php",
					success:function(data){
						document.getElementsByClassName("child1")[0].innerHTML = data;
					}
				});
			}
		}
	</script>
</body>
</html>