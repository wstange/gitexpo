<?php

 session_start();
 if(!empty($_POST["username"]) && !empty($_POST["password"])) {
	if($_POST["username"] == "admin" && md5($_POST["password"]) == "191be0c018ae73331eda29dec75be072") {
		$_SESSION["login"] = true;
	}
	else echo '<p align="center">Zugangsdaten falsch!</p>';
 }
 if(isset($_GET["logout"])) { unset($_SESSION["login"]); header('Location: index.php'); }

 if(isset($_SESSION['login'])) {
	echo '<p align="center">Sie sind eingeloggt. <a href="./?logout">Logout</a></p>';
 }
 else {
	echo '
		<div align="center" style="display: block; width: 200px; margin: auto; padding: 10px; border: 1px solid #000;">
		<p>Bitte einloggen</p>
		<form action="" method="post">
			<input type="text" name="username" placeholder="Username" />
			<p><input type="password" name="password" placeholder="Passwort" /></p>
			<input type="submit" value="Login" />
		</form>
		</div>
		';
 }
