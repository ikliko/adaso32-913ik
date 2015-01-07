/**
 * Created by kliko on 27.12.2014 г..
 */
var menu = document.getElementById("menu"),
    nav = document.getElementById('nav');

var addItem = document.createElement("span"),
    linkItem = document.createElement("a"),
    addItemContent = document.createTextNode("Add Item");

linkItem.appendChild(addItemContent);
addItem.appendChild(linkItem);
nav.insertBefore(addItem, menu);

linkItem.style.backgroundColor = "#0c0c0c";
linkItem.style.color = "#fff";
linkItem.style.cursor = "pointer";
linkItem.style.position = "absolute";

var noInput = false;

function addInput() {
    if(noInput) {

    } else {
        noInput = true;
        var form = document.createElement('form'),
            input = document.createElement('input');

        form.setAttribute('method', 'get');

        input.setAttribute('name', 'input');
        input.setAttribute('type', 'text');
        input.setAttribute('id', 'getElement');
        input.setAttribute('value', 'Enter element..');

        form.style.width = "auto";
        form.style.margin = '0';
        form.style.padding = '0';
        form.style.border = 'none';
        form.style.backgroundColor = "";
        form.style.textAlign = 'left';

        input.style.color = "#ccc";
        input.style.position = "absolute";
        input.style.margin = "25px 0 0 0";
        input.style.borderRadius = '0';
        input.style.height = '20px';


        form.appendChild(input);
        nav.insertBefore(form, menu);

        input.addEventListener("mouseup", function () {
            input.style.color = "#000";
            input.value = "";
        });

        var getElement = document.getElementById('getElement');

        getElement.addEventListener('keypress', function (e) {
            var key = e.which || e.keyCode;
            haveInput = true;
            var noEmpty = input.value == '' || input.value == ' ' || input.value == 'Enter element..';
            if ((key == 13) && noEmpty) { // 13 is enter
                var newElement = getElement.value,
                    li = document.createElement("li"),
                    a = document.createElement("a"),
                    content = document.createTextNode(newElement);

                a.appendChild(content);
                a.setAttribute("href", newElement);
                li.appendChild(a);
                menu.appendChild(li);

                var line = document.createElement("li"),
                    lineCont = document.createTextNode(" | ");

                line.appendChild(lineCont);
                menu.appendChild(line);

                menu.style.width = menu.offsetWidth + li.offsetWidth + line.offsetWidth;

                nav.removeChild(getElement);
                noInput = false;
            }
        });
    }
};

linkItem.addEventListener("click", addInput);