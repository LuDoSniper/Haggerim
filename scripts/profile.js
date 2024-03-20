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

    // Background
    var height = document.body.clientHeight;
    if (height != window.innerHeight){
        var add = 50;
    } else {
        var add = 0;
    }
    document.getElementById('background').style.height = document.body.clientHeight + add + "px";

    // Titre
    document.getElementById('haggerim').addEventListener('click', function() {
        window.location.href = "home.php";
    });
});