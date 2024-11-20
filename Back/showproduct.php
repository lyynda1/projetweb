<?php

require 'connexion.php'; // Include database connection file

// Fetch all products for printing
try {
    $sql = "SELECT * FROM products";
    $stmt = $conn->query($sql);
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Error fetching products: " . $e->getMessage());
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Products</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .table-container {
            background-color: #ffffff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            padding: 20px;
        }

        .table th, .table td {
            vertical-align: middle;
        }

        .table th {
            background-color: #00000;
            color: #ffffff;
            text-align: center;
        }

        .table tbody tr:hover {
            background-color: #f1f3f5;
        }

        .no-print {
            margin-top: 20px;
        }

        @media print {
            .no-print {
                display: none;
            }
            .table-container {
                box-shadow: none;
                border: none;
            }
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="text-center mb-4">
            <h2>Products List</h2>
            <p class="text-muted">Review and print the list of all available products.</p>
        </div>

        <div class="table-container">
            <table class="table table-hover table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>Product ID</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Price ($)</th>
                        <th>In Stock</th>
                        <th>Quantity</th>
                        <th>Old Price ($)</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($products)): ?>
                        <?php foreach ($products as $row): ?>
                            <tr>
                                <td class="text-center"><?php echo htmlspecialchars($row['product_id']); ?></td>
                                <td><?php echo htmlspecialchars($row['product_name']); ?></td>
                                <td><?php echo htmlspecialchars($row['product_category']); ?></td>
                                <td class="text-end"><?php echo number_format($row['product_price'], 2); ?></td>
                                <td class="text-center"><?php echo htmlspecialchars($row['product_in_stock']); ?></td>
                                <td class="text-center"><?php echo htmlspecialchars($row['product_quantity']); ?></td>
                                <td class="text-end text-muted"><?php echo number_format($row['product_old_price'], 2); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="7" class="text-center">No products found.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <!-- Print Button -->
        <div class="text-center no-print">
            <button class="btn btn-primary btn-lg" onclick="window.print()">Print</button>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
