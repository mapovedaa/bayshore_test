<!DOCTYPE html>
<html>
	<head>
		<title>Phalcon PHP Framework</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	</head>
	<body>
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="container-fluid">
				<a class="navbar-brand" href="#">Dealer Car</a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
					<div class="navbar-nav">
						<a class="nav-link" aria-current="page" href="#">Home</a>
						<?= $this->tag->linkTo(["car_make", "Fabricantes", "class" => "nav-link",]) ?>
						<?= $this->tag->linkTo(["car_model", "Modelos", "class" => "nav-link",]) ?>
						<?= $this->tag->linkTo(["car_generation", "Generacion", "class" => "nav-link",]) ?>
					</div>
				</div>
			</div>
		</nav>
		<div class="container">
			{{ content() }}			
		</div>
	</body>
</html>