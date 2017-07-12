<?php

include 'class/voiture.php';

$bugatie = new voiture( 'Volkswagen', 'bon' );

foreach ($bugatie->getInfos() as $key ) {
  echo '<p>'.$key.'</p>';
}
