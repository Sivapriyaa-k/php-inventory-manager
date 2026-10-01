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


function sortByPrice($products,$order="asc"){
    usort($products,function ($a,$b) use($order){
        if($order === "asc"){
            return $a["price"] <=>$b["price"];
        }

        return $b["price"] <=> $a["price"];
    });

    return $products;
}

function getAveragePrice($products){
    if(count($products) === 0){
        return 0;
    }
    $sum=0;
    foreach ($products as $product){
        $sum +=$product["price"];
    }

    return $sum / count($count);
}

function getTotalInventoryValue($products){
    $sum=0;
    foreach($products as $product){
        $sum+= ($product["price"] * $product["stock"]);
    }

    return $sum;
}


function getMostExpensiveProduct($products){
    
    $max=0;
    $expensiveProduct = [];
    foreach($products as $product){
        if($max==0 || $max<$product["price"]){
            $max = $product["price"];
            $expensiveProduct = $product;
        }

    }

    return $expensiveProduct;

}

function getCheapestProduct($products){
    $min = "";
    $cheapestProduct = [];
    foreach($products as $product){
        if($min === "" || $min>$product["price"]){
            $min=$product["price"];
            $cheapestProduct = $product;
        }
    }

    return $cheapestProduct;
}

function getProductsAbovePrice($products, $price){
    $allProduct = [];
    foreach($products as $product){
        if($product["price"] > $price){
            $allProduct[]= $product;
        }
    }
    return $allProduct;
}

function getProductsBelowPrice($products, $price){
    $allProduct = [];
    foreach($products as $product){
        if($product["price"] < $price){
            $allProduct[]= $product;
        }
    }
    return $allProduct;
}

function getProductById($products,$id){

    foreach($products as $product){
        if($product["id"] == $id){
            return $product;
        }
    }

    return null;

}