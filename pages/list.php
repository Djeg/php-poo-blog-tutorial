<?php
require __DIR__ . '/partials/themeStart.php';

// Ici, au lieu d'utiliser PDO nous pouvons utiliser
// notre instance de ArticleTable: $articleTable.

// Faire en sorte que le code suivant fonctionne
// $articles = $articleTable->findAll();

$articles = $articleTable->findAll();

?>

<h1>Bienvenue</h1>

<? foreach ($articles as $article) : ?>
    <div class="card my-3">
        <div class="card-body">
            <h5 class="card-title"><?= $article['title'] ?></h5>
            <p class="card-text"><?= $article['description'] ?></p>
            <a href="./index.php?page=article&id=<?= $article['id'] ?>" class="btn btn-primary">Lire cette article</a>
        </div>
    </div>
<? endforeach; ?>

<?
require __DIR__ . '/partials/themeEnd.php';
?>