<?php
require __DIR__ . '/partials/themeStart.php';

// On se connécte à la base de données
$pdo = new PDO('mysql:dbname=php-poo-blog;host=mysql', 'root', 'root');

// On créé une requète SQL qui nous permet de récupérer un seul
// depuis la base de données
$sql = 'SELECT * FROM articles WHERE id = ?';

// On prépare notre requète SQL
$request = $pdo->prepare($sql);

// On éxecute la requète
$request->execute([$_GET['id']]);

// On récupére un seul article !
$article = $request->fetch(PDO::FETCH_ASSOC);

?>

<h1><?= $article['title'] ?></h1>

<p>
    <?= $article['content'] ?>
</p>

<?
require __DIR__ . '/partials/themeEnd.php';
?>