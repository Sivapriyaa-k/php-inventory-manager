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

echo "<h3>Expensive Product</h3>";

$expensive = getMostExpensiveProduct($products);

echo $expensive["name"] . "<br><br>";
echo $expensive["price"];
echo "<h3>Cheapest Product</h3>";

$cheapProduct = getCheapestProduct($products);

echo $cheapProduct["name"] . "<br><br>";
echo $cheapProduct["price"];

echo "<h3>Add Product</h3><br>
    <form method='POST'>
        <input type='text' placeholder='Enter Product Name' id='productName'><br>
        <input type='number' placeholder='Enter Product Price' id='productPrice'><br><br>
        <input type='number' placeholder='Enter Stock Quantity' id='productStock'><br><br>
        <select id='category'>
            <option value='Stationery'>Stationery</option>
            <option value='Electronics'>Electronics</option>
        </select><br><br>
        <button type='submit'>Add Product</button>
    </form>";
