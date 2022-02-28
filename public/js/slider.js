var d = document;
var wrap = d.querySelector('.wrap');
var items = d.querySelector('.items');
var itemCount = d.querySelectorAll('.item').length;
var scroller = d.querySelector('.scroller');
var pos = 0;

let interval = setInterval(function(){next(false)}, 3500);


function setTransform() {
  items.style.transform = 'translate3d(' + (-pos * items.offsetWidth) + 'px,0,0)';
  
}

function prev(manualPress = true) {
  pos = (pos - 1+ itemCount)%itemCount;
  if(manualPress){
    clearInterval(interval);
    interval = setInterval(next, 3500);
  }
  setTransform();
}

function next(manualPress = true) {
  pos = (pos + 1 )%itemCount;
  if(manualPress){
    clearInterval(interval);
    interval = setInterval(next, 3500);
  }
  setTransform();
}

window.addEventListener('resize', setTransform);