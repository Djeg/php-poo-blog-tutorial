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

    private Page $page;

    public function __construct(ArticleTable $articleTable, Page $page)
    {
        $this->articleTable = $articleTable;
        $this->page = $page;
    }

    /**
     * Cette méthode permet d'afficher la page de list
     * 
     * On collabore plutot que des les créer
     */
    public function display(): void
    {
        $articles = $this->articleTable->findAll();

        $this->page->print('list', [
            'articles' => $articles
        ]);
    }
}
