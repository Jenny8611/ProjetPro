<!DOCTYPE html>
<html lang="en">
<!--
	Stellar by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="assets/css/main.css" />
	<noscript>
		<link rel="stylesheet" href="assets/css/noscript.css" />
	</noscript>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/bootstrap.css">

	<title>ParentSchool - Accueil</title>
</head>


<body class="is-preload">

	<!----- Wrapper ----->
	<div id="wrapper">
		<?php include_once('includes/header.php'); ?>

		<!-- NAV -->
		<nav class="navbar navbar-expand-lg navbar-light bg-dark sticky-top">
			<div class="container-fluid">
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarCollapse">

					<!-- Link gauche -->
					<ul class="navbar-nav mr-auto">

						<li class="nav-item">
							<a class="nav-link" href="#intro">Introduction</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#proposition">Proposition</a>
						</li>
					</ul>

					<!-- link central -->
					<ul class="navbar-nav auto">
						<li class="nav-item">
							<a class="nav-link" href="#forum">Forum</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#footer">Contacts</a>
						</li>
					</ul>

					<!-- link droite -->
					<ul class="navbar-nav ml-md-auto">
						<li class="nav-item">
							<a class="nav-link" href="login.php">Se connecter</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="signup.php">Créer un compte</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>

		<!----- Main ----->
		<div id="main">

			<!----- Introduction ----->
			<div class="row justify-content-center">
				<div class="container-fluid">
					<div class="p-5 mb-4 bg-light rounded-3">

						<section id="intro" class="main">
							<div class="content">
								<header class="major">
									<h1>Ensemble pour nos enfants</h1>
								</header>
								<p>Proposer aux parents d’élèves un système de
									communication rapide, efficace et accessible en tout
									temps, entre eux ou avec les professeurs concernés
									afin qu’ils puissent s’organiser sur les réunions ou
									tout autre sujet en rapport avec les enfants comme
									d’éventuel système de garde, organiser/alterner les
									trajets à l’école entre parents, organiser les
									grèves/vacances scolaires ou simplement notifier des absences.
								</p>
							</div>
						</section>
					</div>
				</div>
			</div>

			<!----- PROPOSITIONS ----->
			<!-- First Section -->
			<div class="col-auto p-5 mb-4 bg-light rounded-3">
				<div class="container-fluid">
					<section id="proposition" class="main special">
						<header class="major">
							<h2>Nous vous proposons</h2>
						</header>
						<ul class="features">
							<li>
								<span class="image"><img src="assets/css/images/organisation.jpg" alt="" /></span>
								<h3 sytle="text-align:center;">Organisation</h3>
								<p>Une réunion à prévoir ? <br /> Un vide grenier ?</p>
							</li>
							<li>
								<span class="image"><img src="assets/css/images/anticipation.jpg" alt="" /></span>
								<h3 sytle="text-align:center;">Anticipation</h3>
								<p>Votre enfant est malade ? La maîtresse peut être prevenue ! Un soucis de voiture ? D'autre
									parents peuvent vous aider !</p>
							</li>
							<li>
								<span class="image"><img src="assets/css/images/entraide.jpg" alt="" /></span>
								<h3 sytle="text-align:center;">Entraide</h3>
								<p>Besoin d'un renseignement sur les devoirs donnés car votre enfant était absent ? Un devoir incompris ?</p>
							</li>
						</ul>
						<footer class="major">
							<ul class="actions special">
								<li><a href="proposition.html" class="button">Et encore +</a></li>
							</ul>
						</footer>
					</section>
				</div>
			</div>

			<!----- FORUM ----->
			<!-- Second Section -->
			<div class="col-auto p-5 mb-4 bg-light rounded-3">
				<div class="container-fluid">
					<section id="forum" class="main special">
						<header class="major">
							<h2>Forum</h2>
						</header>
						<p>
							&bull; Découvrer les sujets qui vous intéresse !
							<br />
							<br />
							&bull; Discuter avec d'autres parents !
							<br />
							<br />
							<br />
						</p>
						<ul class="features">
							<li>
								<span class="image"><a href="./signup.php"><img src="assets/css/images/compte.png" alt="" /></a></span>
								<br>
								<br>
								<h3><a href="./signup.php">Créer un compte</h3></a>
								<br>
								<p>Rester en contact 24h/24, 7j/7 avec d'autres parents ou la maîtresse !</p>
							</li>

							<li>
								<span class="image"><a href="./login.php"><img src="assets/css/images/se_connecter.png" alt="" /></a></span>
								<br>
								<br>
								<h3><a href="./login.php">Se connecter</h3></a>
								<br>
								<p>Connectez-vous pour voir les derniers sujets ou en créer un !</p>
							</li>

							<li>
								<span class="image"><a href="./formcontact/formcontact.php"><img src="assets/css/images/question.png" alt="" /></a></span>
								<br>
								<br>
								<h3><a href="./formcontact/formcontact.php">Des questions ?</h3></a>
								<br>
								<p>Nous sommes là ! Faîtes-nous part de vos interrogations ! Ou même d'éventuelles idées, suggestions, améliorations, etc. !</p>
							</li>
						</ul>
					</section>
				</div>
			</div>

		</div><!-- fin div main -->
	</div><!-- fin div wrapper -->

	<!----- CONTACT ----->
	<!-- Footer -->
	<?php include('includes/footer.php') ?>

</body>

<!----- CHAT ----->
<!-- Third Section -->
<!-- <section id="chat" class="main special">
				<header class="major">
					<h2>Chat</h2>
				</header>
				<ul class="features">
					<li>
						<span class="image"><a href="./signup.php" target="_blank"><img src="images/chat.jpg" alt="" /></a></span>

						<br>
						<h3><a href="./signup.php" target="_blank">Inscrivez-vous !</h3></a>
						<br>
						<p>&#9998; Rester en contact avec d'autres parents 24h/24, 7j/7 en temps réel !</p>
					</li>
					<li>
						<span class="image"><a href="./login.php" target="_blank"><img src="images/chat_1.png" alt="" /></a></span>

						<br>
						<h3><a href="./login.php" target="_blank">Connectez-vous</h3></a>
						<br>
						<p>&#9998; Vos soucis n'en seront plus avec ce système de communication rapide et efficace !</p>
					</li>
					<li>
						<span class="image"><a href="./formcontact/formcontact.php" target="_blank"><img src="images/question.png" alt="" /></a></span>
						<br>
						<br>
						<h3><a href="./formcontact/formcontact.php" target="_blank">Des questions ?</h3></a>
						<br>
						<p>Nous sommes là ! Faîtes-nous part de vos interrogations ! Ou même d'éventuelles idées,
							suggestions, améliorations, etc. !</p>
					</li>
				</ul>
				<footer class="major">
					<ul class="actions special">
						<li><a href="forum.html" target="_blank" class="button">Lire +</a></li>
					</ul>
				</footer>
			</section> -->

<!-- </div> -->
<!-- fin div main -->
<!-- </div> -->
<!-- fin div wrapper -->

</html>