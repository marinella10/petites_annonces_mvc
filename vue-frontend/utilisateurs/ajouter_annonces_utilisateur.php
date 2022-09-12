

<h1 class="container alert alert-success text-center text-warning mt-3">AJOUTER ANNONCES</h1>

<div id="user-dashboard" class="container w-50 p-3">
    <form method="post" enctype="multipart/form-data" id="ajouter-annonce-form" class="animate__animated animate__backInDown shadow p-3">
        <div class="mb-3">
            <label for="nom_annonce"></label>
            <input type="text" name="nom_annonce" class="form-control" placeholder="Nom de votre annonce" id="nom_annonce" required>
        </div>

        <div class="mb-3">
            <label for="description_annonce"></label>
            <textarea name="description_annonce" class="form-control" placeholder="Description de votre annonce" id="description_annonce" required></textarea>
        </div>

        <div class="mb-3">
            <label for="prix_annonce"></label>
            <input type="number" step="any" name="prix_annonce" class="form-control" placeholder="Prix de votre annonce en €" id="prix_annonce" required/>
        </div>

        <div class="mb-3">
            <label for="date_depot"></label>
            <input type="date"  name="date_depot" value="<?= date("Y-m-d") ?>" class="form-control" id="date_depot" required/>
        </div>


        <div class="mb-3">
            <label for="categorie_id"></label>
            <select name="categorie_id" class="form-control">
                <?php
                afficherToutesCategories();
                ?>
            </select>
        </div>

        <input type="hidden" value="<?= $_SESSION['id_utilisateur'] ?>" name="id_utilisateur">

        <div class="mb-3">
            <label for="regions_id"></label>
            <select name="regions_id" class="form-control">
                <?php
                listerRegions()
                ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="photo_annonce"></label>
            <span class="d-flex justify-content-center">
                <input type="file"  name="photo_annonce" class="form-control" accept="image/gif, image/png, image/jpeg, image/svg, image/bmp, image/webp " placeholder="Photos 1 de votre annonce" id="photo_annonce1" required/>
            </span>
        </div>

        <div class="mb-3">
            <button name="btn_ajouter_annonce" class="mt-3 btn btn-info">Publier votre annonce</button>
        </div>
    </form>

</div>

