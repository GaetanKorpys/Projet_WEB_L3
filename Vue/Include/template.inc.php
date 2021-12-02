<!DOCTYPE html>

<html lang="fr" class="text-white">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <title><?= $titre ?></title>
</head>

<body class="flex flex-col h-screen w-screen bg-cover bg-no-repeat bg-center bg-fixed text-gray-600" style="background-image: url(../Ressources/DonneesPerso/Image/background.jpg)">

    <!---Barre de naviguation--->
    <header class="bg-white w-screen text-xl">
        <div class="flex mx-auto px-7 justify-between py-4 border-b-2 border-black">
            <!---Nav Gauche--->
            <div class="flex space-x-7 lg:space-x-10 ">
                <!---Onglet Accueuil--->
                <div class="flex items-center min-w-max">
                    <a href="../Vue/index.php">
                        <span class="text-sm md:text-xl transition duration-500 hover:text-black">BAR A COCKTAIL</span>
                    </a>
                </div>
                <div class="hidden md:flex space-x-2 lg:space-x-10">
                    <!---Onglet Naviguation--->
                    <a class="flex items-center hover:text-black transition duration-500" href="../Vue/index.php?page=cocktail">
                        <span class="pr-1">Naviguation</span>
                    </a>
                    <!---Onglet Recettes--->
                    <a class="flex items-center hover:text-black transition duration-500" href="..Vue/index.php?page=recette">
                        <span class="pr-1">Recettes</span>
                    </a>
                </div>
            </div>
            <!---Barre de recherche--->
            <div class="hidden md:flex items-center w-full mx-10">
                
                    <div class="flex w-full rounded-full bg-white p-3 border border-gray-300 rounded-lg hover:border-gray-400">
                        <input type="text" id="recherche" placeholder="Rechercher ..." class="w-full focus:placeholder-black text-sm focus:outline-none">
                        <button id="button_search" class="transform hover:scale-125">
                            <svg xmlns="http://www.w3.org/2000/svg" class="flex h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </div>
                
            </div>
            <!---Onglet connexion--->
            <a class="hidden md:flex transition duration-500 hover:text-black items-center" href="../index.php?action=connexion">
                <span>Connexion</span>
            </a>
            <!---Nav Cachée--->
            <div class="md:hidden flex items-center px-3 pt-2 transition duration-700 transform hover:rotate-90 ">
                <button class="outline-none mobile-menu-button">
                    <svg class=" w-6 h-6 text-gray-500 hover:text-black" x-show="!showMenu" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                        <path d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>
        <!---Nav small screen--->
        <div class="hidden mobile-menu">
            <ul class="divide-y">
                <li><a href="../Vue/index.php?page=cocktail" class="block text-sm px-2 py-4 hover:text-black transition duration-200 ">Naviguation</a></li>
                <li><a href="../Vue/index.php?page=recettes" class="block text-sm px-2 py-4 hover:text-black transition duration-200 ">Recettes</a></li>
                <li><a href="../Vue/index.php?page=connexion" class="block text-sm px-2 py-4 hover:text-black transition duration-200 ">Espace de connexion</a></li>
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

    <!---Contenu dynamique--->
    <?= $contenu ?>   
     
    <footer class="flex bg-white justify-evenly items-center border-t-2 border-black">
        <div class="p-2 w-48 space-y-3">
            <span class="text-sm text-gray-400 mb-2">Réalisé par</span>
            <ul class="text-sm">
                <lic>Gaëtan Korpys</li>
                <li>Michael Ribeiro</li>
                <li>Quentin Mayer</li>
            </ul>
        </div>

        <div class="p-2">
            <a href="#" class="flex hover:text-black transition duration-700 transform hover:scale-110">
                <span class="hidden sm:flex text-base font-medium">Retourner au début</span>
                <span class="sm:hidden text-base font-medium">Remonter</span>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 animate-bounce" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7l4-4m0 0l4 4m-4-4v18" />
                </svg>
            </a>
        </div>

    </footer>
</body>

<script src="js/search_script.js"></script>

</html>