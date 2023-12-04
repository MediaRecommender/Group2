<?php
	require_once "Include/config.php";
	require_once "Include/loginCMV/login_view.php";
	require_once "Include/signupCMV/signup_view.php";
?>	



<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href = "Include/style.css">
	</head>

<body>
<div style="text-align:center">
	<h1>
		<?php
			output_uname();
		?>
	</h1>

	<h2>Modal Login Form</h2>
	<!--Step 1 : Adding HTML-->
	<?php
		$fpvalue  = $_GET['login'];
		if($fpvalue == 'success')
			header("Location: login.php");
	?>
	<button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Login</button>
	<button onclick="document.getElementById('id02').style.display='block'" style="width:auto;">Create</button>
	<div id="id01" class="modal">

		<form class="modal-content animate" action= "Include/loginhandler.inc.php" method="POST">
			<div class="imgcontainer">
				<span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
				<img src="Include/OIG.svg" alt="Avatar" width="100" height="100" class="avatar">
			</div>

			<div class="container">
				    <label><b>Username</b></label>
				    <input type="text" placeholder="Enter Username" name="uname" required>

				    <label><b>Password</b></label>
				    <input type="password" placeholder="Enter Password" name="psw" required>

				    <button type="submit">Login</button>
				    <input type="checkbox" checked="checked" name="rmb"> Remember me
			</div>

			<div class="container" style="background-color:#f1f1f1">
				<button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
				<span class="psw"><a href="create.php">Create account</a></span>
			</div>
		</form>
	</div>
	<?php
		check_login_errors();
		if($_SESSION["user_uname"]){
		?>
			<form action='Include/logout.inc.php' method='POST'>
			<button class='cancelbtn'>Logout</button>
			</form>
		<?php
		}
	?>

	<script>
		var modal = document.getElementById('id01');
		window.onclick = function(event) {
			if (event.target == modal) {
				modal.style.display = "none";
			}
		}
	</script>

<div id="id02" class="modal">

<form class="modal-content animate" action="Include/formhandler.inc.php" method="POST">
	<div class="imgcontainer">
		<span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
		<img src="Include/OIG.svg" alt="Avatar" width="100" height="100" class="avatar">
	</div>

	<div class="container">
		<form action= "Include/formhandler.inc.php" method="post">
			<label><b>Username</b></label>
			<input type="text" placeholder="Enter Username" name="uname" >
			<label><b>Email</b></label>
			<input type="text" placeholder="Enter Email" name="email" >
			<label><b>Password</b></label>
			<input type="password" placeholder="Enter Password" name="psw" >
			<button type="submit">Sign Up</button>
			
		</form>

	</div>

	<div class="container" style="background-color:#f1f1f1">
		<button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>			
	</div>
</form>

</div>
<?php
check_signup_errors();

?>


<script>
var modal = document.getElementById('id02');
window.onclick = function(event) {
	if (event.target == modal) {
		modal.style.display = "none";
	}
}
</script>

</div>
</body>

</html>

