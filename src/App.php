<?php

use Table\ArticleTable;

/**
 * La class App est le point d'entré de notre application. C'est
 * l'objet principal !
 */
class App
{
    /**
     * Cette méthode demarre notre application. C'est ici
     * que l'on trouve le code initiale.
     */
    static public function start(): void
    {
        // Nous créons une connexion à la base de données en utilisant
        // la class PDO
        $pdo = new PDO('mysql:dbname=php-poo-blog;host=mysql', 'root', 'root');
        // Nous créons une instance de ArticleTable : $articleTable. Cette objet
        // nous permet de récupérer / créer des articles.
        $articleTable = new ArticleTable($pdo);

        // $_GET permet d'accèder au query string
        // ex: $_GET['page'] retourne la query string "page"
        // la fonction isset(...) permet de tester si un
        // élement est présent dans un tableaux.

        // ETAPE 1 : Nous récupérons le nom de la page demandée
        $pageName = 'list';

        // Ici on test si on a envoyé la query "page"
        if (isset($_GET['page'])) {
            // Si la query page existe dans ce cas nous l'assignons
            // à notre variable page
            $pageName = $_GET['page'];
        }

        // file_exists('/chemin/vers/le/fichier.php') retourne true
        // si le fichier existe, false sinon.

        // ETAPE 2 : Nous affichons la page demandée

        $pagePath = __DIR__ . '/../pages/' . $pageName . '.php';

        // ob_start démarre l'enregistrement de tout les "echo"
        // qui peuvent subvenir !
        ob_start();

        if (file_exists($pagePath)) {
            try {
                require $pagePath;
            } catch (Exception $exception) {
                // ob_clean, permet de vider tous ce qui a été
                // echo
                ob_clean();
                require __DIR__ . '/../pages/notFound.php';
            }
        } else {
            require __DIR__ . '/../pages/notFound.php';
        }

        // ob_get_clean permet de récupérer tout ce qui a été echo
        // dans une variable
        echo ob_get_clean();
    }
}
