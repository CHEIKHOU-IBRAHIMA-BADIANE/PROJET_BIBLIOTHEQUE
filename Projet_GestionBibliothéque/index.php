<?php
require 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $prenom = $_POST['prenom'];
    $password = $_POST['password'];

    $stmt = $pdo->prepare('SELECT * FROM membre WHERE prenom = ?');
    $stmt->execute([$prenom]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        echo "Connexion réussie!";
    } else {
        echo "Nom d'utilisateur ou mot de passe incorrect.";
    }
    header('Location: article.php');
}
?>

<form method="post">
    <input type="text" name="prenom" placeholder="Prenom" required>
    <input type="password" name="password" placeholder="Mot de passe" required>
    <button type="submit">Se connecter</button>
    <button ><a href="registre.php">Cree un compte</a></button>
</form>
