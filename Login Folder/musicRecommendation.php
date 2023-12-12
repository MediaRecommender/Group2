<?php
    require_once "Include/config.php";
    require_once "Include/loginCMV/login_view.php";
    if($_SESSION["user_uname"]){
        output_uname();
        
        
        ?>
            <form action='Include/logout.inc.php' method='POST'>
            <button class='cancelbtn'>Logout</button>
            </form>
        <?php
    }
    else
        header("Location: index.php");
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href = "Include/style.css">
        <link rel="stylesheet" href = "Include/quizStyle.css">
        <link rel="icon" type="image/x-icon" href="Media/OIG.svg">
<script>
        <?php
        if(isset($_SESSION["user_uname"])) {
            $username = $_SESSION["user_uname"];
            echo 'var userUname = "' . $username . '";';
        }
        ?>
    </script>
  <title>Pickify</title>
</head>
<body>
  <h1>Created Playlist</h1>

  <form id="genreSongsContainer">
    <script src="JavaScript/generateRec.js"></script>
  </form>
  <div class="imgcontainer">
			<img src="Media/OIG.svg" alt="Avatar" class="avatar">
		</div>
</body>
</html>