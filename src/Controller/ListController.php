<?php

namespace Controller;

use Table\ArticleTable;
use Exception;

/**
 * Ce controller permet d'afficher et de gérer la page "list.php"
 */
class ListController
{
    private ArticleTable $articleTable;

    public function __construct(ArticleTable $articleTable)
    {
        $this->articleTable = $articleTable;
    }

    /**
     * Cette méthode permet d'afficher la page de list
     */
    public function display(): void
    {
        $articles = $this->articleTable->findAll();
        $pagePath = __DIR__ . '/../../pages/list.php';

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
