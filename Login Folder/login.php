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
    <script>
        <?php
        if(isset($_SESSION["user_uname"])) {
            $username = $_SESSION["user_uname"];
            echo 'var userUname = "' . $username . '";';
        }
        ?>
    </script>
        <link rel="stylesheet" href = "Include/style.css">
        <link rel="stylesheet" href = "Include/quizStyle.css">
        <link rel="icon" type="image/x-icon" href="Media/OIG.svg">
    </head>
    <body>
    <form id="genreForm">
        <div class="checkbox-group">
        <button type="button" id="submitBtn">Submit</button>
            <label class="checkbox-label">
                <span class="label-text">Pop</span>
                <input type="checkbox" name="genres[]" value="Pop" class="toggle-switch">
            </label>
            <label class="checkbox-label">
                <span class="label-text">Rock</span>
                <input type="checkbox" name="genres[]" value="Rock" class="toggle-switch">
            </label>
            <label class="checkbox-label">
                <span class="label-text">Jazz</span>
                <input type="checkbox" name="genres[]" value="Jazz" class="toggle-switch">
            </label>
            <label class="checkbox-label">
                <span class="label-text">Hip-Hop</span>
                <input type="checkbox" name="genres[]" value="Hip-Hop" class="toggle-switch">
            </label>
            <label class="checkbox-label">
                <span class="label-text">Indie</span>
                <input type="checkbox" name="genres[]" value="Indie" class="toggle-switch">
            </label>
            <label class="checkbox-label">
                <span class="label-text">EDM</span>
                <input type="checkbox" name="genres[]" value="EDM" class="toggle-switch">
            </label>
            <label class="checkbox-label">
                <span class="label-text">Country</span>
                <input type="checkbox" name="genres[]" value="Country" class="toggle-switch">
            </label>
            <label class="checkbox-label">
                <span class="label-text">Classical</span>
                <input type="checkbox" name="genres[]" value="Classical" class="toggle-switch">
            </label>
            <label class="checkbox-label">
                <span class="label-text">R&B</span>
                <input type="checkbox" name="genres[]" value="R&B" class="toggle-switch">
            </label>
            <label class="checkbox-label">
                <span class="label-text">Metal</span>
                <input type="checkbox" name="genres[]" value="Metal" class="toggle-switch">
            </label>
            
        </div>
    </form>
    <script src="JavaScript/genreSurvey.js"> </script>
    <div class="imgcontainer">
			<img src="Media/OIG.svg" alt="Avatar" class="avatar">
		</div>
    </body>
</html>