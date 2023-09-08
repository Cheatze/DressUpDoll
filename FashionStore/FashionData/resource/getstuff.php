<?php

//works, this script does get used
//echo "<script>alert('getstuff gets used.');</script>";


// Retrieve id and name values from the categories table
$categoryQuery = $db->query("SELECT id, name FROM categories");
$categories = $categoryQuery->fetchAll(PDO::FETCH_ASSOC);

//Begin json
$data = array();
$categoryData = array();

foreach ($categories as $category) {
    $categoryId = $category['id'];
    $categoryName = $category['name'];

    // Create an array to store the category data
    $categoryDataItem = array(
        "categorie" => $categoryName,
        "objects" => array()
    );

    // Retrieve id and name values from the products table where categories_id matches
    $productQuery = $db->prepare("SELECT id, name FROM products WHERE categories_id = :categoryId");
    $productQuery->bindParam(':categoryId', $categoryId);
    $productQuery->execute();
    $products = $productQuery->fetchAll(PDO::FETCH_ASSOC);

    foreach ($products as $product) {
        $productId = $product['id'];
        $productName = $product['name'];

        // Create an array to store the product data
        $productData = array(
            "naam" => $productName,
            "plaatje" => "",
            "view" => "",
            "AltText" => ""
        );

        // Retrieve images_id values from the product_images table where products_id matches
        $productImageQuery = $db->prepare("SELECT images_id FROM product_images WHERE products_id = :productId");
        $productImageQuery->bindParam(':productId', $productId);
        $productImageQuery->execute();
        $imageIds = $productImageQuery->fetchAll(PDO::FETCH_COLUMN);

        foreach ($imageIds as $imageId) {
            // Retrieve path, alt, and viewpoint values from the images table where id matches
            $imageQuery = $db->prepare("SELECT path, alt, viewpoint FROM images WHERE id = :imageId");
            $imageQuery->bindParam(':imageId', $imageId);
            $imageQuery->execute();
            $image = $imageQuery->fetch(PDO::FETCH_ASSOC);

            $imagePath = $image['path'];
            $imageAlt = $image['alt'];
            $imageViewpoint = $image['viewpoint'];

            // Add the image data to the product data
            $productData['plaatje'] = $imagePath;
            $productData['AltText'] = $imageAlt;
            $productData['view'] = $imageViewpoint;

            $categoryDataItem['objects'][] = $productData;
        }
    }

    $categoryData[] = $categoryDataItem;
}

//$data["categories"] = $categoryData;
$data[] = array("categories" => $categoryData);

$json = json_encode($data, JSON_PRETTY_PRINT);

?>