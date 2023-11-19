<?php
    require_once "Include/signupCMV/signup_view.php";
	require_once "Include/config.php";
	
?>

<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href = "Include/style.css">
	</head>

<body>

	<h2>Modal Create Form</h2>
	<!--Step 1 : Adding HTML-->
	<button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Sign Up</button>

	<div id="id01" class="modal">

		<form class="modal-content animate" action="Include/formhandler.inc.php" method="POST">
			<div class="imgcontainer">
				<span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
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
		var modal = document.getElementById('id01');
		window.onclick = function(event) {
			if (event.target == modal) {
				modal.style.display = "none";
			}
		}
	</script>
</body>

</html>

