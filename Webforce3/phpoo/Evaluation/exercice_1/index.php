<?php

  // ~ ~ ~ ~ ~ ~ //
 // EXERCICE 1 //
// ~ ~ ~ ~ ~ ~ //

// écrire la requête SQL permettant d’afficher un article (id = 10) et son auteur à l’aide d’une jointure.

" SELECT * FROM articles
  INNER JOIN users ON users.id = articles.id_user
  WHERE articles.id = 10 AND articles.id_user = users.id
";
