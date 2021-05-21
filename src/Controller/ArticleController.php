<?php

namespace Controller;

use Exception;
use Table\ArticleTable;

/**
 * Ce controller permet de gérer / afficher la page
 * article.php
 */
class ArticleController
{
    private ArticleTable $articleTable;

    public function __construct(ArticleTable $articleTable)
    {
        $this->articleTable = $articleTable;
    }

    /**
     * Cette méthode permet d'afficher la page article
     */
    public function display(): void
    {
        $article = $this->articleTable->findOne($_GET['id']);
        $pagePath = __DIR__ . '/../../pages/article.php';

        // ob_start démarre l'enregistrement de tout les "echo"
        // qui peuvent subvenir !
        ob_start();

        try {
            require $pagePath;
        } catch (Exception $exception) {
            // ob_clean, permet de vider tous ce qui a été
            // echo
            ob_clean();
            require __DIR__ . '/../pages/notFound.php';
        }

        // ob_get_clean permet de récupérer tout ce qui a été echo
        // dans une variable
        echo ob_get_clean();
    }
}
