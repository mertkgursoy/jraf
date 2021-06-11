let inputCountry, hashtagArrayCountry, containerCountry, tCountry;


inputCountry = document.querySelector('#hashtagsCountry');
containerCountry = document.querySelector('.tag-container-country');
hashtagArrayCountry = [];

var deletedItemValueCountry;

var itemsCountry = [];
function removeACountry(arrCountry) {
    var whatCountry, aCountry = arguments, LCountry = aCountry.length, axCountry;
    while (LCountry > 1 && arrCountry.length) {
        whatCountry = aCountry[--LCountry];
        while ((axCountry= arrCountry.indexOf(whatCountry)) !== -1) {
            arrCountry.splice(axCountry, 1);
        }
    }
    return arrCountry;
}


document.getElementById("addTagButtonCountry").addEventListener("click", function() {
    if (inputCountry.value.length > 0) {




          var theTagInputItemCountry = document.querySelector('#hashtagsCountry');
          var theTagInputItemCountryValue = theTagInputItemCountry.value;
          var theHiddenInputItemCountry = document.querySelector('.tag-input-country');
          var theHiddenInputItemCountryValue = theHiddenInputItemCountry.value;

          var yesInCountry = theHiddenInputItemCountryValue.includes(theTagInputItemCountryValue);


          if(yesInCountry) {
              alert("This tag already exists. Please add a new tag.");
          } else {
              console.log("is NOT in array");






          var textCountry = document.createTextNode(inputCountry.value);
          var pCountry = document.createElement('p');
          containerCountry.appendChild(pCountry);
          pCountry.appendChild(textCountry);
          pCountry.classList.add('tag-country');
          pCountry.setAttribute("value", inputCountry.value);
          inputCountry.value = '';






          let deleteTagsCountry = document.querySelectorAll('.tag-country');
          for(let iCountry = 0; iCountry < deleteTagsCountry.length; iCountry++) {
            deleteTagsCountry[iCountry].addEventListener('click', () => {

              deletedItemValueCountry = deleteTagsCountry[iCountry].getAttribute("value");
              console.log(deletedItemValueCountry);

              removeACountry(itemsCountry, deletedItemValueCountry);
              console.log(itemsCountry);

              var tagStringsCountry = itemsCountry.toString();
              var tagStringsCountryQuoted = '"' + tagStringsCountry.split( "," ).join( '","' ) + '"';
              console.log( tagStringsCountryQuoted );
              document.querySelector('.tag-input-country').setAttribute("value", tagStringsCountryQuoted);


              containerCountry.removeChild(deleteTagsCountry[iCountry]);
              console.log(deleteTagsCountry[iCountry]);



            });
          }






      }



    }



    let itemLengtCountry = document.querySelectorAll('.tag-country');

    if (itemLengtCountry.length > 0) {

      itemsCountry = [];
      for(let iCountry2 = 0; iCountry2 < itemLengtCountry.length; iCountry2++) {
          var tagValueeCountry = document.querySelectorAll('.tag-country')[iCountry2].getAttribute("value");
          itemsCountry.push(tagValueeCountry);
          console.log(tagValueeCountry);

      }


      console.log(itemsCountry);
      var tagStringsCountry = itemsCountry.toString();
      var tagStringsCountryQuoted = '"' + tagStringsCountry.split( "," ).join( '","' ) + '"';
      console.log( tagStringsCountryQuoted );
      document.querySelector('.tag-input-country').setAttribute("value", tagStringsCountryQuoted);
    } else {}




});
