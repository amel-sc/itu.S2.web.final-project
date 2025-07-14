<section>
    <form action="traitement_inscription.php" method="post">
        <input type="text" name="nom" placeholder="Name" required>
        <input type="date" name="birth_date" placeholder="Birthday" required>
        <select name="genre" id="">
            <option value="M">Male</option>
            <option value="F">Female</option>
        </select>
        <input type="text" name="ville" placeholder="City" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="mdp" placeholder="Password" required>
        <input type="submit" value="Sign Up">
    </form>
</section>