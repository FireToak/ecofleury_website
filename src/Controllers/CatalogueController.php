<?php

require_once __DIR__ . '/../Models/Produit.php';

class CatalogueController
{
    private Produit $model;

    public function __construct(PDO $db)
    {
        $this->model = new Produit($db);
    }

    public function index(): void
    {
        $produits = $this->model->getAll();
        require __DIR__ . '/../Views/catalogue.php';
    }

    public function acheter(int $id): void
    {
        $succes = $this->model->acheter($id);
        $message = $succes ? 'Commande enregistrée !' : 'Stock insuffisant.';
        header('Location: /index.php?msg=' . urlencode($message));
        exit;
    }
}
