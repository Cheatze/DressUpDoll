;(function ($, window, document, undefined) {

    var JSONOBJ = [{
        "categories":[{
            "name": "Helmet",
            "objects":[{
                "name": "Diamond-Helmet",
                "image-path": "Plaatjes/DiamondHelmet.png"
            },{
                "name": "Gold-Helmet",
                "image-path": "Plaatjes/GoldHelmet.png"
            },{
                "name": "Silver-Helmet",
                "image-path": "Plaatjes/SilverHelmet.png"
            },{
                "name": "Bronze-Helmet",
                "image-path": "Plaatjes/BronzeHelmet.png"
            }]
        },{
            "name": "Shoes",
            "objects":[{
                "name": "Diamond-shoes",
                "image-path": "Plaatjes/DiamondShoes.png"
            },{
                "name": "Golden-shoes",
                "image-path": "Plaatjes/GoldenShoes.png"
            },{
                "name": "Silver-shoes",
                "image-path": "Plaatjes/SilverShoes.png"
            },{
                "name": "Bronze-shoes",
                "image-path": "Plaatjes/BronzeShoes.png"
            }]
        },{
            "name": "Armor",
            "objects":[{
                "name": "Diamond-armor",
                "image-path": "Plaatjes/DiamondArmor.png"
            },{
                "name": "Golden-armor",
                "image-path": "Plaatjes/GoldenArmor.png"
            },{
                "name": "Silver-armor",
                "image-path": "Plaatjes/SilverArmor.png"
            },{
                "name": "Bronze-armor",
                "image-path": "Plaatjes/BronzeArmor.png"
            }]
        }]
    }];

    //check
    console.log(JSONOBJ);

// Create a jQuery object to store the generated HTML
var $html = $();

// Loop through each category
JSONOBJ[0].categories.forEach(function(category) {
  // Loop through each object in the category
  category.objects.forEach(function(object) {

    // Determine the appropriate class based on the category
    // Dit moet worden aangepast zodat Armor overlay-armor krijgt
    //var imageClass = (category.name === 'Shoes') ? 'overlay-shoes' : 'overlay-image';
    //Make this dynamic change overlay image and other css classes to correspond
    var imageClass = 'overlay-' + category.name;
    /*
    if(category.name === 'Shoes'){
        imageClass = 'overlay-Shoes';
    }else if(category.name === 'Helmet'){
        imageClass = 'overlay-Helmet';
    }else if(category.name === 'Armor'){
        imageClass = 'overlay-Armor';
    }*/

    // Generate the image HTML and append it to the jQuery object
    $html = $html.add($('<img>', {
      src: object["image-path"],
      alt: object.name,
      class: imageClass,
      'data-part': category.name,
      'data-name': object.name
    }));
  });

  // Generate the checkbox container HTML
  var $checkboxContainer = $('<div>', {
    class: 'checkbox-container'
  });

  // Loop through each object in the category again to generate the checkboxes
  category.objects.forEach(function(object) {
    var $checkboxRow = $('<div>', {
      class: 'checkbox-row'
    });
    $checkboxRow.append($('<input>', {
      type: 'checkbox',
      'data-slot': category.name,
      id: object.name,
      name: object.name
    }));
    $checkboxRow.append($('<label>', {
      for: object.name,
      text: 'Equip ' + object.name
    }));
    $checkboxContainer.append($checkboxRow);
  });

  // Append the checkbox container to the jQuery object
  $html = $html.add($checkboxContainer);
});

// Append the generated HTML to the "Window" div using jQuery
$('#Window').append($html);

    //add an argument dataslot?
    function verstop(data="all"){
        //console.log(data);
        //Dit ook dynamic maken op een of andere manier
        if(data=="all"){
            $('[data-name]').addClass("verstopt");
        }else{
            $('[data-part="' + data + '"]').addClass("verstopt");
        }
        
        /*else if(data=="Helmet"){
            //'[data-name="' + dataSlot + '"]'
            //$("img.overlay-image").addClass("verstopt");
           $('[data-part="' + data + '"]').addClass("verstopt");
        }else if(data=="Shoes"){
            $('[data-part="' + data + '"]').addClass("verstopt");
            //$("img.overlay-shoes").addClass("verstopt");
        }else if(data=="Armor"){
            $('[data-part="' + data + '"]').addClass("verstopt");
        }*/
        
    }

    function verschijn(helmet){
        //data-name=helmetName
        //console.log(helmet);
        $("[data-name='" + helmet + "']").removeClass("verstopt");

    }

    verstop();

    //given the following html and jquery replace the use of ".checkbox-container" and ".Helmet" with properties of changedCB

    //change css selector to work without the class?
    $(".checkbox-container input").change(function(e){
        
        var changedCB = $(this), 
            isChecked = changedCB.is(':checked'),
            helmetName = changedCB.attr('name');
            Dataslot = changedCB.attr("data-slot");
        //console.log(e);
        //console.log(arguments);
        //console.log(changedCB);

        console.log(Dataslot);
        verstop(Dataslot);

        //console.log(changedCB.attr("class"));
        //console.log(changedCB.attr("data-slot"))

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
            verschijn(helmetName);
        }

    });

//"})" weggehaald
})(jQuery, window,document);