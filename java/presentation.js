var bulle = document.querySelector('.bulle');
var cacher = document.querySelector('.cacher');
var xmark = document.querySelector('.fa-circle-xmark');

// bulle.onclick = function()
function toggle() {
    cacher.classList.toggle('cacher_open');
    xmark.classList.toggle('fa-circle-xmark_open');
}


