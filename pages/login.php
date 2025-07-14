<section class="d-flex flex-column justify-content-center align-items-center" style="min-height:90vh;">
    <div class="col-10 col-md-5 m-auto p-4 rounded-4 form-login">
        <h1 class="text-center mb-2">Login</h1>
        <form action="traitement_login.php" class="d-flex flex-column align-items-center" method="post">
            <div class="mb-3 w-100">
                <label for="" class="form-label">Email address</label>
                <input type="email" name="email" class="form-control" id="" placeholder="Email" required>
            </div>
            <div class="mb-3 w-100">
                <label for="" class="form-label">Password</label>
                <input type="password" name="mdp" class="form-control" id="" placeholder="Password" required>
            </div>
            <p>You don't have an account yet? <a href="model.php?page=inscription.php" class="link-blue">Sign up</a></p>
            <div class="d-grid gap-2">
                <input type="submit" value="Login" class="bouton rounded-5 fw-bold fs-5 p-1 ps-5 pe-5 btn btn-primary">
            </div>
        </form>
    </div>
</section>