<div class="mt-3 container p-5 w-25 animate__animated animate__backInDown">
    <div class="card shadow p-2" id="form-register-user">
        <div class="card-body">
            <div class="card-title text-center">
                <h3 class="text-danger">Inscription Administrateur</h3>
            </div>
            <div class="card-text">
                <form method="post">
                    <div class="mb-3">
                        <label for="email_utilisateur">Votre email</label>
                        <input type="email" name="email_admin" placeholder="Votre email" id="email_utilisateur" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="password_utilisateur">Votre mot de passe</label>
                        <input type="password" name="password_admin" placeholder="Votre mot de passe" id="password_utilisateur" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="repeat_password">Confirmer le mot de passe</label>
                        <input name="password_repeter" type="password" placeholder="Confirmer mot de passe" id="repeat_password" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <button name="btn-valide-inscription-admin" type="submit" class="btn btn-outline-success">AJOUTER</button>
                        <a href="accueil" class="btn btn-danger">Annuler</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
