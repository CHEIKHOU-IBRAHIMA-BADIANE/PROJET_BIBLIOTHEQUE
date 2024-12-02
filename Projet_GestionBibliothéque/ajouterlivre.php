<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>

<?php
    require_once 'db_connect.php';
    if (isset($_POST['ajouter'])) {
 
        $auteur = $_POST['auteur'];
        $date = date('Y-m-d');

        $filename = 'uploads/Bienvenue dans le milieux informatique.pdf';
        if (!empty($_FILES['reference']['name'])) {
            $image = $_FILES['reference']['name'];
            $filename = uniqid() . $image;
            move_uploaded_file($_FILES['reference']['tmp_name'], 'uploads/' . $filename);
        }

        if (!empty($auteur)) {
            $sqlState = $pdo->prepare('INSERT INTO livre VALUES (null,?,?)');
            $inserted = $sqlState->execute([$auteur, $filename]);
            if ($inserted) {
                header('location: article.php');
            } else {

                ?>
                <div class="alert alert-danger" role="alert">
                    Database error (40023).
                </div>
                <?php
            }
        } else {
            ?>
            <div class="alert alert-danger" role="alert">
                Libelle , prix , catégorie sont obligatoires.
            </div>
            <?php
        }

    }
    ?>




<form method="post" enctype="multipart/form-data">
        <label class="form-label">AUTEUR</label>
        <input type="text" name="auteur">
        <label class="form-label">Image</label>
        <input type="file" class="form-control" name="reference">
        <input type="submit" value="Ajouter Livre" class="btn btn-primary my-2" name="ajouter">
    </form>
</body>
</html>