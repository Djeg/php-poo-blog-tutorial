<?php

/**
 * Cette class représente une page que nous pouvons
 * imprimer.
 */
class Page
{
    /**
     * Cette méthode permet d'imprimer une page
     */
    public function print(string $pageName, array $parameters = []): void
    {
        // Extracte permet de créer toutes les variables présente
        // dans un tableau. Ex: $arr = [ 'title' => 'test', 'name' => 'john' ]
        // si je fais extract($arr) alors PHP créé les variables:
        // $title et $name
        extract($parameters);

        $pagePath = __DIR__ . '/../pages/' . $pageName . '.php';

        // ob_start démarre l'enregistrement de tout les "echo"
        // qui peuvent subvenir !
        ob_start();

        try {
            require $pagePath;
        } catch (Exception $exception) {
            // ob_clean, permet de vider tous ce qui a été
            // echo
            ob_clean();
            require __DIR__ . '/../../pages/notFound.php';
        }

        // ob_get_clean permet de récupérer tout ce qui a été echo
        // dans une variable
        echo ob_get_clean();
    }
}
