let input, hashtagArray, container, t;


input = document.querySelector('#hashtags');
container = document.querySelector('.tag-container');
hashtagArray = [];

var deletedItemValue;

var items = [];
function removeA(arr) {
    var what, a = arguments, L = a.length, ax;
    while (L > 1 && arr.length) {
        what = a[--L];
        while ((ax= arr.indexOf(what)) !== -1) {
            arr.splice(ax, 1);
        }
    }
    return arr;
}


document.getElementById("addTagButton").addEventListener("click", function() {
    if (input.value.length > 0) {




          var theTagInputItem = document.querySelector('#hashtags');
          var theTagInputItemValue = theTagInputItem.value;
          var theHiddenInputItem = document.querySelector('.tag-input');
          var theHiddenInputItemValue = theHiddenInputItem.value;

          var yesIn = theHiddenInputItemValue.includes(theTagInputItemValue);


          if(yesIn) {
              alert("This tag already exists. Please add a new tag.");
          } else {
              console.log("is NOT in array");






          var text = document.createTextNode(input.value);
          var p = document.createElement('p');
          container.appendChild(p);
          p.appendChild(text);
          p.classList.add('tag');
          p.setAttribute("value", input.value);
          input.value = '';

          let deleteTags = document.querySelectorAll('.tag');

          for(let i = 0; i < deleteTags.length; i++) {
            deleteTags[i].addEventListener('click', () => {


              deletedItemValue = deleteTags[i].getAttribute("value");
              console.log(deletedItemValue);


              removeA(items, deletedItemValue);
              console.log(items);

              var tagStrings = items.toString();
              var tagStringsQuoted = '"' + tagStrings.split( "," ).join( '","' ) + '"';
              console.log( tagStringsQuoted );
              document.querySelector('.tag-input').setAttribute("value", tagStringsQuoted);


              container.removeChild(deleteTags[i]);
              console.log(deleteTags[i]);




            });
          }






      }



    }



    let itemLengt = document.querySelectorAll('.tag');

    if (itemLengt.length > 0) {

      items = [];
      for(let i = 0; i < itemLengt.length; i++) {
          var tagValuee = document.querySelectorAll('.tag')[i].getAttribute("value");
          items.push(tagValuee);
          console.log(tagValuee);

      }


      console.log(items);
      var tagStrings = items.toString();
      var tagStringsQuoted = '"' + tagStrings.split( "," ).join( '","' ) + '"';
      console.log( tagStringsQuoted );
      document.querySelector('.tag-input').setAttribute("value", tagStringsQuoted);
    } else {}




});
