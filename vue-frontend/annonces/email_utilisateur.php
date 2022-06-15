<div id="email-form-contact" class="mt-3 container w-50 animate__animated animate__backInDown shadow p-3">
    <h1 class="alert alert-warning text-center mt-3">CONTACTER LE VENDEUR</h1>
    <form method="post">
        <h2 class="text-success">Contacter le vendeur :  <?= $get_user['email_utilisateur'] ?></h2>

        <div class="form-group">
            <label for="email_visiteur">Votre email</label>
            <input type="text" class="form-control" name="email_visiteur" id="email_visiteur">
        </div>

        <div class="form-group">
            <label for="message_visiteur">Votre message</label>
            <textarea rows="5" type="text" class="form-control" name="message_visiteur" id="message_visiteur"></textarea>
        </div>

        <div class="form-group">

            <form method="post">
                <button type="submit" class="mt-3 btn btn-outline-danger" name="btn-email-vendeur">Envoyer</button>
            </form>

        </div>
    </form>
</div>

