<?php
    require_once 'db_connect.php';
    $id = $_GET['isdn'];
    $sqlState = $pdo->prepare('DELETE FROM livre WHERE isbn=?');
    $supprime = $sqlState->execute([$id]);
    header('location: article.php');