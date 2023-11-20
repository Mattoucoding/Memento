<?php
require 'connection.php';

session_start();
if (isset($_SESSION['errors'])) {
    unset($_SESSION['errors']);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_confirmation = $_POST['password_confirmation'];

    $errors = [];
    
    if ($name === '' || $email === '' || $password === '' || $password_confirmation === '') {
        $errors[] = "Tous les champs doivent être saisis.";
    } else {
       
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Le champ email doit être une adresse email valide.";
        }

       
        if (strlen($password) < 8) {
            $errors[] = "Le champ password doit contenir au moins 8 caractères.";
        }

       
        if ($password !== $password_confirmation) {
            $errors[] = "Les mots de passe ne correspondent";
        }
         }
            }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
</head>
<body>

<h1>Formulaire d'Inscription</h1>

<?php

if (!empty($errors)) {
    echo "<div>";
    echo "<h2>Erreurs :</h2>";
    echo "<ul>";
    foreach ($errors as $error) {
        echo "<li>$error</li>";
    }
    echo "</ul>";
    echo "</div>";
}
?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
    <label>Name :</label>
    <input type="text" name="name" required>
    <br>

    <label>Email :</label>
    <input type="email" name="email" required>
    <br>

    <label>Password :</label>
    <input type="password" name="password" required>
    <br>

    <label>Password Confirmation :</label>
    <input type="password" name="password_confirmation" required>
    <br>

    <a href="index.php" title="index">
    <button type="button">Register</button>
</form>

<?php

if (isset($errors) && count($errors)>0) {
    for ($i=0; $i < count($errors); $i++) {
        echo $errors[$i]. '<br>';
    }
}
?>

</body>
</html>