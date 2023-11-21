<?php

require 'connection.php';
session_unset();

function validationEmail($email)
{
    return filter_var($email, FILTER_VALIDATE_EMAIL);   
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['csrf_token']) && $_POST['csrf_token'] === $_SESSION['csrf_token']) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_confirmation = $_POST['password_confirmation'];

    if (!empty($name) && !empty($email) && !empty($password) && !empty($password_confirmation)) {
        if (validationEmail($email) && strlen($password) >= 8) {
            if ($password !== $password_confirmation) {
                echo 'Les mots de passe ne correspondent pas.';
            } else {

                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

                try {
                    $stmt = $bdd->prepare("INSERT INTO login (name, email, password) VALUES (:name, :email, :password)");
                    $stmt->bindParam(':name', $name);
                    $stmt->bindParam(':email', $email);
                    $stmt->bindParam(':password', $hashedPassword);
                    $stmt->execute();

                    echo "Données enregistrées avec succès.";

                    $_SESSION['name'] = $name;

                    header("Location: logged.php");
                    exit();
                } catch (PDOException $e) {
                    echo "Erreur : " . $e->getMessage();
                }
            }
        } else {
            echo 'Email invalide ou mot de passe trop court (minimum 8 caractères).';
        }
    } else {
        echo 'Veuillez remplir tous les champs du formulaire.';
    }
} else {

    echo "Erreur CSRF : Tentative de manipulation du formulaire détectée.";
}
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
<input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">


<form action="register.php" method="post">


    <label for="name">Name :</label>
    <input type="text" id="name" name="name"><br>

    <label for="email">Email :</label>
    <input type="text" id="email" name="email"><br>

    <label for="password">Mot de passe :</label>
    <input type="password" id="password" name="password"><br>

    <label for="password_confirmation">Confirmer le mot de passe :</label>
    <input type="password" id="password_confirmation" name="password_confirmation"><br>

    <input type="submit" value="S'inscrire">

</form>
    
</body>
</html>