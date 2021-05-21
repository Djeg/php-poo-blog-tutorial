<?php

namespace Controller;

use Table\ArticleTable;
use Exception;

/**
 * Ceci est un controller. Il permet de contenir la logique
 * de nos pages. Il intérargie avec le model, contient
 * la logique de la page et affiche une "View" (une page HTML)
 */
class NewArticleController extends BaseController
{
    /**
     * Cette méthode permet d'afficher et de traiter la
     * page "newArticle.php" :)
     */
    public function display(): void
    {
        $success = false;

        if (!empty($_POST)) {
            $title = $_POST['title'];
            $description = $_POST['description'];
            $content = $_POST['content'];

            $this->articleTable->createOne($title, $description, $content);

            $success = true;
        }

        $this->page->print('newArticle', ['success' => $success]);
    }
}
