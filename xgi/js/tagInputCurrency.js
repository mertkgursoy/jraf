let inputCurrency, hashtagArrayCurrency, containerCurrency, tCurrency;


inputCurrency = document.querySelector('#hashtagsCurrency');
containerCurrency = document.querySelector('.tag-container-Currency');
hashtagArrayCurrency = [];

var deletedItemValueCurrency;

var itemsCurrency = [];
function removeACurrency(arrCurrency) {
    var whatCurrency, aCurrency = arguments, LCurrency = aCurrency.length, axCurrency;
    while (LCurrency > 1 && arrCurrency.length) {
        whatCurrency = aCurrency[--LCurrency];
        while ((axCurrency= arrCurrency.indexOf(whatCurrency)) !== -1) {
            arrCurrency.splice(axCurrency, 1);
        }
    }
    return arrCurrency;
}


document.getElementById("addTagButtonCurrency").addEventListener("click", function() {
    if (inputCurrency.value.length > 0) {




          var theTagInputItemCurrency = document.querySelector('#hashtagsCurrency');
          var theTagInputItemCurrencyValue = theTagInputItemCurrency.value;
          var theHiddenInputItemCurrency = document.querySelector('.tag-input-Currency');
          var theHiddenInputItemCurrencyValue = theHiddenInputItemCurrency.value;

          var yesInCurrency = theHiddenInputItemCurrencyValue.includes(theTagInputItemCurrencyValue);


          if(yesInCurrency) {
              alert("This tag already exists. Please add a new tag.");
          } else {
              console.log("is NOT in array");






          var textCurrency = document.createTextNode(inputCurrency.value);
          var pCurrency = document.createElement('p');
          containerCurrency.appendChild(pCurrency);
          pCurrency.appendChild(textCurrency);
          pCurrency.classList.add('tag-Currency');
          pCurrency.setAttribute("value", inputCurrency.value);
          inputCurrency.value = '';






          let deleteTagsCurrency = document.querySelectorAll('.tag-Currency');
          for(let iCurrency = 0; iCurrency < deleteTagsCurrency.length; iCurrency++) {
            deleteTagsCurrency[iCurrency].addEventListener('click', () => {

              deletedItemValueCurrency = deleteTagsCurrency[iCurrency].getAttribute("value");
              console.log(deletedItemValueCurrency);

              removeACurrency(itemsCurrency, deletedItemValueCurrency);
              console.log(itemsCurrency);

              var tagStringsCurrency = itemsCurrency.toString();
              var tagStringsCurrencyQuoted = '"' + tagStringsCurrency.split( "," ).join( '","' ) + '"';
              console.log( tagStringsCurrencyQuoted );
              document.querySelector('.tag-input-Currency').setAttribute("value", tagStringsCurrencyQuoted);


              containerCurrency.removeChild(deleteTagsCurrency[iCurrency]);
              console.log(deleteTagsCurrency[iCurrency]);



            });
          }






      }



    }



    let itemLengtCurrency = document.querySelectorAll('.tag-Currency');

    if (itemLengtCurrency.length > 0) {

      itemsCurrency = [];
      for(let iCurrency2 = 0; iCurrency2 < itemLengtCurrency.length; iCurrency2++) {
          var tagValueeCurrency = document.querySelectorAll('.tag-Currency')[iCurrency2].getAttribute("value");
          itemsCurrency.push(tagValueeCurrency);
          console.log(tagValueeCurrency);

      }


      console.log(itemsCurrency);
      var tagStringsCurrency = itemsCurrency.toString();
      var tagStringsCurrencyQuoted = '"' + tagStringsCurrency.split( "," ).join( '","' ) + '"';
      console.log( tagStringsCurrencyQuoted );
      document.querySelector('.tag-input-Currency').setAttribute("value", tagStringsCurrencyQuoted);
    } else {}




});
