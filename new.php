<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php
session_start();
require "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titre = $_POST['titre'];
    $content = $_POST['content'];
    $date = $_POST['date'];

    

    try {
        $stmt = $bdd->prepare("INSERT INTO post_it (titre, content, date) VALUES (:titre, :content, :date)");
        $stmt->bindParam(':titre', $titre);
        $stmt->bindParam(':content', $content);
        $stmt->bindParam(':date', $date);
        $stmt->execute();

        echo "Données enregistrées avec succès.";
    } catch(PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
}
?>

<a href='index.php' title='back'>Back</a><br>
<h1>Ajouter un post-it</h1>
<form method="POST" action="new.php">
    <div class="form-floating mb-3">
        <label for="titre">Title</label>
        <input type="text" name="titre" class="form-control" id="titre" placeholder="Title" required>
    </div>
    <div class="form-floating">
        <label for="content">Content</label>
        <input type="text" name="content" class="form-control" id="content" placeholder="Content" required>
    </div>
    <div class="form-floating">
        <label for="date">Date</label>
        <input type="date" name="date" class="form-control" id="date" placeholder="Date" required>
    </div>
    <button type="submit" class="btn">Envoyer</button>
</form>

</body>
</html>
