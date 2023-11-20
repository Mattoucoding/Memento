<?php
require 'connection.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Memento</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <div class="container navigation">
			<a href="index.php"><img src="assets/images/memento.png" alt=""></a>
			<nav>
				<a href="login.php" title="login">Login</a>
				<a href="register.php" title="register">Register</a>
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
            <p>Lorem ipsum dolor sit amet.</p>
            <p>Date</p>
        </div>
    </main>
</body>
</html>