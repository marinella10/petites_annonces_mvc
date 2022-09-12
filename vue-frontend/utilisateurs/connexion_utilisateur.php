<div class="mt-3 container p-5 w-50 animate__animated animate__backInDown">
    <div class="card shadow p-2" id="form-register-user">
        <div class="card-body">
            <div class="card-title">
                <h1 class="text-info">Connexion</h1>
            </div>
            <div class="card-text">
                <form method="post">
                    <div class="mb-3">
                        <label for="email_utilisateur"></label>
                        <input type="email" name="email_utilisateur" placeholder="Votre email" id="email_utilisateur" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="password_utilisateur"></label>
                        <input type="password" name="password_utilisateur" placeholder="Votre mot de passe" id="password_utilisateur" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="password_utilisateur"></label>
                        <a href="">Mot de passe oublier ?</a>
                    </div>
                    <div class="mb-3">
                        <select name="role" class="form-control">
                            <option value="utilisateur">Utilisateur</option>
                            <option value="administrateur">Administrateur</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <button name="btn-valide-connexion" type="submit" class="btn btn-outline-success">Connexion</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

