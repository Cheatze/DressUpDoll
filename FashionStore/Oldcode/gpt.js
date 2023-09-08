var JSONOBJ = [{
    "categories": [{
      "name": "Helmet",
      "objects": [{
        "name": "Diamond-Helmet",
        "image-path": "Plaatjes/DiamondHelmet.png"
      }, {
        "name": "Gold-Helmet",
        "image-path": "Plaatjes/GoldHelmet.png"
      }]
    }, {
      "name": "Shoes",
      "objects": [{
        "name": "Diamond-shoes",
        "image-path": "Plaatjes/DiamondShoes.png"
      }, {
        "name": "Golden-shoes",
        "image-path": "Plaatjes/GoldenShoes.png"
      }]
    }]
  }];
  
  $(document).ready(function() {
    var $window = $('#Window');
  
    // Generate images and checkboxes
    JSONOBJ.forEach(function(category) {
      category.objects.forEach(function(obj) {
        var $img = $('<img>').attr({
          'src': obj['image-path'],
          'alt': obj.name,
          'class': 'overlay-image',
          'data-part': category.name,
          'data-name': obj.name
        });
  
        if (category.name === 'Shoes') {
          $img.removeClass('overlay-image').addClass('overlay-shoes');
        }
  
        $window.append($img);
  
        var $checkboxContainer = $('<div>').addClass('checkbox-container');
        var $checkboxRow = $('<div>').addClass('checkbox-row');
        var $checkbox = $('<input>').attr({
          'type': 'checkbox',
          'data-slot': category.name,
          'id': obj.name,
          'name': obj.name
        });
        var $label = $('<label>').attr('for', obj.name).text('Equip ' + obj.name);
  
        $checkboxRow.append($checkbox, $label);
        $checkboxContainer.append($checkboxRow);
        $window.append($checkboxContainer);
      });
    });
  });

  var JSONOBJ = [{
    "categories":[{
        "categorie": "Helmet",
        "objects":[{
            "naam": "Diamond-Helmet",
            "plaatje": "Plaatjes/DiamondHelmet.png",
            "AltText": "Altenate text"
        },{
            "naam": "Gold-Helmet",
            "plaatje": "Plaatjes/GoldHelmet.png",
            "AltText": "Altenate text"
        },{
            "naam": "Silver-Helmet",
            "plaatje": "Plaatjes/SilverHelmet.png",
            "AltText": "Altenate text"
        },{
            "naam": "Bronze-Helmet",
            "plaatje": "Plaatjes/BronzeHelmet.png",
            "AltText": "Altenate text"
        }]
    },{
        "categorie": "Shoes",
        "objects":[{
            "naam": "Diamond-shoes",
            "plaatje": "Plaatjes/DiamondShoes.png",
            "AltText": "Altenate text"
        },{
            "naam": "Golden-shoes",
            "plaatje": "Plaatjes/GoldenShoes.png",
            "AltText": "Altenate text"
        },{
            "naam": "Silver-shoes",
            "plaatje": "Plaatjes/SilverShoes.png",
            "AltText": "Altenate text"
        },{
            "naam": "Bronze-shoes",
            "plaatje": "Plaatjes/BronzeShoes.png",
            "AltText": "Altenate text"
        }]
    },{
        "categorie": "Armor",
        "objects":[{
            "naam": "Diamond-armor",
            "plaatje": "Plaatjes/DiamondArmor.png",
            "AltText": "Altenate text"
        },{
            "naam": "Golden-armor",
            "plaatje": "Plaatjes/GoldenArmor.png",
            "AltText": "Altenate text"
        },{
            "naam": "Silver-armor",
            "plaatje": "Plaatjes/SilverArmor.png",
            "AltText": "Altenate text"
        },{
            "naam": "Bronze-armor",
            "plaatje": "Plaatjes/BronzeArmor.png",
            "AltText": "Altenate text"
        }]
    }]
}];