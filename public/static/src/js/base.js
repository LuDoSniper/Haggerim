document.addEventListener('DOMContentLoaded', function() {
    // Sidebar
    function showSidebar(){
        document.getElementById('sidebar').classList.add('active');
    }

    function hideSidebar(){
        document.getElementById('sidebar').classList.remove('active');
    }

    document.getElementById('profil').addEventListener('click', showSidebar);
    document.querySelector('#close span').addEventListener('click', hideSidebar);

    // Info bulle
    function changeText(element, bulle){
        if (element.classList.contains('dev')){
            bulle.innerText = "En cours de développement";
        } else if (element.classList.contains('not-member')){
            bulle.innerText = "Vous ne faites pas partie d'Haggerim";
        } else if (element.classList.contains('member')){
            bulle.innerText = "Vous faites déjà parti d'Haggerim";
        }
    }

    const elements = Array.from(document.querySelectorAll('.info-bulle'));
    const bulle = document.getElementById('info-bulle');

    elements.forEach((element) => {
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