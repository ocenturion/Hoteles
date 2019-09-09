<!DOCTYPE html>
<html lang="es">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>hoteles</title>

  <!-- Custom fonts for this theme -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">
  <!-- Theme CSS -->
  <link href="css/freelancer.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Navigation -->
<nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
    <div class="container">

		<a class="navbar-brand js-scroll-trigger" href="index.php">hoteles</a>
		<img src="" width="30" height="30" class="d-inline-block align-top" alt="">
		<button class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
			Menu
			<i class="fas fa-bars"></i>
		</button>
		<div class="collapse navbar-collapse" id="navbarResponsive">
			<ul class="navbar-nav ml-auto">
				<li class="nav-item mx-0 mx-lg-1">
					<a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="quienes_somos.php">¿QUIENES SOMOS?</a>
				</li>
				<li class="nav-item mx-0 mx-lg-1">
					<a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#portfolio">HOTELES</a>
				</li>
			  
				<li class="nav-item mx-0 mx-lg-1">
					<a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#contact">LOG IN</a>
				</li>
			</ul>
		</div>
    </div>
</nav>

<!-- Masthead -->
<header class="bg-primary text-white text-center pt-5" id="portfolio">
    <section class="page-section portfolio">
		<div class="container">
		  <!-- Portfolio Section Heading -->
			<h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">HOTELES</h2>
			<!-- Icon Divider -->
			<div class="divider-custom">
				<div class="divider-custom-line"></div>
				<!--<div class="divider-custom-icon">
				<i class="fas fa-star"></i>-->
			</div>
			<div class="divider-custom-line"></div>
		

      

		<!-- Portfolio Grid Items -->
		<div class="row" id="hoteles">
		</div>
		
		<div class="row">
			<div class="col-lg-8 mx-auto">
				<!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
				<form  action="" method="POST" name="sentMessage" novalidate="novalidate">
					<div class="input-group mb-3">
						<input type="text" class="form-control" id="buscar" placeholder="BUSCAR POR NOMBRE DE HOTEL" aria-label="Recipient's username" aria-describedby="button-addon2">
						<div class="input-group-append">
							<button class="btn btn-outline-secondary" type="button" id="button-addon2">BUSCAR</button>
						</div>
					</div>
				</form>
			</div>
		</div>
		</div>
		<!-- /.row -->
	</section>
</header>

  <!-- Contact Section -->
<section class="page-section text-center" >
	<div class="container pt-4" id="contact">
	<br>
		<!-- Contact Section Heading -->
		<h2 class="page-section-heading text-center text-uppercase text-secondary mb-0" >LOG IN</h2>

		<!-- Icon Divider -->
		<div class="divider-custom">
			<div class="divider-custom-line"></div>
			<!--estrella-->
        </div>
        <div class="divider-custom-line"></div>

      <!-- Contact Section Form -->
		<div class="row">
			<div class="col-lg-8 mx-auto">
				<!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
				<form  action="login.php" method="POST" name="sentMessage" novalidate="novalidate">
				
					<div class="input-group input-group-lg">
						<div class="input-group-prepend">
							<span class="input-group-text" id="inputGroup-sizing-lg">EMAIL</span>
						</div>
						<input name="email" type="email" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg"  placeholder="telodigo@telodigo.com"> 
					</div><br>
					<div class="input-group input-group-lg">
						<div class="input-group-prepend">
							<span class="input-group-text" id="inputGroup-sizing-lg">CONTRASEÑA</span>
						</div>
						<input name="contrasena"  type="password" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
					</div><br>
					<div class="form-group">
					  <button type="submit"  class="btn btn-primary btn-xl">INGRESAR</button>
					</div>
				</form>
			</div>
		</div>
    </div>
    <br>
    
  <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
	<div class="scroll-to-top d-lg-none position-fixed ">
		<a class="js-scroll-trigger d-block text-center text-white rounded" href="#page-top">
			<i class="fa fa-chevron-up"></i>
		</a>
	</div>
</section>
  
  <!-- Footer -->
<footer class="footer text-center">
    <div class="container">
		<div class="row">
			<!-- Footer Location -->
			<div class="col-lg-4 mb-5 mb-lg-0">
				<h4 class="text-uppercase mb-4"><!--locacion--></h4>
				<p class="lead mb-0"><!--DIRECCION--></p>
			</div>
			<!-- Footer Social Icons -->
			<div class="col-lg-4 mb-5 mb-lg-0">
				<h4 class="text-uppercase mb-4">hoteles</h4>
				<a class="btn btn-outline-light btn-social mx-1" href="" target="_blank">
					<i class="fab fa-fw fa-facebook-f" ></i>
				</a>
				<a class="btn btn-outline-light btn-social mx-1" href=""target="_blank">
					<i class="fab fa-fw fa-twitter"></i>
				</a>
				<a class="btn btn-outline-light btn-social mx-1" href="#" target="_blank">
					<i class="fab fa-fw fa-linkedin-in"></i>
				</a>
			</div>
		</div>
    </div>
</footer>

  <!-- Copyright Section -->
  
<section class="copyright py-4 text-center text-white">
    <div class="container">
      <small>Copyright 2019 todos los derechos reservados.</small>
    </div>
</section>

  <!-- Portfolio Modals -->

  <!-- Portfolio Modal 1 -->
	<div class="portfolio-modal modal fade" tabindex="-1" id="hotel" role="dialog" aria-labelledby="portfolioModal1Label" aria-hidden="true">
		<div class="modal-dialog modal-xl" role="document">
			<div class="modal-content">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<div class="modal-body text-center">
					<div class="container">
						<div class="row justify-content-center">
							<div class="col-lg-8" id="contenido">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Portfolio Modal 2-->
	<div class="portfolio-modal modal fade" tabindex="-1" id="f0t0" role="dialog" aria-labelledby="portfolioModal1Label" aria-hidden="true">
		<div class="modal-dialog modal-xl" role="document">
			<div class="modal-content">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close" id="cerrarCarousel">
					<span aria-hidden="true">&times;</span>
				</button>
				<div class="modal-body text-center">
					<div class="container">
						<div class="row justify-content-center">
							<div class="col-lg-8" id="contenido2">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for this template -->
  <script src="js/freelancer.min.js"></script>

</body>
</html>
<script src="index.js"></script>