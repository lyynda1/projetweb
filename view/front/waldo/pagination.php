

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop</title>
</head>
<body>
    <h1>Shop Products</h1>

    <!-- Product List -->
    <div class="products">
        <?php foreach ($products as $product): ?>
            <div class="product-item">
                <h3><?= htmlspecialchars($product['nomProduit']) ?></h3>
                <p>Price: <?= htmlspecialchars($product['prix']) ?> USD</p>
            </div>
        <?php endforeach; ?>
    </div>

    <!-- Pagination -->
    