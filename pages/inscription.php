<section>
     <div class="col-10 m-auto">
        <h2 class="text-center mb-2">Sign Up</h2>
        <form action="traitement_inscription.php" method="post">
            <div class="mb-3">
                <label for="" class="form-label">Name</label>
                <input type="text" name="nom" class="form-control" id="" placeholder="Name" required>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Birthday</label>
                <input type="date" name="birth_date" class="form-control" id="" placeholder="Birhtday" required>
            </div>
            <label for="" class="form-label">Gender</label>
            <select class="form-select" name="genre" aria-label="Default select example">
                <option value="M">Male</option>
                <option value="F">Female</option>
            </select>
            <div class="mb-3">
                <label for="" class="form-label">City</label>
                <input type="text" name="ville" class="form-control" id="" placeholder="City" required>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Email address</label>
                <input type="email" name="email" class="form-control" id="" placeholder="Email" required>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Password</label>
                <input type="password" name="mdp" class="form-control" id="" placeholder="Password" required>
            </div>
            <div class="d-grid gap-2">
                <input type="submit" value="Sign Up" class="btn btn-primary">
            </div>
        </form>
    </div>
</section>