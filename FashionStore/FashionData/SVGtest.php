<?php ?>
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

        <title>Fashion SVG</title>
        <style>

            .container{

            }

            .vector{
                width: 750;
                height: 750;
                border: 3px solid green;
            }

            svg{
                
            }

            .formverstop{
                /*display: none;*/
            }

        </style>
    </head>
    <body>

    <?php 
        include_once 'resource/navbar.php';
    ?>

    <div class="container">
    <form id="myForm" class="formverstop" data-form="edit">
        <!-- Add your form elements here -->
        <div class="slidecontainer">
            <!--
            <label for="head">Head:</label>
            <input type="range" min="1" max="100" value="50" class="slider" id="myRange">
            <label for="head">Torso:</label>
            <input type="range" min="1" max="100" value="50" class="slider" id="myRange">-->
            <label for="slider">Head: <span id="sliderValue">100</span></label>
            <input type="range" id="slider" min="50" max="150" value="100">
            <label for="slider2">Chest width: <span id="sliderValue2">100</span></label>
            <input type="range" id="slider2" min="50" max="250" value="100">
        </div>
        <br />
        <button type="submit">Submit</button>
     </form>
    </div>

    <div class="container">
        <h1>My first SVG</h1>

        <svg class="Vector" id="victor">
            <circle cx="300" cy="100" r="75" stroke="black" stroke-width="4" fill="brown" />
            <rect x="220" y="175" width="150" height="250"
            style="fill:blue;stroke:pink;stroke-width:5;fill-opacity:0.1;stroke-opacity:0.9" />

            <polygon fill="purple" points="50,50 200,50 250,100 250,150 50,150" />

            <polygon fill="green" points=""/>
        </svg>
        <svg> 
            <use href="#victor" />
        </svg>
    </div>
        

    <script>
        /*document.querySelector('circle').addEventListener('click', e => {
            e.target.style.fill = "red";
            e.target.style.r = "100";
         });*/

        $('circle').on('click', e => {
            e.target.style.fill = "red";
            e.target.style.r = "100";
        });

        var HeadValue = 100; // The initial value for the variable
        var ChestValueW = 100;

        // Set the initial value of the slider label
        $('#sliderValue').text(HeadValue);
        $('#sliderValue2').text(ChestValueW);

        // Add change event listener to the slider
        $('#slider').on('input', function() {
        // Update the variable with the current slider value
        HeadValue = $(this).val();
        
        // Update the slider label to display the current value
        $('#sliderValue').text(HeadValue);
        
        $('circle').attr('r', HeadValue);
        });

        $('#slider2').on('input', function() {
         
        // Update the variable with the current slider value
        ChestValueW = $(this).val();
        var x = 300 - ChestValueW;
        // Update the slider label to display the current value
        $('#sliderValue2').text(ChestValueW);
        
        $('rect').attr('width', ChestValueW * 2);
        $('rect').attr('x', x);
        });

  </script>
    </body>
</html>