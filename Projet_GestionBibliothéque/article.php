
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion de Bibliothèque</title>
<link rel="stylesheet" href="./assets/style.css">
</head>
<body background="Bibliotheque.jpeg">

<header>
    <h1>Gestion de Bibliothèque</h1>
    <nav>
        <a href="#">Accueil</a>
        <a href="ajouterlivre.php">Ajouter un Livre</a>
    </nav>
</header>


        

<table>
<thead>
    <th>ISBN</th>
    <th>REFERENCE</th>
    <th>AUTEUR</th>
    <th>Modifier</th>
    <th>Supprimer</th>
</thead>
<tbody>
        <?php
        require_once 'db_connect.php';
        $livreArticle = $pdo->query('SELECT * FROM livre')->fetchAll(PDO::FETCH_ASSOC);
        foreach ($livreArticle as $article) {
            ?>
            <tr>
                <td><?php echo $article['isbn'] ?></td>
                <td><?php echo $article['reference'] ?></td>
                <td><?php echo $article['auteur'] ?> <i class="fa fa-solid fa-dollar"></i></td>
                <td><a class="btn btn-primary btn-sm" href="commande.php?id=<?php echo $article['isbn']?>">Modifier</a></td>
                <td><a class="btn btn-danger" href="supprimerarticle.php?isbn=<?php echo $article['isbn'] ?>" onclick="return confirm('Voulez vous vraiment supprimer le produit?')">Supprimer</a></td>

            </tr>
            <?php
        }
        ?>
        </tbody>
</table>

<footer>
    <p>&copy; 2024 Gestion de Bibliothèque</p>
</footer>

</body>
</html>