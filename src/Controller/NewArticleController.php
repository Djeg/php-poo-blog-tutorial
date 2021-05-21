<?php

namespace Controller;

use Table\ArticleTable;
use Exception;

/**
 * Ceci est un controller. Il permet de contenir la logique
 * de nos pages. Il intérargie avec le model, contient
 * la logique de la page et affiche une "View" (une page HTML)
 */
class NewArticleController
{
    private ArticleTable $articleTable;

    public function __construct(ArticleTable $articleTable)
    {
        $this->articleTable = $articleTable;
    }

    /**
     * Cette méthode permet d'afficher et de traiter la
     * page "newArticle.php" :)
     */
    public function display(): void
    {
        $success = false;

        if (!empty($_POST)) {
            // ETAPE 2 : Récupérer les données du formulaire
            $title = $_POST['title'];
            $description = $_POST['description'];
            $content = $_POST['content'];

            $this->articleTable->createOne($title, $description, $content);

            $success = true;
        }

        $pagePath = __DIR__ . '/../../pages/newArticle.php';

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
