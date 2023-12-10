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
    </head>
    <body>
    <form action= "Include/quizhandler.inc.php" method="POST">
        <div class="checkbox-group">
            <label class="checkbox-label">
                <span class="label-text">Pop</span>
                <input type="checkbox" name="Pop" class="toggle-switch">
            </label>
            <label class="checkbox-label">
                <span class="label-text">Rock</span>
                <input type="checkbox" name="Rock" class="toggle-switch">
            </label>
            <label class="checkbox-label">
                <span class="label-text">Jazz</span>
                <input type="checkbox" name="Jazz" class="toggle-switch">
            </label>
            <label class="checkbox-label">
                <span class="label-text">Hip-Hop</span>
                <input type="checkbox" name="Hip-Hop" class="toggle-switch">
            </label>
            <label class="checkbox-label">
                <span class="label-text">Indie</span>
                <input type="checkbox" name="Indie" class="toggle-switch">
            </label>
            <label class="checkbox-label">
                <span class="label-text">EDM</span>
                <input type="checkbox" name="EDM" class="toggle-switch">
            </label>
            <label class="checkbox-label">
                <span class="label-text">Country</span>
                <input type="checkbox" name="Country" class="toggle-switch">
            </label>
            <label class="checkbox-label">
                <span class="label-text">Classical</span>
                <input type="checkbox" name="Classical" class="toggle-switch">
            </label>
            <label class="checkbox-label">
                <span class="label-text">R&B</span>
                <input type="checkbox" name="R&B" class="toggle-switch">
            </label>
            <label class="checkbox-label">
                <span class="label-text">Metal</span>
                <input type="checkbox" name="Metal" class="toggle-switch">
            </label>
            <button type="submit">Submit</button>
        </div>
    </form>
        <?php
        echo $_SESSION["username"];
        ?>
    </body>
</html>