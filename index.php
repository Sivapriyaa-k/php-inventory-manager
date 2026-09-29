<?php 

require_once "products.php";
require_once "functions.php";

echo "<h2>PHP Inventory Manager</h2>";

echo "Total Products: ". countProducts($products)."<br><br>";

echo "Electronics Inventory Value: ₹ ".getCategoryValue($products,"Electronics")."<br><br>";

echo "<h3>Search Product</h3>";


echo "<form method='GET'>
        <input type='text' name='product_name' placeholder='Enter Product Name'>
        <br><br>
        <button type='submit'>Search</button>
    </form>";
    if(isset($_GET["product_name"]) && $_GET["product_name"] !=''){
        $productName = trim($_GET["product_name"]);
        searchProduct($products,$productName);
    }

echo "<h3>Electronics Products</h3>";

filterByCategory($products,"Electronics");
