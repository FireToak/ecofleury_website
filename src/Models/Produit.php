<?php

class Produit
{
    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function getAll(): array
    {
        return $this->db->query('SELECT * FROM produits')->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById(int $id): array|false
    {
        $stmt = $this->db->prepare('SELECT * FROM produits WHERE id = ?');
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function acheter(int $id): bool
    {
        $produit = $this->getById($id);
        if (!$produit || $produit['stock'] <= 0) {
            return false;
        }
        $stmt = $this->db->prepare('UPDATE produits SET stock = stock - 1 WHERE id = ? AND stock > 0');
        $stmt->execute([$id]);
        return $stmt->rowCount() > 0;
    }
}
