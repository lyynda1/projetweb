<?php
// Database connection parameters
$host = 'localhost'; // Database host
$dbname = 'shop';    // Database name
$username = 'root';  // Database username
$password = '';      // Database password

try {
    // Create a new PDO instance
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    
    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Optional: For debugging - connection successful message
    echo "
    <div style='
        text-align: center;
        margin: 20px auto;
        padding: 10px;
        width: 50%;
        border: 1px solid #4CAF50;
        border-radius: 10px;
        background-color: #e8f5e9;
        color: #4CAF50;
        font-family: Arial, sans-serif;
        font-size: 18px;'>
        Connected successfully to the database!
    </div>";
} catch (PDOException $e) {
    // Error message if the connection fails
    echo "
    <div style='
        text-align: center;
        margin: 20px auto;
        padding: 10px;
        width: 50%;
        border: 1px solid #f44336;
        border-radius: 10px;
        background-color: #ffebee;
        color: #f44336;
        font-family: Arial, sans-serif;
        font-size: 18px;'>
        Connection failed: " . $e->getMessage() . "
    </div>";
}

// Enable error reporting for development
error_reporting(E_ALL);
ini_set('display_errors', 1);

?>
