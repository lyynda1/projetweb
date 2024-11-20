<?php
require 'connexion.php'; 
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete'])) {
    $product_id = $_POST['product_id'];
    try {
        $sql = "DELETE FROM products WHERE product_id = :product_id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':product_id', $product_id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            $message = "Product with ID $product_id was successfully deleted.";
        } else {
            $message = "Error deleting product.";
        }
    } catch (PDOException $e) {
        $message = "Error: " . $e->getMessage();
    }
}
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
    <title>Manage Products</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Manage Products</h2>
        <?php if (isset($message)): ?>
            <div class="alert alert-info"><?php echo ($message); ?></div>
        <?php endif; ?>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Product ID</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>In Stock</th>
                    <th>Quantity</th>
                    <th>Old Price</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($products)): ?>
                    <?php foreach ($products as $row): ?>
                        <tr>
                            <td><?php echo ($row['product_id']); ?></td>
                            <td><?php echo ($row['product_name']); ?></td>
                            <td><?php echo ($row['product_category']); ?></td>
                            <td><?php echo ($row['product_price']); ?></td>
                            <td><?php echo ($row['product_in_stock']); ?></td>
                            <td><?php echo ($row['product_quantity']); ?></td>
                            <td><?php echo ($row['product_old_price']); ?></td>
                            <td>
                                <form method="POST" action="">
                                    <input type="hidden" name="product_id" value="<?php echo ($row['product_id']); ?>">
                                    <button type="submit" name="delete" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="8" class="text-center">No products found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
