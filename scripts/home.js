document.addEventListener('DOMContentLoaded', function() {
    // Menu
    function afficherMenu(){
        document.getElementById('menu').classList.add('active');
    }

    function cacherMenu(){
        document.getElementById('menu').classList.remove('active');
    }

    document.getElementById('profil').addEventListener('click', afficherMenu);
    document.querySelector('#close span').addEventListener('click', cacherMenu);
    
    // Info bulle
    function changeText(element, bulle){
        if (element.classList.contains('dev')){
            bulle.innerText = "En cours de développement";
        } else if (element.classList.contains('not-member')){
            bulle.innerText = "Vous ne faites pas partie d'Haggerim";
        }
    }

    var elements = Array.from(document.getElementsByClassName('info-bulle'));
    var bulle = document.getElementById('info-bulle');

    elements.forEach(function (element) {
        if (element.hasAttribute('disabled')){
            element.addEventListener('mouseover', function(){
                bulle.style.display = 'block';
                changeText(element, bulle);
            });
            
            element.addEventListener('mouseout', function(){
                bulle.style.display = 'none';
            });
            
            element.addEventListener('mousemove', function(event){
                bulle.style.top = event.clientY + 'px';
                bulle.style.left = event.clientX + 'px';
                bulle.style.transform = 'translateY(-100%)';
            });
        }
    });
});