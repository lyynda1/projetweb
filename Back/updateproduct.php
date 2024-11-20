<?php

require 'connexion.php'; 
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])) {
    $product_id=$_POST['product_id'];
    $product_name=$_POST['product_name'];
    $product_category=$_POST['product_category'];
    $product_price=$_POST['product_price'];
    $product_in_stock=$_POST['product_in_stock'];
    $product_quantity=$_POST['product_quantity'];
    $product_old_price=$_POST['product_old_price'];
    try {
        $sql="UPDATE products 
                SET product_name=:product_name, 
                    product_category=:product_category, 
                    product_price=:product_price, 
                    product_in_stock=:product_in_stock, 
                    product_quantity=:product_quantity, 
                    product_old_price=:product_old_price 
                WHERE product_id=:product_id";

        $stmt=$conn->prepare($sql);
        $stmt->bindParam(':product_id',$product_id, PDO::PARAM_STR);
        $stmt->bindParam(':product_name',$product_name, PDO::PARAM_STR);
        $stmt->bindParam(':product_category',$product_category, PDO::PARAM_STR);
        $stmt->bindParam(':product_price',$product_price, PDO::PARAM_STR);
        $stmt->bindParam(':product_in_stock',$product_in_stock, PDO::PARAM_INT);
        $stmt->bindParam(':product_quantity',$product_quantity, PDO::PARAM_INT);
        $stmt->bindParam(':product_old_price',$product_old_price, PDO::PARAM_STR);

        if ($stmt->execute()) {
            $message="product with ID $product_id was updated";
        } else {
            $message="Error product hasn't been updated";
        }
    } catch (PDOException $e) {
        $message="Error: " . $e->getMessage();
    }
}
try {
    $sql="SELECT * FROM products";
    $stmt=$conn->query($sql);
    $products=$stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Error fetching products: " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modify Products</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Modify Products</h2>
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
                            <button 
    class="btn btn-primary btn-sm" 
    data-bs-toggle="modal" 
    data-bs-target="#editModal-<?php echo $row['product_id']; ?>">
    Edit
</button>
                                <div class="modal fade" id="editModal-<?php echo ($row['product_id']); ?>" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form method="POST" action="">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="editModalLabel">Edit Product</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <input type="hidden" name="product_id" value="<?php echo ($row['product_id']); ?>">

                                                    <div class="mb-3">
                                                        <label for="product_name" class="form-label">Name</label>
                                                        <input type="text" name="product_name" class="form-control" value="<?php echo ($row['product_name']); ?>" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="product_category" class="form-label">Category</label>
                                                        <input type="text" name="product_category" class="form-control" value="<?php echo ($row['product_category']); ?>" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="product_price" class="form-label">Price</label>
                                                        <input type="number" step="0.01" name="product_price" class="form-control" value="<?php echo ($row['product_price']); ?>" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="product_in_stock" class="form-label">In Stock</label>
                                                        <input type="number" name="product_in_stock" class="form-control" value="<?php echo ($row['product_in_stock']); ?>" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="product_quantity" class="form-label">Quantity</label>
                                                        <input type="number" name="product_quantity" class="form-control" value="<?php echo ($row['product_quantity']); ?>" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="product_old_price" class="form-label">Old Price</label>
                                                        <input type="number" step="0.01" name="product_old_price" class="form-control" value="<?php echo ($row['product_old_price']); ?>" required>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" name="update" class="btn btn-primary">Save Changes</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
               
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
