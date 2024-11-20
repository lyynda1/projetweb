<?php
require 'connexion.php';  

if (
    isset(
        $_POST['productid'], 
        $_POST['productname'], 
        $_POST['productcategory'], 
        $_POST['productprice'], 
        $_POST['stock'], 
        $_POST['productquantity'], 
        $_POST['productoldprice']
    ) 
    && trim($_POST['productid']) !== '' 
    && trim($_POST['productname']) !== '' 
    && trim($_POST['productcategory']) !== '' 
    && trim($_POST['productprice']) !== '' 
    && trim($_POST['stock']) !== '' 
    && trim($_POST['productquantity']) !== ''
) {

    $productId = trim($_POST['productid']);
    $productName = trim($_POST['productname']);
    $productCategory = trim($_POST['productcategory']);
    $productPrice = trim($_POST['productprice']);
    $stock = trim($_POST['stock']);
    $productQuantity = trim($_POST['productquantity']);
    $productOldPrice = isset($_POST['productoldprice']) && trim($_POST['productoldprice']) !== '' 
        ? trim($_POST['productoldprice']) 
        : null;

    try {
       
        $sql = "INSERT INTO products (product_id, product_name, product_category, product_price, product_in_stock, product_quantity, product_old_price)
                VALUES (:product_id, :product_name, :product_category, :product_price, :stock, :product_quantity, :product_old_price)";
        $stmt = $conn->prepare($sql);

        
        $stmt->bindParam(':product_id', $productId);
        $stmt->bindParam(':product_name', $productName);
        $stmt->bindParam(':product_category', $productCategory);
        $stmt->bindParam(':product_price', $productPrice);
        $stmt->bindParam(':stock', $stock);
        $stmt->bindParam(':product_quantity', $productQuantity);
        $stmt->bindParam(':product_old_price', $productOldPrice);

   
        if ($stmt->execute()) {
            
            echo "
            <div style='display: flex; justify-content: center; align-items: center; height: 40vh;  font-family: Arial, sans-serif;'>
                <div style='text-align: center; background: #ffffff; padding: 20px; border: 2px solid #4CAF50; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);'>
                    <p style='font-size: 18px; color: #333;'>Your product has been successfully added to the database.</p>
                    <h3 style='color: #333;'>Product Details:</h3>
                    <table style='width: 100%; border-collapse: collapse; margin: 20px 0;'>
                        <tr style='background-color: #f2f2f2;'>
                            <th style='padding: 8px; text-align: left; border: 1px solid #ddd;'>Product ID</th>
                            <th style='padding: 8px; text-align: left; border: 1px solid #ddd;'>Product Name</th>
                            <th style='padding: 8px; text-align: left; border: 1px solid #ddd;'>Product Category</th>
                            <th style='padding: 8px; text-align: left; border: 1px solid #ddd;'>Product Price</th>
                            <th style='padding: 8px; text-align: left; border: 1px solid #ddd;'>Stock</th>
                            <th style='padding: 8px; text-align: left; border: 1px solid #ddd;'>Quantity</th>
                            <th style='padding: 8px; text-align: left; border: 1px solid #ddd;'>Old Price</th>
                        </tr>
                        <tr>
                            <td style='padding: 8px; border: 1px solid #ddd;'>" . ($productId) . "</td>
                            <td style='padding: 8px; border: 1px solid #ddd;'>" . ($productName) . "</td>
                            <td style='padding: 8px; border: 1px solid #ddd;'>" . ($productCategory) . "</td>
                            <td style='padding: 8px; border: 1px solid #ddd;'>" . ($productPrice) . "</td>
                            <td style='padding: 8px; border: 1px solid #ddd;'>" . ($stock) . "</td>
                            <td style='padding: 8px; border: 1px solid #ddd;'>" . ($productQuantity) . "</td>
                            <td style='padding: 8px; border: 1px solid #ddd;'>" . ($productOldPrice) . "</td>
                        </tr>
                    </table>
                </div>
            </div>";
        } else {
            $errorInfo = $stmt->errorInfo();
            echo "Error adding product: " . $errorInfo[2];
        }
    } catch (PDOException $e) {
        echo "Database error: " . $e->getMessage();
    }
}


?>