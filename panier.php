<?php include 'config/template/head.php'; ?>
<header>
    <?php include 'config/template/nav.php'; ?>
</header>
<main>
<section class="page-panier">
    <table class="table-prdt">
        <thead class="thead-prdt">
            <tr class="tr-prdt">
                <th class="th-prdt"></th>
                <th class="th-prdt desc">Description</th>
                <th class="th-prdt">Prix</th>
                <th class="th-prdt">Retirer</th>
            </tr>
        </thead>
        <tbody class="tbody-prdt">
            <tr class="tr-info-prdt">
                <td class="td-prdt img"><img src="asset/img/virus.png" alt=""></td>
                <td class="td-prdt desc">Ce terme générique désigne la capacité d’un programme 
    informatique à infecter plusieurs fichiers sur un ordinateur.</td>
                <td class="td-prdt prix">$499</td>
                <td class="td-prdt retirer"><button>Supprimer</button></td>
            </tr>
        </tbody>
    </table>
    <table class="table-info">
        <thead class="thead-info">
            <tr class="tr-info">
                <th class="th-info">Prix livraison</th>
                <th class="th-info">Prix total</th>
                <th class="th-info">Commander</th>
            </tr>
        </thead>
        <tbody class="tbody-info">
            <tr class="tr-info-desc">
                <td class="td-info">$5</td>
                <td class="td-info">$504</td>
                <td class="td-prdt retirer td-info"><button>Paiement</button></td>
            </tr>
        </tbody>
    </table>
</section>
</main>
<hr>
<?php include 'config/template/footer.php'; ?>