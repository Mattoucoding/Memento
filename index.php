<?php
require 'connection.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" email="width=device-width, initial-scale=1.0">
    <title>Memento</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <div class="container navigation">
			<a href="index.php"><img src="assets/images/memento.png" alt=""></a>
			<nav>
				<a href="login.php" type="">Login</a>
				<a href="register.php">Register</a>
			</nav>
		</div>
	</header>
    <hr>
    <main>
        <div class="section1">
            <h1>Memento</h1>
            <a href="new.php" title="new">
            <button class="add button" type="button">Add Postit</button></a>
        </div>
        <div class="box">
            <h2>Title</h2>
            <ul>
                <li>Nom</li>
                <li>password</li>
                <li>Heure</li>
            </ul>
        </div>
    </main>
</body>
</html>