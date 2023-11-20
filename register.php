<?php
require 'connection.php';
session_start();
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $errors = [];

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];


    if (count($errors) === 0) {
        $query = "INSERT INTO login(name, email, password) VALUES (:name, :email, :password)";
        $response = $bdd->prepare($query);
        $response->execute([
            ':name' => $_POST['name'],
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
            <label for="name">Name : </label>
            <input type="text" id="name" name="name" value="<?= $_POST['name'] ?? '' ?>">
            <?php if (!empty($errors['name'])) {?>
                <br><span class='error'><?= $errors['name'] ?></span>
            <?php } ?>
        </div>
        <div>
            <label for="email">Email : </label>
            <input type="text" id="email" name="email" value="<?= $_POST['email'] ?? '' ?>">
            <?php if (!empty($errors['email'])) {?>
                <br><span class='error'><?= $errors['email'] ?></span>
            <?php } ?>
        </div>
        <div>
            <label for="password">Password : </label>
            <input type="password" id="password" name="password" value="<?= $_POST['password'] ?? '' ?>">
            <?php if (!empty($errors['password'])) {?>
                <br><span class='error'><?= $errors['brand'] ?></span>
            <?php } ?>
        </div>
			<input type="submit" value="Submit" />
		</form>
        <?php
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name']; 
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    if (!isset($name)){
      die("Enter the name.");
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