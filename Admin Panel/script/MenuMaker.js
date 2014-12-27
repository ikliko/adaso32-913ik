/**
 * Created by kliko on 27.12.2014 г..
 */
var menu = document.getElementById("menu"),
    nav = document.getElementById('nav');

var addItem = document.createElement("li"),
    linkItem = document.createElement("a"),
    addItemContent = document.createTextNode("Add Item");

linkItem.appendChild(addItemContent);
addItem.appendChild(linkItem);
menu.appendChild(addItem);

linkItem.style.backgroundColor = "#0c0c0c";
linkItem.style.cursor = "pointer";
menu.style.width = menu.offsetWidth + addItem.offsetWidth;


linkItem.addEventListener("click", function() {
    var input = document.createElement('input');
    input.setAttribute('type', 'text');
    input.setAttribute('id', 'getElement');
    input.setAttribute('value', 'Your element');

    input.style.margin = "10px 0 0 10px";
    input.style.position = 'fixed';

    nav.insertBefore(input, menu);

    var getElement = document.getElementById('getElement');

    getElement.addEventListener('keypress', function (e) {
        var key = e.which || e.keyCode;
   alert(key);
        if (key == 13) { // 13 is enter
            var newElement = getElement.value,
                li = document.createElement("li"),
                a = document.createElement("a"),
                content = document.createTextNode(newElement);

            a.appendChild(content);
            li.appendChild(a);
            menu.insertBefore(li, addItem);

            menu.style.width = menu.offsetWidth + li.offsetWidth;

            nav.removeChild(getElement);
        }
    });
});