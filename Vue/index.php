<?php
  session_start();
  include("../Data/Donnee/Donnees.inc.php");
?>

<!DOCTYPE html>

<html lang="fr" class="text-white">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <title>Bar à Cocktail</title>
</head>
<body class="bg-cover bg-no-repeat h-screen w-screen bg-center bg-fixed" style="background-image: url(../Data/DonneePerso/background.jpg)">

    <!---Barre de naviguation--->
    <header class="bg-gray-900 w-screen">
        <div class="flex max-w-6xl mx-auto justify-between px-5 ">
            <!---Nav Gauche--->
            <div class="flex space-x-9">
                <!---Onglet Accueuil--->
                <div>
                    <a class="flex items-center px-2 py-4" href="#">
                        <span class="text-3xl font-bold font-heading hover:text-gray-200">Accueil</span>
                        <img src="">
                    </a>
                </div>
                <div class="hidden items-center md:flex space-x-1">
                    <!---Onglet Naviguation--->
                    <a class="flex px-2 py-4 hover:text-gray-200 font-semibold font-heading transition duration-200" href="#">
                        <span class="pr-1">Naviguation</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 transform hover:scale-110" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </a>
                    <!---Onglet Recettes--->
                    <a class="flex px-2 py-4 hover:text-gray-200 font-semibold font-heading transition duration-200" href="#">
                        <span class="pr-1">Recettes</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 transform hover:rotate-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                        </svg>
                    </a>     
                </div>
            </div>
            <!---Barre de recherche--->
            <div class="hidden md:flex relative items-center">
                <form>
                    <input type="text" placeholder="Rechercher" class="bg-gray-800 h-10 px-5 pr-10 rounded-full text-sm focus:outline-none">
                    <button type="submit" class="hover:text-gray-200 absolute right-0 mt-3 mr-4 transform hover:scale-110">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </form>
            </div>
            <!---Onglet connexion--->
            <a class="hidden md:flex flex-shrink-0 hover:text-gray-200 items-center" href="#">
                <p class="pr-1">
                    <span class="sr-only lg:not-sr-only">Espace de</span>
                    Connexion
                </p>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 transform hover:scale-110" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2" />
                </svg>
            </a>
            <!---Nav Cachée--->
            <div class="md:hidden flex items-center">
                <button class="outline-none mobile-menu-button">
                <svg class=" w-6 h-6 text-gray-500 hover:text-blue-500 "
                        x-show="!showMenu"
                        fill="none"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
						>
					<path d="M4 6h16M4 12h16M4 18h16"></path>
				</svg>
                </button>
            </div>
        </div>
        <!---Nav small screen--->
        <div class="hidden mobile-menu">
            <ul class="">
                <li><a href="#naviguation" class="block text-sm px-2 py-4 hover:text-blue-500 transition duration-200 ">Naviguation</a></li>
                <li><a href="#recettes" class="block text-sm px-2 py-4 hover:text-blue-500 transition duration-200 ">Recettes</a></li>
                <li><a href="#rechercher" class="block text-sm px-2 py-4 hover:text-blue-500 transition duration-200 ">Rechercher</a></li>
                <li><a href="#connexion" class="block text-sm px-2 py-4 hover:text-blue-500 transition duration-200 ">Espace de connexion</a></li>
            </ul>
        </div>
        <script>
            const btn = document.querySelector("button.mobile-menu-button");
            const menu = document.querySelector(".mobile-menu");

            btn.addEventListener("click", () => {
                menu.classList.toggle("hidden");
            });
        </script>
    </header>

    <div class="absolute bottom-0 right-0 mb-4 mr-4 z-10">
        <div>
            <a title="Remonter vers le menu" href="#">
                <svg xmlns="http://www.w3.org/2000/svg" class="block w-10 h-10 transition-all transform hover:scale-110 hover:-translate-y-4 outline-none" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 11l7-7 7 7M5 19l7-7 7 7" />
                </svg>
            </a>
        </div>
    </div>
    <?php include("../Controller/navigation.php")?>
    <main>
        <?php
            if(isset($_SESSION['AlimentCourant']))
            {
                $AlimentCourant = $_GET['AlimentCourant'];
            }
            else{
                include('../Controller/Coktail.php');
            }   
        ?>
    </main>
</body>

</html>