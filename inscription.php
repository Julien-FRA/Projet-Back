<?php include 'config/template/head.php'; ?>
<header>
    <?php include 'config/template/nav.php'; ?>
</header>
<main>
<section class="sign">
        <form action="" class="signup" method="post">
            <h1>Inscrivez-vous</h1>
            <?= $content; ?>
            <input type="name" name="name" id="name" class="inpt" placeholder="Your name">      
            <input type="email" name="email" id="email" class="inpt" placeholder="Your email">
            <input type="number" name="cd" id="cd" class="inpt" placeholder="Your postal code">
            <input type="number" name="tel" id="tel" class="inpt" placeholder="Your phone number">   
            <input type="password" name="password" id="password" class="inpt" placeholder="Your password">
            <input type="password" name="verifypassword" id="password" class="inpt" placeholder="Verify password">
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