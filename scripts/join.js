function changePage() {
    window.location.href = "../pages/home.php";
}

document.addEventListener('DOMContentLoaded', function() {
    //Menu
    function afficherMenu(){
        document.getElementById('menu').classList.add('active');
    }

    function cacherMenu(){
        document.getElementById('menu').classList.remove('active');
    }

    document.getElementById('profil').addEventListener('click', afficherMenu);
    document.querySelector('#close span').addEventListener('click', cacherMenu);
});