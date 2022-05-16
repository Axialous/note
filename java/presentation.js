var bulle = document.querySelector('.bulle');
var cacher = document.querySelector('.cacher');
var info = document.querySelector('.fa-circle-info')
var xmark = document.querySelector('.fa-circle-xmark')

bulle.onclick = function(){
    cacher.classList.toggle('cacher_open');
}

