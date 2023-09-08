<?php
include_once 'resource/Database.php';

?>
<html>
<head>

<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<script src="https://kit.fontawesome.com/5b145bfb33.js" crossorigin="anonymous"></script>

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<link rel="stylesheet" href="style/Fashion.css">

<!--<link rel="stylesheet" type="text/css" href="style/style.css"></link>-->

<!-- JS form validation script-->
<!--<script type="text/javascript" src="resource/scripts.js"></script>-->

<title>More Fashion</title>

</head>
<body>
    
<?php 
        include_once 'resource/navbar.php';
?>

<div class="container">
    <h1 class="text-center display-4">Kleding toevoegen</h1>
</div>

<br>

<div class="container w-50 p-3" >
    <!--onsubmit="return validateForm()"-->
  <form name="fashion" action="upload.php" method="post" enctype="multipart/form-data">
    <label for="categories">Categories:</label>
    <select id="categories" name="categories">
      <option value="Helmet">Helmet</option>
      <option value="Shoes">Shoes</option>
      <option value="Armor">Armor</option>
      <option value="Broek">Broek</option>
      <option value="Jurkje">Jurkje</option>
    </select><br><br>


    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required><br><br>

    <label for="image">Select front image to upload:</label>
    <input type="file" id="image" name="fileToUploadFront" accept="image/*" required><br><br>

    <label for="image">Select back image to upload:</label>
    <input type="file" id="image" name="fileToUploadBack" accept="image/*" required><br><br>

    <!--Left image and right image-->
    <label for="image">Select left-side image to upload:</label>
    <input type="file" id="image" name="fileToUploadLeft" accept="image/*" required><br><br>
    <label for="image">Select right-side image to upload:</label>
    <input type="file" id="image" name="fileToUploadRight" accept="image/*" required><br><br>

    <label for="altText">Alt text:</label>
    <input type="text" id="altText" name="altText" required><br><br>

    <input type="submit" name="insertBtn" value="Submit"  class="btn btn-primary"></button>
  </form>
</div>

 
<?php 
    include_once 'resource/JSIncludes.php';
?> 
</body>
</html>