<?php
require __DIR__ . '/partials/themeStart.php';

if (!empty($_POST)) {
    // ETAPE 1 : Se connécter à la base de données
    $pdo = new PDO('mysql:dbname=php-poo-blog;host=localhost', 'root');
    var_dump('Nous sommes connécté à la base de données');

    // ETAPE 2 : Envoyer une requête de création d'article
    $title = $_POST['title'];
    $description = $_POST['description'];
    $content = $_POST['content'];

    var_dump($title, $description, $content);
}

?>

<h1>Page de création d'un article</h1>

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