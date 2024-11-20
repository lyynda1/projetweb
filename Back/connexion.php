<?php
$host='localhost'; 
$dbname='shop';    
$username='root';  
$password='';      
try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "
    <div style='display: flex; justify-content: center; align-items: center; height: 30vh; font-family: Arial, sans-serif;'>
        <div style='text-align: center; background: #ffffff; padding: 10px; border: 2px solid #4CAF50; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);'>
            <h1 style='color: #4CAF50; font-size: 24px;'>✅ Connected Successfully</h1>
            <p style='font-size: 16px; color: #333;'>
                You are connected to  
                <a href='http://localhost/phpmyadmin/index.php?db=$dbname' 
                   style='text-decoration: none; color: #3FCG40; font-weight: bold;' target='_blank'> 
                   '$dbname'
                </a>.
            </p>
        </div>
    </div>";
}
catch(PDOException $e) {
    echo "
    <div style='display: flex; justify-content: center; align-items: center; height: 100vh; background-color: #f3f4f6; font-family: Arial, sans-serif;'>
        <div style='text-align: center; background: #ffffff; padding: 20px; border: 2px solid #f44336; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);'>
            <h1 style='color: #f44336;'>❌ Connection failed</h1>
            <p style='font-size: 18px; color: #333;'>Error: " . $e->getMessage() . "</p>
        </div>
    </div>";
}



?> 