<?php
session_start();
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
				<p>Bonjour <?= $_SESSION['name']?></p>
				<a href="logout.php">Logout</a>
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
                <?php
                $query = "SELECT * FROM post_it";
                $response = $bdd->query($query);
                $datas = $response->fetchAll();

                foreach ($datas as $data) {
                ?>
    <div class="box">
        <h2><?= $data['titre'] ?></h2>
        <p><?= $data['content'] ?><br><?= $data['date'] ?></p>
        <div><a href='delete.php?id=<?= $data['id'] ?>' title='<?= $data['titre'] ?>'>Supprimer</a></div>
    </div>
<?php } ?>
            </ul>
        </div>
    </main>
</body>
</html>