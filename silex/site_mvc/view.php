
<!DOCTYPE html>
<html>
<head>

  <meta charset="utf-8">
	<title>Ma Boutique</title>

  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/shop-homepage.css">
  <script src="js/jquery.js"> </script>
  <script src="js/bootstrap.min.js"> </script>

	<!-- AJOUTER LE LIEN CSS SUIVANT POUR LE DETAIL PRODUIT-->
  <link rel="stylesheet" href="css/portfolio-item.css">

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
  				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false" aria-controls="navbar">
  					<span class="sr-only">Toggle navigation</span>
  					<span class="icon-bar"></span>
  					<span class="icon-bar"></span>
  					<span class="icon-bar"></span>
  				</button>

  				<!-- La marque -->
          <a class="navbar-brand" href="index.php">Ma Boutique</a>
	      </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li><a href="">Boutique</a></li>
            <li><a href="">Inscription</a></li>
            <li><a href="">Connexion</a></li>
            <li><a href="">Panier</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container" style="min-height: 80vh;">

<!-- ---------------------------------------------- -->
<div class="row">
  <div class="col-md-3">
    <p class="lead">Vêtements</p>
    <div class="list-group">
      <a href="">Tous</a>
      <?php foreach($categories as $cat) : ?>
        <a class="list-group-item" href=""><?= $cat['categorie'] ?></a>
      <?php endforeach; ?>
    </div>
  </div>

  <div class="col-md-9">
    <div class="row">
      <?php foreach ($produits as $produit) : ?>
        <div class="col-sm-4">
          <div class="thumbnails">
            <a href=""><img src="photo/<?= $produit['photo'] ?>" width="130" height="100" alt=""></a>


          <div class="caption">
            <h4 class="pull-right"> <?php echo $produit['prix'] ?> €</h4>
            <h4><?= $produit['titre'] ?></h4>
            <p><?= $produit['description'] ?></p>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>
<!-- ------------------------------------------------ -->
</div>
<!-- /.container -->

<div class="container">

    <hr>

    <!-- Footer -->
    <footer>
        <div class="row">
            <div class="col-lg-12">
                <p>Copyright &copy; Ma Boutique - 2017</p>
            </div>
        </div>
    </footer>

</div>
<!-- /.container -->


</body>

</html>
