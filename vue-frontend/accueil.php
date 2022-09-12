<!--BLOC DE RECHERCHE-->
<div class="mt-3 container animate__animated animate__backInDown shadow">
    <div class="text-center">
        <img src="image/logo2.jpg" alt="petite-annonce.com" title="petite-annonce.com">
        <h3 class="text-secondary">
            Des millions de petites annonces et autant d’occasions de se faire plaisir
        </h3>
    </div>
    <!--CARTE DE FRANCE-->
    <div class="text-center pt-5">
        <div id="carte-accueil" class="row">
            <div class="col s12 m12 l12 center-align">
                <h2 class="text-primary">VOTRE REGION</h2>
                <link rel="stylesheet" href="carte/style.css">
                <script src="carte/jquery-1.11.1.min.js"></script>
                <script src="carte/France-map.js"></script>
                <script>
                    francefree();
                </script>
            </div>
        </div>
    </div>

    <!--FIN CARTE FRANCE-->


    <!-- AFFICHER ANNONCES RANDOM -->

    <div class="text-center pt-5">
        <!--Le formulaire de recherche par mot cle-->
        <h3 class="text-primary pt-3">RECHERCHER UNE ANNONCES</h3>
        <!--Formulaire methode post permet l'utilisation de la super Globale $_POST['attribut name']-->
        <form method="post">
            <!--$_POST['recherche'] est utilisé dans le modele pour la requète SQL-->
            <input type="search" class="input-field mt-3" placeholder="Rechercher" name="recherche" required>
            <!--$_POST['btn-search-text'] est utilisé dans le router pour appeler la fonction du controleur qui appel la methode du modele-->
            <button type="submit" class="btn green text-warning" name="btn-search-text"><strong>Rechercher</strong>
            </button>
        </form>

    </div>


