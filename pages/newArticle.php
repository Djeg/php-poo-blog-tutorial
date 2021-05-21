<?php
require __DIR__ . '/partials/themeStart.php';
?>

<h1>Page de création d'un article</h1>

<? if ($success) : ?>
    <div class="alert alert-success" role="alert">
        L'article a bien été créé
    </div>
<? endif; ?>

<form method="POST" action="./index.php?page=newArticle">
    <div class="mb-3">
        <label for="title" class="form-label">Titre de l'article</label>
        <input type="text" class="form-control" id="title" name="title">
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Description de l'article</label>
        <textarea class="form-control" id="description" name="description"></textarea>
    </div>
    <div class="mb-3">
        <label for="content" class="form-label">Contenue de l'article</label>
        <textarea class="form-control" id="content" name="content"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Créer</button>
</form>

<?
require __DIR__ . '/partials/themeEnd.php';
?>