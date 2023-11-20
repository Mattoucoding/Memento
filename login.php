<?php
require 'connection.php';
session_start();
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $errors = [];

    $name = $_POST['name'];
    $email = $_POST['email'];
    $date = $_POST['date'];


    if (count($errors) === 0) {
        $query = "INSERT INTO login(name, email, date) VALUES (:name, :email, :date)";
        $response = $bdd->prepare($query);
        $response->execute([
            ':name' => $_POST['name'],
            ':email' => $_POST['email'],
            ':date' => $_POST['date'],
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
            <label for="email">email : </label>
            <input type="text" id="email" name="email" value="<?= $_POST['email'] ?? '' ?>">
            <?php if (!empty($errors['email'])) {?>
                <br><span class='error'><?= $errors['email'] ?></span>
            <?php } ?>
        </div>
        <div>
            <label for="date">date : </label>
            <input type="date" id="date" name="date" value="<?= $_POST['date'] ?? '' ?>">
            <?php if (!empty($errors['date'])) {?>
                <br><span class='error'><?= $errors['date'] ?></span>
            <?php } ?>
        </div>
			<input type="submit" value="Submit" />
		</form>
        <?php
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name']; 
    $email = $_POST['email'];
    $date = $_POST['date'];
    
    if (!isset($name)){
      die("Enter the titre.");
    }
    if (!isset($email)){
      die("Enter the email.");
    }
    if (!isset($date)){
        die("Enter the date.");
    }
}
?>
</body>
</html>