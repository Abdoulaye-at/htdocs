<!DOCTYPE html>
<html>
  <body>

    <?php
    $cars = array(
      array("Mercedes","C63","AMG-GT"),
      array("BMW","X6","M6"),
      array("Audi","R8","RS7"),
      array("Nissan","Gtr","Juke")
      );

    for ($row = 0; $row < 4; $row++) {
      echo "<p><b>Row number $row</b></p>";
      echo "<ul>";
      for ($col = 0; $col < 3; $col++) {
        echo "<li>".$cars[$row][$col]."</li>";
      }
      echo "</ul>";
    }
    ?>

  </body>
</html>
