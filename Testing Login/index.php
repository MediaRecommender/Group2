<?php
require_once "Include/config.php";
?>



<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href = "Include/style.css">
	</head>

<body>

	<h2>Modal Login Form</h2>
	<!--Step 1 : Adding HTML-->
	<button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Login</button>

	<div id="id01" class="modal">

		<form class="modal-content animate" action= "login.php" method="post">
			<div class="imgcontainer">
				<span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
				<img src="OIG.svg" alt="Avatar" class="avatar">
			</div>

			<div class="container">
				    <label><b>Username</b></label>
				    <input type="text" placeholder="Enter Username" name="uname" required>

				    <label><b>Password</b></label>
				    <input type="password" placeholder="Enter Password" name="psw" required>

				    <button type="submit">Login</button>
				    <input type="checkbox" checked="checked"> Remember me
			</div>

			<div class="container" style="background-color:#f1f1f1">
				<button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
				<span class="psw"><a href="create.php">Create account</a></span>
			</div>
		</form>
	</div>

	<script>
		var modal = document.getElementById('id01');
		window.onclick = function(event) {
			if (event.target == modal) {
				modal.style.display = "none";
			}
		}
	</script>
</body>

</html>
