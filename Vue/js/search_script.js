/*const form = document.getElementById('form_recherche');*/
const boutton = document.getElementById('button_search');

boutton.addEventListener('click', function() {
    // handle the form data
    const barre_recherche = document.getElementById('recherche');
    //const boutton = document.getElementById['button_search'];

    var recherche = barre_recherche.value;
    recherche = recherche.replace('+', '*')
    var url = "../Vue/index.php?page=recherche&search=";
    url = url.concat(recherche);

    location.assign(url);
    return false;
}, false);