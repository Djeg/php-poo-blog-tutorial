<?php

namespace Controller;

use Table\ArticleTable;
use Page;

/**
 * Ce controller est le controller de base,
 * il contient les paramètre de construction de tout
 * les controller
 */
class BaseController
{
    protected ArticleTable $articleTable;

    protected Page $page;

    public function __construct(ArticleTable $articleTable, Page $page)
    {
        $this->articleTable = $articleTable;
        $this->page = $page;
    }
}
