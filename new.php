<?php
require 'connection.php';
session_start();
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $errors = [];

    $titre = $_POST['titre'];
    $email = $_POST['email'];
    $password = $_POST['password'];


    if (count($errors) === 0) {
        $query = "INSERT INTO post_it(titre, email, password) VALUES (:titre, :email, :password)";
        $response = $bdd->prepare($query);
        $response->execute([
            ':titre' => $_POST['titre'],
            ':email' => $_POST['email'],
            ':password' => $_POST['password'],
        ]);

        header('location:index.php');
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" email="width=device-width, initial-scale=1.0">
    <title>New</title>
</head>
<body>
		<form method="POST" action="">
        <div>
            <label for="titre">Titre : </label>
            <input type="text" id="titre" name="titre" value="<?= $_POST['titre'] ?? '' ?>">
            <?php if (!empty($errors['titre'])) {?>
                <br><span class='error'><?= $errors['titre'] ?></span>
            <?php } ?>
        </div>
        <div>
            <label for="email">email : </label>
            <input type="text" id="email" name="email" value="<?= $_POST['email'] ?? '' ?>">
            <?php if (!empty($errors['email'])) {?>
                <br><span class='error'><?= $errors['email'] ?></span>
            <?php } ?>
        </div>
        <div>
            <label for="password">password : </label>
            <input type="password" id="password" name="password" value="<?= $_POST['password'] ?? '' ?>">
            <?php if (!empty($errors['password'])) {?>
                <br><span class='error'><?= $errors['brand'] ?></span>
            <?php } ?>
        </div>
			<input type="submit" value="Submit" />
		</form>
        <?php
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titre = $_POST['titre']; 
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    if (!isset($titre)){
      die("Enter the titre.");
    }
    if (!isset($email)){
      die("Enter the email.");
    }
    if (!isset($password)){
        die("Enter the password.");
    }
}
?>
</body>
</html>