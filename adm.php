<?php
  include("conexion.php");
  session_start();
  $id=$_SESSION['id'];
  if($id==false){
    header("location: index.php");
  }
?>  
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>hoteles</title>
	<style>
		col-lg-3 > .miEstilos{
			position: ;
			z-index: 1;
			right: 1.5rem;
			top: 1rem;
			font-size: 3rem;
			line-height: 3rem;
			color: #1abc9c;
			opacity: 1;
			width:130px;
			height:130px;
		}
		.miEstilos:hover{
			position: ;
			z-index: 1;
			right: 1.5rem;
			top: 1rem;
			font-size: 3rem;
			line-height: 3rem;
			color: #1abc9c;
			opacity: 0.5;
			
		}
	</style>
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
      <a class="navbar-brand js-scroll-trigger" href="adm.php">hoteles</a>
      <ul class="navbar-nav ml-auto">
          <li class="nav-item mx-0 mx-lg-1">
            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="salir.php">SALIR</a>
          </li>
      </ul>
    </div>
  </nav>
  <!-- Portfolio Section -->
<section class="page-section portfolio" id="portfolio">
    <div class="container"><br>
		<!-- Portfolio Section Heading -->
 
		<h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">BIENVENIDO!</h2><br>
		<h4 class="text-center" id="bienvenido"></h4>

		<!-- Icon Divider -->
		<div class="divider-custom">
			<div class="divider-custom-line"></div>
		<!--estrella-->
		</div>
		<div class="divider-custom-line"></div>
		
	</div>
		<!-- Fila de botones -->
		<div class="container">
		<div class="row" id="botones">           
		</div>
		</div>
		<!-- /.row -->
    
</section>
<section class="page-section text-center" >
    <div class="container pt-4" id="contact">

      <!-- Formulario agregar HABITACION -->
		<div class="row">
			<div class="col-lg-8 mx-auto">
				<!-- Formulario -->
				<form id="frmajax"  method="POST"  novalidate="novalidate" enctype="multipart/form-data">
						<div class="input-group input-group-lg ">
							<input type="text" name="nombre" class="form-control rounded" id="nombre" placeholder="NOMBRE DE HABITACION" required autofocus="autofocus">
						</div>
						<div class="input-group input-group-lg ">      
							<input type="number" name="precio" class="form-control rounded" id="precio" placeholder="PRECIO DE HABITACION" required>
							<input type="hidden" name="idhoteles" id="idhoteles" value="<?php echo $id;?>">
						</div>
						<div class="input-group">
							<div class="custom-file">
								<input type="file" class="custom-file-input" name="archivo[]" id="agregar-imagen" multiple="" aria-describedby="inputGroupFileAddon04" lang="es">
								<label class="custom-file-label text-left" for="inputGroupFile04" id="label-agregarfotos">Seleccione las imagenes...</label>
							</div>
						</div>
						<br>
						<div class="form-group" id="boton-agregar">
							<button type="submit" class="btn btn-primary btn-xl" id="btnagregar">AGREGAR HABITACION</button>
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
          <a class="btn btn-outline-light btn-social mx-1" href="#">
            <i class="fab fa-fw fa-facebook-f"></i>
          </a>
          <a class="btn btn-outline-light btn-social mx-1" href="#">
            <i class="fab fa-fw fa-twitter"></i>
          </a>
          <a class="btn btn-outline-light btn-social mx-1" href="#">
            <i class="fab fa-fw fa-linkedin-in"></i>
          </a>
          
        </div>

      </div>
    </div>
  </footer>
	<div id="mensaje"></div>
  <!-- Copyright Section -->
  <section class="copyright py-4 text-center text-white">
    <div class="container">
      <small>Copyright 2019 todos los derechos reservados.</small>
    </div>
  </section>


  <!-- Portfolio Modal 1 -->
<div class="portfolio-modal modal fade" id="hotel1" tabindex="-1" role="dialog" aria-labelledby="portfolioModal1Label" aria-hidden="true">	
</div>


  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  
  <!-- Plugin JavaScript -->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

</body>
</html>
<script type="text/javascript" src="adm.js"></script>