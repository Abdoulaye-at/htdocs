<?php

$pdo = new PDO('mysql:host=localhost;dbname=site', 'root', '');
$categories = $pdo -> query("SELECT DISTINCT categorie FROM produit");

?>


<p class="lead">Vêtements</p>
<div class="list-group">
<a href="?categorie=all" class="list-group-item"> Tous </a>

<?php while($cat = $categories -> fetch(PDO::FETCH_ASSOC)) : ?>

	<a href="?categorie=" class="list-group-item"><?= $cat['categorie'] ?></a><br/>
	
<?php endwhile; ?>

</div>