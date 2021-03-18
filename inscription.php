<?php include 'config/template/head.php'; ?>

<?php include 'config/template/nav.php'; ?>

<main>
    <section class="sign">
        <form class="signup" method="post">
            <h1>Inscrivez-vous</h1>
            <?= $content; ?>
            <input type="text" name="name" class="inpt" placeholder="Your name">
            <input type="email" name="email" class="inpt" placeholder="Your email">
            <input type="number" name="cd" class="inpt" placeholder="Your postal code">
            <input type="number" name="tel" class="inpt" placeholder="Your phone number">
            <input type="password" name="password" class="inpt" placeholder="Your password">
            <input type="password" name="verifypassword" class="inpt" placeholder="Verify password">
            <div class="sign-genre">
                <label for="homme">Homme</label>
                <input type="radio" name="genre" id="homme" class="inpt" value="homme">
                <label for="femme">Femme</label>
                <input type="radio" name="genre" id="femme" class="inpt" value="femme">
                <label for="autre">Autres</label>
                <input type="radio" name="genre" id="autre" class="inpt" value="autre">
            </div>
            <div class="submit-wrap">
                <input type="submit" value="Envoyer" name="envoyer" class="submit">
                <a href="#" class="more">Termes et conditions</a>
            </div>
        </form>
    </section>
</main>
<hr>
<?php include 'config/template/footer.php'; ?>