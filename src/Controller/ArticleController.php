<?php

namespace Controller;

use Exception;
use Table\ArticleTable;

/**
 * Ce controller permet de gérer / afficher la page
 * article.php
 */
class ArticleController extends BaseController
{
    /**
     * Cette méthode permet d'afficher la page article
     */
    public function display(): void
    {
        $article = $this->articleTable->findOne($_GET['id']);

        $this->page->print('article', ['article' => $article]);
    }
}
