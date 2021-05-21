<?php

namespace Controller;

use Table\ArticleTable;
use Page;

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

        $page = new Page();

        $page->print('list', [
            'articles' => $articles
        ]);
    }
}
