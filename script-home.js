// Info bulle
function changeText(element, bulle){
    if (element.classList.contains('dev')){
        bulle.innerText = "En cours de développement";
    } else if (element.classList.contains('not-member')){
        bulle.innerText = "Vous ne faites pas partie d'Haggerim"
    }
}

var elements = Array.from(document.getElementsByClassName('info-bulle'));
var bulle = document.getElementById('info-bulle');

elements.forEach(function (element) {
    if (element.hasAttribute('disabled')){
        element.addEventListener('mouseover', function(event){
            bulle.style.display = 'block';
            changeText(element, bulle);
        });
        
        element.addEventListener('mouseout', function(event){
            bulle.style.display = 'none';
        });
        
        element.addEventListener('mousemove', function(event){
            bulle.style.top = event.clientY + 'px';
            bulle.style.left = event.clientX + 'px';
            bulle.style.transform = 'translateY(-100%)';
        });
    }
});