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
				<a href="">Login</a>
				<a href="">Register</a>
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
                <li>date</li>
                <li>Heure</li>
                <a href="delete.php" title="delete">
                <button class="delete" type="button">Delete</button></a>
                <?php
                $query = "SELECT * FROM post_it";
                $response = $bdd->query($query);
                $datas = $response->fetchAll();

                foreach ($datas as $data) {
                ?>
    <div class="post-it">
        <h4><?= $data['titre'] ?></h4>
        <p><?= $data['content'] ?><br><?= $data['date'] ?></p>
        <div><a href='delete.php?id=<?= $data['id'] ?>' title='<?= $data['titre'] ?>'>Supprimer</a></div>
    </div>
<?php
}
?>
            </ul>
        </div>
    </main>
</body>
</html>