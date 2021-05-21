<?php

namespace Controller;

use Table\ArticleTable;

class NotFoundController extends BaseController
{
    /**
     * Cette méthode permet d'afficher la page not found
     */
    public function display(): void
    {
        $this->page->print('notFound');
    }
}
