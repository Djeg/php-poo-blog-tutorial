<?php

namespace Controller;

use Table\ArticleTable;

class NotFoundController
{
    private ArticleTable $articleTable;

    public function __construct(ArticleTable $articleTable)
    {
        $this->articleTable = $articleTable;
    }

    /**
     * Cette méthode permet d'afficher la page not found
     */
    public function display(): void
    {
        ob_start();

        require __DIR__ . '/../../pages/notFound.php';

        // ob_get_clean permet de récupérer tout ce qui a été echo
        // dans une variable
        echo ob_get_clean();
    }
}
