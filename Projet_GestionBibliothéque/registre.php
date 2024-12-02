<?php
require 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];
    $adresse = $_POST['adresse'];
    $telephone = $_POST['telephone'];
    $email = $_POST['email'];

    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $stmt = $pdo->prepare('INSERT INTO membre (prenom,nom,adresse,telephone,email, password) VALUES (?, ?, ?,?, ?, ?)');
    $stmt->execute([$prenom,$nom, $adresse, $telephone, $email, $password]);

    echo "Inscription réussie!";
    header('Location: index.php');
    
}
?>

<form method="post">
    <input type="text" name="prenom" placeholder="Prenom" required>
    <input type="text" name="nom" placeholder="Nom" required>
    <input type="text" name="adresse" placeholder="Adresse" required>
    <input type="text" name="telephone" placeholder="numero de telephone" required>
    <input type="text" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Mot de passe" required>
    <button type="submit">S'inscrire</button>
</form>
