let inputLanguage, hashtagArrayLanguage, containerLanguage, tLanguage;


inputLanguage = document.querySelector('#hashtagsLanguage');
containerLanguage = document.querySelector('.tag-container-Language');
hashtagArrayLanguage = [];

var deletedItemValueLanguage;

var itemsLanguage = [];
function removeALanguage(arrLanguage) {
    var whatLanguage, aLanguage = arguments, LLanguage = aLanguage.length, axLanguage;
    while (LLanguage > 1 && arrLanguage.length) {
        whatLanguage = aLanguage[--LLanguage];
        while ((axLanguage= arrLanguage.indexOf(whatLanguage)) !== -1) {
            arrLanguage.splice(axLanguage, 1);
        }
    }
    return arrLanguage;
}


document.getElementById("addTagButtonLanguage").addEventListener("click", function() {
    if (inputLanguage.value.length > 0) {




          var theTagInputItemLanguage = document.querySelector('#hashtagsLanguage');
          var theTagInputItemLanguageValue = theTagInputItemLanguage.value;
          var theHiddenInputItemLanguage = document.querySelector('.tag-input-Language');
          var theHiddenInputItemLanguageValue = theHiddenInputItemLanguage.value;

          var yesInLanguage = theHiddenInputItemLanguageValue.includes(theTagInputItemLanguageValue);


          if(yesInLanguage) {
              alert("This tag already exists. Please add a new tag.");
          } else {
              console.log("is NOT in array");






          var textLanguage = document.createTextNode(inputLanguage.value);
          var pLanguage = document.createElement('p');
          containerLanguage.appendChild(pLanguage);
          pLanguage.appendChild(textLanguage);
          pLanguage.classList.add('tag-Language');
          pLanguage.setAttribute("value", inputLanguage.value);
          inputLanguage.value = '';






          let deleteTagsLanguage = document.querySelectorAll('.tag-Language');
          for(let iLanguage = 0; iLanguage < deleteTagsLanguage.length; iLanguage++) {
            deleteTagsLanguage[iLanguage].addEventListener('click', () => {

              deletedItemValueLanguage = deleteTagsLanguage[iLanguage].getAttribute("value");
              console.log(deletedItemValueLanguage);

              removeALanguage(itemsLanguage, deletedItemValueLanguage);
              console.log(itemsLanguage);

              var tagStringsLanguage = itemsLanguage.toString();
              var tagStringsLanguageQuoted = '"' + tagStringsLanguage.split( "," ).join( '","' ) + '"';
              console.log( tagStringsLanguageQuoted );
              document.querySelector('.tag-input-Language').setAttribute("value", tagStringsLanguageQuoted);


              containerLanguage.removeChild(deleteTagsLanguage[iLanguage]);
              console.log(deleteTagsLanguage[iLanguage]);



            });
          }






      }



    }



    let itemLengtLanguage = document.querySelectorAll('.tag-Language');

    if (itemLengtLanguage.length > 0) {

      itemsLanguage = [];
      for(let iLanguage2 = 0; iLanguage2 < itemLengtLanguage.length; iLanguage2++) {
          var tagValueeLanguage = document.querySelectorAll('.tag-Language')[iLanguage2].getAttribute("value");
          itemsLanguage.push(tagValueeLanguage);
          console.log(tagValueeLanguage);

      }


      console.log(itemsLanguage);
      var tagStringsLanguage = itemsLanguage.toString();
      var tagStringsLanguageQuoted = '"' + tagStringsLanguage.split( "," ).join( '","' ) + '"';
      console.log( tagStringsLanguageQuoted );
      document.querySelector('.tag-input-Language').setAttribute("value", tagStringsLanguageQuoted);
    } else {}




});
