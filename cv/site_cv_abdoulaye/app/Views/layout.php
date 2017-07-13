<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title><?= $this->e($title) ?></title>
	<link rel="stylesheet" href="<?= $this->assetUrl('css/style.css') ?>">
	<link rel="stylesheet" href="<?= $this->assetUrl('js/script.js') ?>">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
</head>

<body>
	<div class="container">
		<header>
			<h1>W :: <?= $this->e($title) ?></h1>
		</header>

		<nav>
			<ul>
				<li><a href="<?=$this->url('default_home');?>">Home</a></li>
				<li><a href="<?=$this->url('default_competences');?>">Compétences</a></li>
				<li><a href="<?=$this->url('default_etudes_exp');?>">Études / Exp</a></li>
				<li><a href="<?=$this->url('default_portfolio');?>">Portfolio</a></li>
				<li><a href="<?=$this->url('default_a_propos');?>">A propos</a></li>
				<li><a href="<?=$this->url('default_contact');?>">Contact</a></li>
			</ul>
		</nav>

		<section>
			<?= $this->section('main_content') ?>
		</section>

		<footer>
		</footer>
	</div>
</body>
</html>
