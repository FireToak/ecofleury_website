<?php

require_once __DIR__ . '/../src/Controllers/CatalogueController.php';

$dsn = 'sqlite:' . __DIR__ . '/../database/ecofleury.sqlite';
$db  = new PDO($dsn);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Initialisation des tables si vides
$db->exec("CREATE TABLE IF NOT EXISTS produits (
    id          INTEGER PRIMARY KEY AUTOINCREMENT,
    nom         TEXT    NOT NULL,
    description TEXT,
    prix        REAL    NOT NULL,
    stock       INTEGER NOT NULL DEFAULT 0
)");
$db->exec("CREATE TABLE IF NOT EXISTS commandes (
    id         INTEGER PRIMARY KEY AUTOINCREMENT,
    produit_id INTEGER NOT NULL,
    cree_le    TEXT    DEFAULT (datetime('now'))
)");

// Seed si vide
if ((int)$db->query('SELECT COUNT(*) FROM produits')->fetchColumn() === 0) {
    $db->exec("INSERT INTO produits (nom, description, prix, stock) VALUES
        ('Bouquet Printemps', 'Tulipes et jonquilles bio', 18.50, 10),
        ('Rose Rouge Bio',    'Rose cultivée sans pesticide', 4.90,  5),
        ('Couronne Sauvage',  'Fleurs des champs locales',   24.00,  0)");
}

$ctrl   = new CatalogueController($db);
$action = $_GET['action'] ?? 'index';

match ($action) {
    'acheter' => $ctrl->acheter((int)($_GET['id'] ?? 0)),
    default   => $ctrl->index(),
};
