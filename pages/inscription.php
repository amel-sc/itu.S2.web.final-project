<section class="d-flex flex-column justify-content-center align-items-center" style="min-height:90vh;">
    <div class="col-10 col-md-5 m-auto p-4 rounded-4 form-login">
        <h1 class="text-center mb-2">Sign Up</h1>
        <form action="traitement_inscription.php" class="d-flex flex-column align-items-center" method="post">
            <div class="mb-3 w-100">
                <label for="" class="form-label">Name</label>
                <input type="text" name="nom" class="form-control" id="" placeholder="Name" required>
            </div>
            <div class="mb-3 w-100">
                <label for="" class="form-label">Birthday</label>
                <input type="date" name="birth_date" class="form-control" id="" placeholder="Birhtday" required>
            </div>
            <label for="" class="form-label">Gender</label>
            <select class="form-select" name="genre" aria-label="Default select example">
                <option value="M">Male</option>
                <option value="F">Female</option>
            </select>
            <div class="mb-3 w-100">
                <label for="" class="form-label">City</label>
                <input type="text" name="ville" class="form-control" id="" placeholder="City" required>
            </div>
            <div class="mb-3 w-100">
                <label for="" class="form-label">Email address</label>
                <input type="email" name="email" class="form-control" id="" placeholder="Email" required>
            </div>
            <div class="mb-3 w-100">
                <label for="" class="form-label">Password</label>
                <input type="password" name="mdp" class="form-control" id="" placeholder="Password" required>
            </div>
            <p>You already have an account? <a href="model.php?page=login.php" class="link-blue">Log in</a></p>
            <div class="d-grid gap-2">
                <input type="submit" value="Sign Up" class="bouton rounded-5 fw-bold fs-5 p-1 ps-5 pe-5 btn btn-primary">
            </div>
        </form>
    </div>
</section>