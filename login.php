<?php
require 'connection.php';

function validationEmail($email)
{
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['csrf_token']) && $_POST['csrf_token'] === $_SESSION['csrf_token']) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    

    if (!empty($email) && !empty($password)) {
        if (validationEmail($email) && strlen($password) >= 8) {
            try {
                $stmt = $bdd->prepare("SELECT * FROM login WHERE email = :email");
                $stmt->bindParam(':email', $email);
                $stmt->execute();
                $user = $stmt->fetch(PDO::FETCH_ASSOC);

                if ($user) {
                    
                    if (password_verify($password, $user['password'])) {
                        
                        $_SESSION['email'] = $user['email'];
                        $_SESSION['name'] = $user['name'];
                        $_SESSION['islog']= true;
                        header('Location: logged.php');
                        exit();
                    } else {
                        
                        echo "Le mot de passe est incorrect.";
                    }
                } else {
                   
                    echo "L'email n'est pas enregistré.";
                }
            } catch (PDOException $e) {
                echo "Erreur : " . $e->getMessage();
            }
        } else {
            echo "L'email n'est pas valide ou le mot de passe doit contenir au moins 8 caractères.";
        }
    } else {
        echo "Les champs email et password ne peuvent pas être vides.";
    }
} else {

    echo "Erreur CSRF : Tentative de manipulation du formulaire détectée.";
}
}
?>

<!DOCTYPE html> 
<html lang="fr">
<head>
<link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="login.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de connexion</title>
</head>
<body>

<div class="login">
    <h2 class="active">Sign In</h2>

    <form action="login.php" method="post">
    <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">

        <div>
            <label for="email">Email:</label>
            <input type="text" id="email" name="email" class="text" required>
            
        </div>

        <div>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" class="text" required>
            
        </div>

        <button class="signin" type="submit">Sign In</button>
        <hr>
    </form>
</div>

    
</body>
</html>