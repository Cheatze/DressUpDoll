<?php
include_once 'resource/Database.php';


    //redirect links back to insert and index
    echo "<br><a href='insert.php'>Back to insert</a><br>";
    echo "<br><a href='index.php'>Back to Index</a>";


    //colect form text data and store in variables
    $categories = $_POST['categories'];
    $name = $_POST['name'];
    $altText = $_POST['altText'];
    //$aanzicht = $_POST['aanzicht'];

    //file variables front
    $frontfile_name = $_FILES['fileToUploadFront']['name'];
    $frontfile_size = $_FILES['fileToUploadFront']['size'];
    $frontfile_tmp = $_FILES['fileToUploadFront']['tmp_name'];
    $frontfile_type = $_FILES['fileToUploadFront']['type'];
    $frontvieuwpoint = "front";

    //file variables Back ect plus if not empty?
    //Toevoegen als eerste plaatje lukt
    $backfile_name = $_FILES['fileToUploadBack']['name'];
    $backfile_size = $_FILES['fileToUploadBack']['size'];
    $backfile_tmp = $_FILES['fileToUploadBack']['tmp_name'];
    $backfile_type = $_FILES['fileToUploadBack']['type'];
    $backvieuwpoint = "back";

    //file variables left-side
    $leftfile_name = $_FILES['fileToUploadLeft']['name'];
    $leftfile_size = $_FILES['fileToUploadLeft']['size'];
    $leftfile_tmp = $_FILES['fileToUploadLeft']['tmp_name'];
    $leftfile_type = $_FILES['fileToUploadLeft']['type'];
    $leftvieuwpoint = "left";

    //file variables left-side
    $rightfile_name = $_FILES['fileToUploadRight']['name'];
    $rightfile_size = $_FILES['fileToUploadRight']['size'];
    $rightfile_tmp = $_FILES['fileToUploadRight']['tmp_name'];
    $rightfile_type = $_FILES['fileToUploadRight']['type'];
    $rightvieuwpoint = "right";

    //designate folder
    $uploaddir = "uploads/";
    $uploadfilefront = $uploaddir . basename($_FILES['fileToUploadFront']['name']);
    $uploadfileback = $uploaddir . basename($_FILES['fileToUploadBack']['name']);
    $uploadfileleft = $uploaddir . basename($_FILES['fileToUploadLeft']['name']); //new
    $uploadfileright = $uploaddir . basename($_FILES['fileToUploadRight']['name']); //new

    //sql categoreies? als de catagorie nog niet bestaat dan toevoegen
    //Voegd nieuwe catagorie toe waar nodig en geeft id door naar variabel $id
    include_once 'resource/catagories.php';

    //create sql insert statement OLD
    /*$sqlInsert = "INSERT INTO kleding (categorie, naam, plaatje, AltText)
        VALUES (:categorie, :naam, :plaatje, :alttext)";*/

    //sql insert products 
    $sqlInsertProducts = "INSERT INTO products (name, categories_id)
        VALUES (:name, :categories_id)";
    $statement = $db->prepare($sqlInsertProducts);
    $statement->execute(array(':name' => $name, ':categories_id' => $id));
    //de id van deze entry terug krijgen en in een variabel stoppen voor product_images
    $productid = $db->lastInsertId();

    //sql insert images herhaal voor elk plaatje en geef viewpoint door
    $sqlInsertImages = "INSERT INTO images (path, alt, viewpoint)
        VALUES (:path, :alt, :viewpoint)";
    $statement = $db->prepare($sqlInsertImages);//
    $statement->execute(array(':path' => $frontfile_name, ':alt' => $altText, 'viewpoint' => $frontvieuwpoint));
    $imagesid = $db->lastInsertId();

    //sql insert product_images voor front plaatje
    $sqlInsertProductImages = "INSERT INTO product_images (products_id, images_id)
        VALUES (:products_id, :images_id)";
    $statement = $db->prepare($sqlInsertProductImages);
    $statement->execute(array(':products_id' => $productid, ':images_id' => $imagesid));

    //sql insert images voor achterkant plaatje
    $sqlInsertImages = "INSERT INTO images (path, alt, viewpoint)
    VALUES (:path, :alt, :viewpoint)";
    $statement = $db->prepare($sqlInsertImages);//
    $statement->execute(array(':path' => $backfile_name, ':alt' => $altText, 'viewpoint' => $backvieuwpoint));
    $imagesid = $db->lastInsertId();

    //sql insert product_images voor back plaatje
    $sqlInsertProductImages = "INSERT INTO product_images (products_id, images_id)
    VALUES (:products_id, :images_id)";
    $statement = $db->prepare($sqlInsertProductImages);
    $statement->execute(array(':products_id' => $productid, ':images_id' => $imagesid));

    //sql insert image voor left-side plaatje
    $sqlInsertImages = "INSERT INTO images (path, alt, viewpoint)
    VALUES (:path, :alt, :viewpoint)";
    $statement = $db->prepare($sqlInsertImages);//
    $statement->execute(array(':path' => $leftfile_name, ':alt' => $altText, 'viewpoint' => $leftvieuwpoint));
    $imagesid = $db->lastInsertId();

    //sql insert product_images voor left-side plaatje
    $sqlInsertProductImages = "INSERT INTO product_images (products_id, images_id)
    VALUES (:products_id, :images_id)";
    $statement = $db->prepare($sqlInsertProductImages);
    $statement->execute(array(':products_id' => $productid, ':images_id' => $imagesid));

    //sql insert image voor right-side plaatje
    $sqlInsertImages = "INSERT INTO images (path, alt, viewpoint)
    VALUES (:path, :alt, :viewpoint)";
    $statement = $db->prepare($sqlInsertImages);//
    $statement->execute(array(':path' => $rightfile_name, ':alt' => $altText, 'viewpoint' => $rightvieuwpoint));
    $imagesid = $db->lastInsertId();

    //sql insert product_images voor right-side plaatje
    $sqlInsertProductImages = "INSERT INTO product_images (products_id, images_id)
    VALUES (:products_id, :images_id)";
    $statement = $db->prepare($sqlInsertProductImages);
    $statement->execute(array(':products_id' => $productid, ':images_id' => $imagesid));


    //use PDO prepare to sanitize data OLD
    /*$statement = $db->prepare($sqlInsert);

    $statement->execute(array(':categorie' => $categories, ':naam' => $name, 
    ':plaatje' => $file_name, 'alttext' => $altText, ':aanzicht' => $aanzicht));*/


    //fileToUploadFront
    if (move_uploaded_file($_FILES['fileToUploadFront']['tmp_name'], $uploadfilefront)) {
        echo "<br>File is valid, and was successfully uploaded.<br>";
    } else {
        echo "<br>NOT UPLOADED!";
    }

    //fileToUploadBack
    if (move_uploaded_file($_FILES['fileToUploadBack']['tmp_name'], $uploadfileback)) {
        echo "<br>File is valid, and was successfully uploaded.<br>";
    } else {
        echo "<br>NOT UPLOADED!";
    }

    //fileToUploadLeft
    if (move_uploaded_file($_FILES['fileToUploadLeft']['tmp_name'], $uploadfileleft)) {
        echo "<br>File is valid, and was successfully uploaded.<br>";
    } else {
        echo "<br>NOT UPLOADED!";
    }

    //fileToUploadRight
    if (move_uploaded_file($_FILES['fileToUploadRight']['tmp_name'], $uploadfileright)) {
        echo "<br>File is valid, and was successfully uploaded.<br>";
    } else {
        echo "<br>NOT UPLOADED!";
    }

?>