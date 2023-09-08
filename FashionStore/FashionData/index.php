<?php
//include_once 'resource/session.php';
include_once 'resource/Database.php';
echo 'PHP version: ' . phpversion();
?>
<html>
<head lang="en">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <script src="https://kit.fontawesome.com/5b145bfb33.js" crossorigin="anonymous"></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="style/Fashion.css">

<title>Fashion</title>
</head>

<body>
    
    <?php 
        include_once 'resource/navbar.php';
    ?>

<div class="container text-center mt-2">
      <h1 class=" display-4 text-center">Fashion DB</h1>
    <div class="row">
      <div class="col">
      <p>
        Hallo wereld!
      </p>
      </div>
    </div>
  </div>

<?php 
    include_once 'resource/JSIncludes.php';
?> 
</body>
</html>