function changePage() {
    window.location.href = "../pages/home.php";
}

document.addEventListener('DOMContentLoaded', function (){
    function toggle(elements, element){
        elements.forEach( tmp => {
            if (tmp != element){
                tmp.style.display = 'none';
            }
        });

        if (element.style.display != 'none'){
            element.style.display = 'none';
            document.getElementById('overlay').style.display = 'none';
        } else {
            element.style.display = 'block';
            document.getElementById('overlay').style.display = 'block';
        }
    }

    function changeText(element, text){
        element.innerText = text;
        element.parentElement.nextElementSibling.nextElementSibling.children[0].value = text;
    }

    var menus = document.querySelectorAll('#joining-requests table .button .menu');
    var overlay = document.getElementById('overlay');

    overlay.addEventListener('click', function() {
        menus.forEach(function (menu) {
            menu.style.display = 'none';
        });
        overlay.style.display = 'none';
    });
    
    menus.forEach(menu => {
        menu.style.display = 'none';
        
        var right = menu.nextElementSibling.nextElementSibling;
        var left = menu.nextElementSibling;
        var spanLeft = menu.nextElementSibling.children[0];
        var spanAccept = menu.children[0];
        var spanRefuse = menu.children[1];
    
        left.addEventListener('click', function (){
            if (confirm("Etes vous sûr ?")){
                left.nextElementSibling.nextElementSibling.submit();
            }
        });
        right.addEventListener('click', function (){
            toggle(menus, menu);
        });
        menu.addEventListener('click', function(){
            toggle(menus, menu);
        });
    
        spanAccept.addEventListener('click', function(){
            changeText(spanLeft, 'Accepter');
        });
        spanRefuse.addEventListener('click', function(){
            changeText(spanLeft, 'Refuser');
        });
    });
});