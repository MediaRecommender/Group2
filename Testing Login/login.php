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
<html><head>
<link rel="stylesheet" href = "Include/style.css">
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<title>A Sample HTML Document (Test File)</title>
<meta charset="utf-8">
<meta name="description" content="A blank HTML document for testing purposes.">
<meta name="author" content="Six Revisions">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="A%20Sample%20HTML%20Document%20(Test%20File)_files/4I4lfnVuEFW3GRSoEeThpLSjKcg.js"></script><link rel="icon" href="http://sixrevisions.com/favicon.ico" type="image/x-icon">
</head>
<body>
<h1>A Sample HTML Document (Test File)</h1>
<p>A blank HTML document for testing purposes.</p>
<p><a href="https://www.webfx.com/archive/blog/images/assets/cdn.sixrevisions.com/0435-01_html5_download_attribute_demo/html5download-demo.html">Go back to the demo</a></p>
<p><a href="http://sixrevisions.com/html5/download-attribute/">Read the HTML5 download attribute guide</a></p>
<?php
echo $_SESSION["username"];
?>
</body></html>