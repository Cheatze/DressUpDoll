<?php

$data = array();

if ($result->rowCount() > 0) {
    //
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $item = array(
            'categorie' => $row['categorie'],
            'naam' => $row['naam'],
            'plaatje' => $row['plaatje'],
            'AltText' => $row['AltText']
        );
        //
        $data[] = $item;
    }
}

$json = json_encode($data);

////////
$data = array();
$categories = array();

if ($result->rowCount() > 0) {
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $item = array(
            'naam' => $row['naam'],
            'plaatje' => $row['plaatje'],
            'AltText' => $row['AltText']
        );
        
        $categorie = $row['categorie'];
        
        // Check if the category already exists in the $categories array
        if (isset($categories[$categorie])) {
            $categories[$categorie]['objects'][] = $item;
        } else {
            $categories[$categorie] = array(
                'categorie' => $categorie,
                'objects' => array($item)
            );
        }
    }
}
//wat als ik 'categories' vervang met 0?
$jsonData = array('categories' => array_values($categories));
$json = json_encode($jsonData);

///dit ging helemaal verkeerd
$data = array();
$categories = array();

if ($result->rowCount() > 0) {
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $item = array(
            'naam' => $row['naam'],
            'plaatje' => $row['plaatje'],
            'AltText' => $row['AltText']
        );

        $categorie = $row['categorie'];

        // Check if the category already exists in the $categories array
        if (isset($categories[$categorie])) {
            $categories[$categorie]['objects'][] = $item;
        } else {
            $categories[] = array(
                'categorie' => $categorie,
                'objects' => array($item)
            );
        }
    }
}

$jsonData = array('categories' => $categories);
$json = json_encode($jsonData);

///

$sql = "SELECT categorie, naam, plaatje, AltText FROM kleding";
$result = $db->query($sql);

//=[]? spull uit maar een tabel halen
$data = array();

if ($result->rowCount() > 0) {
    $categories = array();

    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $item = array(
            'naam' => $row['naam'],
            'plaatje' => $row['plaatje'],
            'AltText' => $row['AltText']
        );

        $categorie = $row['categorie'];

        // Check if the category already exists in the $categories array
        $categoryIndex = array_search($categorie, array_column($categories, 'categorie'));
        if ($categoryIndex !== false) {
            $categories[$categoryIndex]['objects'][] = $item;
        } else {
            $categories[] = array(
                'categorie' => $categorie,
                'objects' => array($item)
            );
        }
    }

    $data[] = array('categories' => $categories);
}

$query = "SELECT products_id, images_id FROM product_images";
$stmt = $db->prepare($query);
$stmt->execute();
$productImages = $stmt->fetchAll(PDO::FETCH_ASSOC);

$previousProductsId = null;
//for building the json
$data = array();
$categories = array();

foreach ($productImages as $productImage) {

    $productsId = $productImage['products_id'];
    $imagesId = $productImage['images_id'];

    //misschien een if statement die alleen word uitgevoerd als de productsId niet hetzelfde is gebleven
    // Check if $productsId is the same as the previous iteration
    if ($productsId != $previousProductsId) {

        // Retrieve name and categories_id from products table
        $query = "SELECT name, categories_id FROM products WHERE id = :productsId";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':productsId', $productsId);
        $stmt->execute();
        $product = $stmt->fetch(PDO::FETCH_ASSOC);

        $name = $product['name']; //doorgeef variabel naar 'naam'
        $categoriesId = $product['categories_id'];


        // Retrieve name from categories table
        $query = "SELECT name FROM categories WHERE id = :categoriesId";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':categoriesId', $categoriesId);
        $stmt->execute();
        $category = $stmt->fetch(PDO::FETCH_ASSOC);
        $categoryName = $category['name']; //doorgeef variabel naar $categorie

        //de juiste
        $item = array(
            'naam' => $row['naam'],
            'plaatje' => $row['plaatje'],
            'AltText' => $row['AltText']
        );
    }


    // Retrieve alt, path, and viewpoint from images table
    $query = "SELECT alt, path, viewpoint FROM images WHERE id = :imagesId";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':imagesId', $imagesId);
    $stmt->execute();
    $image = $stmt->fetch(PDO::FETCH_ASSOC);

    $alt = $image['alt']; //doorgeef variabel
    $path = $image['path']; //doorgeef variabel
    $viewpoint = $image['viewpoint']; //doorgeef variabel


    $previousProductsId = $productsId;
}
