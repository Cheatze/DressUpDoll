<?php

include_once 'resource/Database.php';

if($connection == 1){

//alles uit product_images
//$sql = "SELECT categorie, naam, plaatje, AltText FROM kleding";
//$result = $db->query($sql);

//alles uit product_images products_id images_id
//sql = 

//for the other

//oud ophaal script
/*
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
}*/

//include nieuwe ophaal code
include_once 'resource/getstuff.php';

//Weer terug zetten 
//$json = json_encode($data);

}else{
    //deze moet ook weer aangepast worden
    include_once 'resource/DefaultJson.php';
}

?>
<html>
<head>

<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<script src="https://kit.fontawesome.com/5b145bfb33.js" crossorigin="anonymous"></script>
<!--Jquery, heb ik dit dubbel?-->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<link rel="stylesheet" href="style/Fashion.css">
<!--De stijl word toegepast maar elke verandering niet?-->
<!--<link rel="stylesheet" href="style/poppetje.css">-->
<style>
body {
    font-family: Arial, sans-serif;
    background-color: #f0f0f0;
  }

  p{
    
  }
  
  .EditA{
    color: yellow;
    background-color: green;
  }

  .EditA:hover{
    background-color: lightgreen;
  }

  .container {
    display: flex;
    align-items: center;
    padding: 20px;
    border: 1px solid #ccc;
    position: relative;
    /*give container a fixed size*/
   
  }
  
  /* Het poppetje */
  #bob{
    width: 65%;
    height: auto;
    margin-right: 20px;
  }
  
  /*Voor elke helmet*/
  .overlay-Helmet{
    position: absolute;
    top: 100px;
    left: 210px;
    width: 150px;
    height: auto;
  }

  .overlay-Shoes{
      position: absolute;
      width: 250px;
      top: 450px;
      left: 160px;
  }

  .overlay-Armor{
      position: absolute;
      width: 150px;
      top: 242px;
      left: 210px;
  }

  .overlay-Broek{
     position: absolute;
     width: 150px;
     top: 290px;
     left: 205px;
  }

  .overlay-Jurkje{
    position: absolute;
    width: 150px;
    top: 220px;
    left: 210px;
  }


  /*Aangepaste overlay image classes voor een bepaale scherm wijde*/
  
  .verstopt{
      display: none;
  }
  .formverstop{
    display: none;
  }
</style>

<!--<link rel="stylesheet" type="text/css" href="style/style.css"></link>-->

<!-- JS form validation script-->
<!--<script type="text/javascript" src="resource/scripts.js"></script>-->

<title>See Fashion</title>

</head>
<body>
    
<?php 
        include_once 'resource/navbar.php';
?>


<div style="padding: 10px 20px;" class="container">

    <p id="test">Test</p>
    <!--Hier een knop om de avatar aan te passen-->
    <button type="button" class="EditA">Edit avatar</button>

    <p id="Jas"></p>
    <!--
    <form id="myForm" class="formverstop" data-form="edit">
        
        <div class="slidecontainer">
            <label for="head">Head:</label>
            <input type="range" min="1" max="100" value="50" class="slider" id="myRange">
            <label for="head">Torso:</label>
            <input type="range" min="1" max="100" value="50" class="slider" id="myRange">
        </div>
        <br />
        <button type="submit">Submit</button>
     </form>-->

    <script>
        //put php stuff into javascript
        var JSONOBJ = <?php echo $json; ?>;

        //Insert entire JSONOBJ into page like earlier

        //console.log(JSONOBJ);

        //console.log(typeof(JSONOBJ));
    </script>

</div>

    <div class="container" id="Window">
        <div class="img-container">
        <!--code-view-->
            <div class="avatar-container">
                <img src="Plaatjes/BobVoorkant.png" data-view="front" id="bob" alt="StickfigureBob">
            </div>

        </div>
        <div class="config-container">
        </div>
    </div>
    <div class="container" >
        <button class="bg-success text-white fa fa-arrow-left" name="left">Draai naar links</button>
        <button class="bg-success text-white fa fa-arrow-right" name="right" >Draai naar rechts</button>
    </div>

    <?php 
    include_once 'resource/JSIncludes.php';
    ?> 
    <script>
    $(document).ready(function() {

        $('.EditA').on('click', function() {
        // Toggle the 'hidden' class of the form
            console.log("Inside!");
            $("[data-form='edit']").toggleClass('formverstop');
        });
    });
    </script>
    <!--Script dat html opbouwt op basis van json even uit voor ophaal test-->
    <script type="text/javascript" src="resource/rotator.js"></script>
    <script type="text/javascript" src="resource/script.js"></script>
</body>
</html>