<?php include 'config/template/head.php'; ?>
<header>
    <?php include 'config/template/nav.php'; ?>
</header>
<main>
<section class="sign">
        <form action="" class="signup">
            <h1>Connectez-vous</h1>
            <input type="name" name="name" id="name" class="inpt" required="required" placeholder="Your name">      
            <input type="password" name="password" id="password" class="inpt" required="required" placeholder="Your password">
            <div class="submit-wrap">
                <input type="submit" value="Se connecter" class="submit">
            </div>
        </form>
</section>
</main>
<hr>
<?php include 'config/template/footer.php'; ?>