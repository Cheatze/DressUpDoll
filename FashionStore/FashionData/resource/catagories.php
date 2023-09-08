<?php

    // Check if the name already exists in the table
    $query = "SELECT id FROM categories WHERE name = :name";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':name', $categories);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        // Name already exists, retrieve the associated id
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $id = $row['id'];
        //echo "Name already exists in the table. ID: " . $id;
    } else {
        // Name doesn't exist, add it to the table
        $query = "INSERT INTO categories (name) VALUES (:name)";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':name', $categories);
        $stmt->execute();

        $id = $db->lastInsertId();
        //echo "Name added to the table. New ID: " . $id;
    }

?>