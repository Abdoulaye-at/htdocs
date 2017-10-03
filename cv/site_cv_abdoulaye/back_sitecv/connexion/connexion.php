<!DOCTYPE html>

<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Authentification</title>
    <link type="text/css" rel="stylesheet" href="../assets/css/style.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>

<body>
    <?php $pdo = new PDO('mysql:host=localhost;dbname=sitecvbdd', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8')); ?>
    <form action="authentification.php" method="post">
      <input type="email" name="email" placeholder="votre email" required>
      <br>
      <input type="password" name="mdp" placeholder="votre mot de passe" required>
      <input type="submit" name="connexion" value="se connecter" >
    </form>
</body>
</html>
