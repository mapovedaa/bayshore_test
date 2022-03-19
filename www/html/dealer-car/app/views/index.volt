<!DOCTYPE html>
<html>
	<head>
		<title>Phalcon PHP Framework</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	</head>
	<body>
		<div class="container">
			<div>
				<ul class="nav justify-content-center">
					<li class="nav-item">
						<a class="nav-link" href="car_make">Fabricantes</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="car_model">Modelos</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="car_serie">Series</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="car_trim">Niveles de ajuste</a>
					</li>
				</ul>
			</div>
			{{ content() }}			
		</div>
	</body>
</html>