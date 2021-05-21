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

        // Ici on déduit le nom de la class controller à instancier
        $controllerClassName = 'Controller\\' . ucfirst($pageName) . 'Controller';

        if (file_exists(__DIR__ . '/' . str_replace('\\', '/', $controllerClassName) . '.php')) {
            // Maintenant que l'on a la class, nous pouvons l'instancier
            $controller = new $controllerClassName($articleTable);

            // Nous affichons la page du controller
            $controller->display();
        } else {
            $controller = new Controller\NotFoundController($articleTable);

            $controller->display();
        }
    }
}
