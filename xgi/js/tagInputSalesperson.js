let inputSalesperson, hashtagArraySalesperson, containerSalesperson, tSalesperson;


inputSalesperson = document.querySelector('#hashtagsSalesperson');
containerSalesperson = document.querySelector('.tag-container-Salesperson');
hashtagArraySalesperson = [];

var deletedItemValueSalesperson;

var itemsSalesperson = [];
function removeASalesperson(arrSalesperson) {
    var whatSalesperson, aSalesperson = arguments, LSalesperson = aSalesperson.length, axSalesperson;
    while (LSalesperson > 1 && arrSalesperson.length) {
        whatSalesperson = aSalesperson[--LSalesperson];
        while ((axSalesperson= arrSalesperson.indexOf(whatSalesperson)) !== -1) {
            arrSalesperson.splice(axSalesperson, 1);
        }
    }
    return arrSalesperson;
}


document.getElementById("addTagButtonSalesperson").addEventListener("click", function() {
    if (inputSalesperson.value.length > 0) {




          var theTagInputItemSalesperson = document.querySelector('#hashtagsSalesperson');
          var theTagInputItemSalespersonValue = theTagInputItemSalesperson.value;
          var theHiddenInputItemSalesperson = document.querySelector('.tag-input-Salesperson');
          var theHiddenInputItemSalespersonValue = theHiddenInputItemSalesperson.value;

          var yesInSalesperson = theHiddenInputItemSalespersonValue.includes(theTagInputItemSalespersonValue);


          if(yesInSalesperson) {
              alert("This tag already exists. Please add a new tag.");
          } else {
              console.log("is NOT in array");






          var textSalesperson = document.createTextNode(inputSalesperson.value);
          var pSalesperson = document.createElement('p');
          containerSalesperson.appendChild(pSalesperson);
          pSalesperson.appendChild(textSalesperson);
          pSalesperson.classList.add('tag-Salesperson');
          pSalesperson.setAttribute("value", inputSalesperson.value);
          inputSalesperson.value = '';






          let deleteTagsSalesperson = document.querySelectorAll('.tag-Salesperson');
          for(let iSalesperson = 0; iSalesperson < deleteTagsSalesperson.length; iSalesperson++) {
            deleteTagsSalesperson[iSalesperson].addEventListener('click', () => {

              deletedItemValueSalesperson = deleteTagsSalesperson[iSalesperson].getAttribute("value");
              console.log(deletedItemValueSalesperson);

              removeASalesperson(itemsSalesperson, deletedItemValueSalesperson);
              console.log(itemsSalesperson);

              var tagStringsSalesperson = itemsSalesperson.toString();
              var tagStringsSalespersonQuoted = '"' + tagStringsSalesperson.split( "," ).join( '","' ) + '"';
              console.log( tagStringsSalespersonQuoted );
              document.querySelector('.tag-input-Salesperson').setAttribute("value", tagStringsSalespersonQuoted);


              containerSalesperson.removeChild(deleteTagsSalesperson[iSalesperson]);
              console.log(deleteTagsSalesperson[iSalesperson]);



            });
          }






      }



    }



    let itemLengtSalesperson = document.querySelectorAll('.tag-Salesperson');

    if (itemLengtSalesperson.length > 0) {

      itemsSalesperson = [];
      for(let iSalesperson2 = 0; iSalesperson2 < itemLengtSalesperson.length; iSalesperson2++) {
          var tagValueeSalesperson = document.querySelectorAll('.tag-Salesperson')[iSalesperson2].getAttribute("value");
          itemsSalesperson.push(tagValueeSalesperson);
          console.log(tagValueeSalesperson);

      }


      console.log(itemsSalesperson);
      var tagStringsSalesperson = itemsSalesperson.toString();
      var tagStringsSalespersonQuoted = '"' + tagStringsSalesperson.split( "," ).join( '","' ) + '"';
      console.log( tagStringsSalespersonQuoted );
      document.querySelector('.tag-input-Salesperson').setAttribute("value", tagStringsSalespersonQuoted);
    } else {}




});
