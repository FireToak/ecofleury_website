<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../../src/Models/Produit.php';

class StockTest extends TestCase
{
    private PDO $db;

    protected function setUp(): void
    {
        $this->db = new PDO('sqlite::memory:');
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->db->exec("CREATE TABLE produits (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            nom TEXT, description TEXT, prix REAL, stock INTEGER
        )");
    }

    public function testAchatEchoueStockZero(): void
    {
        $this->db->exec("INSERT INTO produits (nom, prix, stock) VALUES ('Rose', 5.00, 0)");
        $model = new Produit($this->db);
        $this->assertFalse($model->acheter(1));
    }

    public function testAchatReussitStockPositif(): void
    {
        $this->db->exec("INSERT INTO produits (nom, prix, stock) VALUES ('Tulipe', 3.00, 2)");
        $model = new Produit($this->db);
        $this->assertTrue($model->acheter(1));
        $stock = (int)$this->db->query('SELECT stock FROM produits WHERE id = 1')->fetchColumn();
        $this->assertSame(1, $stock);
    }
}
