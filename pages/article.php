<?php
require __DIR__ . '/partials/themeStart.php';

$article = $articleTable->findOne($_GET['id']);

?>

<h1><?= $article['title'] ?></h1>

<p>
    <?= $article['content'] ?>
</p>

<?
require __DIR__ . '/partials/themeEnd.php';
?>