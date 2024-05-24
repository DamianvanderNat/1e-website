function change_size(element) {
  var product = element.getAttribute('name');
  var container = element.parentNode.parentNode;
  var size = element.value;
  var price_s = container.querySelector('#price_s');
  var price_m = container.querySelector('#price_m');
  var price_l = container.querySelector('#price_l');
  container.querySelector(`#size`).value = size;

  if (size == "S") {
    price_s.style.display = "block";
    price_m.style.display = "none";
    price_l.style.display = "none";
  } else if (size == "M") {
    price_s.style.display = "none";
    price_m.style.display = "block";
    price_l.style.display = "none";
  } else {
    price_s.style.display = "none";
    price_m.style.display = "none";
    price_l.style.display = "block";
  }
}
function change_amount(element) {
  var product = element.getAttribute('name');
  var container = element.parentNode.parentNode.parentNode;
  var amount = element.value;
  container.querySelector(`#amount`).value = amount;
}

var coll = document.getElementsByClassName("slider");
var i;

for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function () {
    this.classList.toggle("active");
    var content = this.nextElementSibling;
    if (content.style.maxHeight) {
      content.style.maxHeight = null;
    } else {
      content.style.maxHeight = content.scrollHeight + "px";
    }
  });
}