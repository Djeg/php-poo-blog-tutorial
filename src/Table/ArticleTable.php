<?php

namespace Table;

use PDO;

/**
 * Cette class permet de récupérer ainsi que de créer des articles
 */
class ArticleTable
{
    /**
     * On définie un attribut (une variable dans une class)
     * privée pour stocker un objet PDO.
     */
    private PDO $pdo;

    /**
     * On définie un constructeur qui recoie un objet PDO
     */
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * Cette méthode permet de récupérer l'intégralité des articles
     * de la base de données
     */
    public function findAll(): array
    {
        return [];
    }

    /**
     * Cette méthode permet de récupérer qu'un seul article !
     */
    public function findOne(int $id): array
    {
        return [];
    }

    /**
     * Cette méthode permet de créer un nouvel article
     */
    public function createOne(
        string $title,
        string $description,
        string $content,
    ): void {
    }
}
