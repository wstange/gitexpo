<?php

 session_start();
 if(isset($_GET["logout"])) { unset($_SESSION["login"]); header('Location: index.php'); }
?>
<!DOCTYPE html>
<html>
 <head>
	<title>GitExpo</title>
	<style type="text/css">
	<!--
		html, body { margin: 0; padding: 0; font-family: Verdana; }
		p.msg { position: fixed; top: 0; left: 0; width: 100%; text-align: center; }
		p.msg > span { padding: 5px; }
		p.msg.nok > span { color: #FFF; background-color: #F00; }
		p.msg.ok > span { color: #000; background-color: #0F0; }
	-->
	</style>
 </head>
 <body>
	<div style="width: 100%; height: 100vh; display: flex; align-items: center;">
		<div align="center" style="display: block; width: 200px; margin: auto; padding: 10px; border: 1px solid #000;">
<?php
 if(isset($_POST["username"], $_POST["password"])) {
	if($_POST["username"] == "admin" && md5($_POST["password"]) === "191be0c018ae73331eda29dec75be072") {
		$_SESSION["login"] = true;
	}
	else echo '<p class="msg nok"><span>Zugangsdaten falsch!</span></p>';
 }

 if(isset($_SESSION['login'])) {
	echo '
		<p class="msg ok"><span>Sie sind eingeloggt.</span></p>
		<p><b>Willkommen!</b></p>
		<a href="./?logout">Logout</a>
		';
 }
 else {
	echo '
		<p><b>Bitte einloggen</b></p>
		<form action="" method="post">
			<input type="text" name="username" placeholder="Username" autocomplete="off" style="padding: 5px; width: 180px;" />
			<p><input type="password" name="password" placeholder="Passwort" autocomplete="off" style="padding: 5px; width: 180px;" /></p>
			<input type="submit" value="Login" style="padding: 5px; width: 200px;" />
		</form>
		';
 }

 echo '<div style="position: fixed; right: 0; bottom: 0; background-color: #000; padding: 5px 10px 5px 10px; color: #FFF;">&copy; Made by Capfly</div>';
?>

		</div>
	</div>
 </body>
</html>