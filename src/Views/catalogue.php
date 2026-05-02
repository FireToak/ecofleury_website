<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>EcoFleury – Catalogue</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">
<div class="container py-4">
    <h1 class="mb-1">🌸 EcoFleury</h1>
    <p class="text-muted mb-4">Fleurs bio &amp; locales</p>

    <?php if (!empty($_GET['msg'])): ?>
        <div class="alert alert-info"><?= htmlspecialchars($_GET['msg']) ?></div>
    <?php endif; ?>

    <div class="row g-3">
        <?php foreach ($produits as $p): ?>
        <div class="col-md-4">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title"><?= htmlspecialchars($p['nom']) ?></h5>
                    <p class="card-text text-muted small"><?= htmlspecialchars($p['description']) ?></p>
                    <p class="fw-bold"><?= number_format($p['prix'], 2) ?> €</p>
                    <p class="small">Stock : <?= (int)$p['stock'] ?></p>
                </div>
                <div class="card-footer">
                    <?php if ($p['stock'] > 0): ?>
                        <a href="/index.php?action=acheter&id=<?= $p['id'] ?>" class="btn btn-success btn-sm w-100">Acheter</a>
                    <?php else: ?>
                        <button class="btn btn-secondary btn-sm w-100" disabled>Rupture</button>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>
</body>
</html>
