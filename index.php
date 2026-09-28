<?php 

require_once "products.php";
require_once "functions.php";

echo "<h2>PHP Inventory Manager</h2>";

echo "Total Products: ". countProducts($products)."<br><br>";

echo "Electronics Inventory Value: ₹ ".getCategoryValue($products,"Eelctornics")."<br><br>";

echo "<h3>Search Product</h3>";

searchProduct($products,"Laptop");

echo "<h3>Electronics Products</h3>";

filterByCategory($products,"Electronics");
