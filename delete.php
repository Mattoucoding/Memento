<?php
require 'connection.php';

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header('location: index.php');
    exit();
}

$query = "SELECT * FROM postit WHERE id=:id";
$response = $bdd->prepare($query);
$response->execute(['id' => $_GET['id']]);
$data = $response->fetch();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['confirm'])) {

    $deleteQuery = "DELETE FROM postit WHERE id=:id";
    $deleteResponse = $bdd->prepare($deleteQuery);
    $deleteResponse->execute(['id' => $_GET['id']]);

    header('location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" email="width=device-width, initial-scale=1.0">
    <title>Delete</title>
</head>
<body>
    <a href='index.php' title='back'>Retour</a><br>
    <h2>Confirmation de suppression</h2>
    <p>Confirmez-vous la suppression de la voiture suivante ?</p>

    <strong>Titre:</strong> <?= $data['titre'] ?><br>
    <strong>email:</strong> <?= $data['email'] ?><br>
    <strong>password:</strong> <?= $data['password'] ?><br>

    <form method="post" action="">
        <input type="submit" name="confirm" value="Confirmer la suppression">
    </form>
</body>
</html>
