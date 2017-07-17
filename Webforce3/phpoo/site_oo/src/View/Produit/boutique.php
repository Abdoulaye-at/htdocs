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
