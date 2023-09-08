;(function ($, window, document, undefined) {

    //
    


    //Images!
    $('body').on('t-addImg', '.img-container', function(e, object, imageClass, category, $ImageContainer){

        //console.log($ImageContainer);
        // Generate the image HTML and append it to the jQuery object
        //$ImageContainer = $ImageContainer.append
        var $Image = ($('<img>', { //$htmlimgs to $ImageContainer add to append $imgContainer to image
          src: "uploads/" + object["plaatje"],//image-path vervangen met uploads/ + plaatje
          alt: object.AltText, //name vervangen met AltText, wrod dit wel toegevoegd?
          class: imageClass,
          'data-part': category.categorie, //category.categorie 
          'data-name': object["naam"], //object.naam veranderd in object['naam']
          'data-viewpoint': object["view"], //added view as data attribute
          'data-toggle': "off" //off or on depending on hidden?
        }));
        //Maybe append at the end like with the checkboxes?
        $ImageContainer.append($Image);
    });

    //checkboxes!
    $('body').on('t-addConfig', '.config-container', function(e, object, category, $checkboxContainer){
        //if($checkname != object.naam){
            console.log($checkboxContainer);

            var $checkboxRow = $('<div>', {
            class: 'checkbox-row'
            });
            $checkboxRow.append($('<input>', {
            type: 'checkbox',
            'data-slot': category.categorie,////name vervangen met categorie
            id: object.naam, //name vervangen met naam
            name: object.naam //name vervangen met naam
            }));
            $checkboxRow.append($('<label>', {
            for: object.naam, //name vervangen met naam
            text: 'Equip ' + object.naam //name vervangen met naam
            }));
            $checkboxContainer.append($checkboxRow);
            
            //Dit was denk ik het foutje waardoor er zoveel boxes waren
            //$checkname = object.naam;
        //}
    });

    //Een listener voor de objects.forEach loop
    //Vier argumenten; category $checkname $checkboxContainer $ImageContainer
    $('body').on('t-lotwo', '.avatar-container', function(e, category, $checkboxContainer, $ImageContainer){
        //To make sure there's only one checkbox per object.naam
        var $checkname = "";
        
        // Loop through each object in the category
        category.objects.forEach(function(object) {

            // Determine the appropriate class based on the category
            // Dit moet worden aangepast zodat Armor overlay-armor krijgt
            //var imageClass = (category.name === 'Shoes') ? 'overlay-shoes' : 'overlay-image';
            //Make this dynamic change overlay image and other css classes to correspond
            var imageClass = 'overlay-' + category.categorie; //name vervangen met categorie

            var imgContainer = $('.img-container'),
                configContainer = $('.config-container'); //
                
            imgContainer.trigger('t-addImg', [ object, imageClass, category, $ImageContainer]);
            //configContainer.trigger('t-addConfig', object);
            //windowContainer.trigger('t-addhtml', [$htmlimgs, $htmlcheck]);

            //Maar een checkbox per unieke naam
            if($checkname != object.naam){
                //console.log($checkname);
                configContainer.trigger('t-addConfig', [object, category, $checkboxContainer]);

                $checkname = object.naam;
            }


        });
    });

    $('body').on('t-spul', '.avatar-container', function(e, category){
        //Aangepast zodat er maar een checkbox per object.naam is
        //var $checkname = ""; misschien was dit het?

        // Generate the checkbox container HTML
        var $checkboxContainer = $('<div>', {
            class: 'checkbox-container'
        });

        $checkboxContainer.append($('<p>', {
            class: 'title',
            text: category.categorie
        }));

        //Generate category container voor plaatjes?
        var $ImageContainer = $('<div>', {
            class: 'category-container',
            'data-category': category.categorie
        });

    //
    var loopTwo = $('.avatar-container');
    loopTwo.trigger('t-lotwo', [category, $checkboxContainer, $ImageContainer]);


    //Ook voor de plaatjes hier pas spull toevoegen aan html object
    $htmlimgs = $htmlimgs.add($ImageContainer);
    // Append the checkbox container to the jQuery object
    $htmlcheck = $htmlcheck.add($checkboxContainer);
    //$html = $html.add($checkboxContainer);
    });

//html toevoegen aan de pagina
$('body').on('t-addhtml', '.container', function(e, $htmlimgs, $htmlcheck){
    $('.img-container').append($htmlimgs);
    $('.config-container').append($htmlcheck);
});

//listeners! Zo veel mogelijk in listeners!


// Create a jQuery object to store the generated HTML
//I think I'll need two of these
//var $html = $();
var $htmlimgs = $();
var $htmlcheck = $(); 

//

// Loop through each category
JSONOBJ[0].categories.forEach(function(category) {

    //Alles wat nog over was uit deze loop in deze listener gestopt
    var farnam = $('.avatar-container');
    farnam.trigger('t-spul', [category]);

});

//Deze twee in een listener stoppen
//hier de twee $html variabelen aan de twee verschillende containers toevoegen
//$('.img-container').append($htmlimgs);
//$('.config-container').append($htmlcheck);
var windowContainer = $('.container');
windowContainer.trigger('t-addhtml', [$htmlimgs, $htmlcheck]);
//$('#Window').append($html);

    //moet ik dit aanpassen met gebruik van data-viewpoint als variabel?
    //dit stukje verstopt alles of alles met dezelfde catagorie
    //als ik nog een argument toevoeg zou ik alles met een bepaald data-viewpoint kunnen verstoppen?
    //Neen ik denk dat ik daar beter een nieuwe functie voor kan maken
    function verstop(data="all"){
        //console.log(data);
        //Dit ook dynamic maken op een of andere manier
        if(data=="all"){
            $('[data-part]').addClass("verstopt");//changed data-name to data-part
            $('[data-part]').attr("data-toggle", "off"); //toggle
        }else{
            $('[data-part="' + data + '"]').addClass("verstopt");
            $('[data-part="' + data + '"]').attr("data-toggle", "off"); //toggle
        }
        
        
    }

    //data-viewpoint verstop functie
    //waar kan ik de variabel hiervoor vandaan halen om hieraan door te geven?
    //als data-view van het poppetje 'front' is moet juist 'back'verstopt worden
    //waar zal ik dit moeten aanroepen?
    function verstopview(view){
        //$('[data-viewpoint="' + view + '"]').addClass("verstopt");
        //hier ook een if statement zoals bij de draai knopjes
        if(view == "front"){//front

            //$("[data-toggle='on']").removeClass("verstopt");
            $("[data-viewpoint='back']").addClass("verstopt"); //hide all 'back'imgs
            $("[data-viewpoint='left']").addClass("verstopt"); //hide all 'left'
            $("[data-viewpoint='right']").addClass("verstopt"); //hide all 'right'

            }else if(view == "right"){//right

            //$("[data-toggle='on']").removeClass("verstopt");
            $("[data-viewpoint='left']").addClass("verstopt"); //hide all 'left'
            $("[data-viewpoint='back']").addClass("verstopt"); //hide all 'back'
            $("[data-viewpoint='front']").addClass("verstopt");//hide all 'front'

            }else if(view == "back"){//back

            //$("[data-toggle='on']").removeClass("verstopt");
            $("[data-viewpoint='front']").addClass("verstopt");//hide all 'front' imgs
            $("[data-viewpoint='left']").addClass("verstopt"); //hide all 'left'
            $("[data-viewpoint='right']").addClass("verstopt"); //hide all 'right'
            
            }else if(view == "left"){//left

            //$("[data-toggle='on']").removeClass("verstopt");
            $("[data-viewpoint='right']").addClass("verstopt"); //hide all 'right'
            $("[data-viewpoint='front']").addClass("verstopt");//hide all 'front'
            $("[data-viewpoint='back']").addClass("verstopt"); //hide all 'back'

            }

    }

    //Ik denk dat dit nog moet worden aangepast
    //Zodat alleen het plaatje met de juiste viewding word weergegeven
    //Een extra argument voor 'view' de huidige data-view van #bob
    function verschijn(helmet, view){
        //data-name=helmetName
        console.log(helmet);
        $("[data-name='" + helmet + "']").removeClass("verstopt");//changed data-name to data-part
        $("[data-name='" + helmet + "']").attr("data-toggle", "on"); //toggle
        //Dit is denk ik wat ik vergeten was aan te passen
        //als ik de huidige view doorgeef kan ik daarmee elke andere verstoppen zoals ik met de rond draai knopjes doe
        verstopview(view);

    }

    //weer terug stoppen
    verstop();

    //given the following html and jquery replace the use of ".checkbox-container" and ".Helmet" with properties of changedCB

    //change css selector to work without the class?
    $(".checkbox-container input").change(function(e){
        
        var changedCB = $(this), 
            isChecked = changedCB.is(':checked'),
            helmetName = changedCB.attr('name');
            Dataslot = changedCB.attr("data-slot");

            //de waarde van data-view ophalen van #bob
            var dataViewValue = $('#bob').attr('data-view');

        //console.log(e);
        //console.log(arguments);
        //console.log(changedCB);

        console.log(Dataslot);
        verstop(Dataslot);

        //changedCB.siblings().prop('checked', false);

        //.find(".Helmet")
        //.find(changedCB.attr('class'))

        //.closest(".checkbox-container")
        //.closest("div").parent()

        //De checkboxes van de andere schoenen worden niet ge unchecked
        //ik zie het find zoekt een class niet een dataobject
        //pass .find('.' + Dataslot) aan
        //find('[data-slot]')?
        if (isChecked) {
            changedCB
              .closest("div")
              .parent()
              .find('[data-slot]')
              .not(changedCB)
              .prop("checked", false);
        }

        if(isChecked) {
            //Argument toevoegen
            verschijn(helmetName, dataViewValue);
        }

        //voorbeeld
        //$('.img-container').trigger('ENM-updateavatar', 'kaas');

    });

    //voorbeeld
    //$('.img-container').on('ENM-updateavatar', function(data){ });

//"})" weggehaald
})(jQuery, window,document);