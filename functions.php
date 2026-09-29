<?php

function getStockStatus($stock)
{
    if ($stock === 0) {
        return "Out Of Stock";
    } elseif ($stock >= 1 && $stock <= 10) {
        return "Low Stock";
    } else {
        return "In Stock";
    }
}


function searchProduct($products, $searchName)
{
    $found = false;
    foreach ($products as $product) {
        $name = strtolower($product["name"]);
        $searchName = strtolower($searchName);
        if (strpos($name,$searchName) !== false) {

            echo "Name: " . $product["name"] . "<br>";
            echo "Price: ₹ " . $product["price"] . "<br>";
            echo "Stock: " . $product["stock"] . "<br>";
            echo "Status: " . getStockStatus($product["stock"]) . "<br>";

            $found = true;
            return ;
        }
    }

    if (!$found) {
        echo "Product not found.<br>";
    }
}


function filterByCategory($products, $category)
{
    foreach ($products as $product) {

        if ($product["category"] === $category) {
            echo $product["name"] . " - ₹ " . $product["price"] . "<br>";
        }
    }
}


function countProducts($products)
{
    $count = 0;

    foreach ($products as $product) {
        $count++;
    }

    return $count;
}


function getCategoryValue($products, $category)
{
    $inventoryValue = 0;

    foreach ($products as $product) {

        if ($product["category"] === $category) {
            $inventoryValue += $product["stock"] * $product["price"];
        }
    }

    return $inventoryValue;
}


function validateProduct($products)
{
    $valid =true;
    foreach($products as $product){
        if (
                empty($product["name"]) ||
                $product["price"] <= 0 ||
                $product["stock"] < 0 ||
                empty($product["category"])
            ) {
                echo $product["name"] ." is invalid <br>";
                $valid= false;
            }

    }
    
    return $valid;
}
