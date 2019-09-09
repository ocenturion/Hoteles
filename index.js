$(document).ready(function(){
	obtenerHoteles();
	//funcion para traer hoteles
	function obtenerHoteles(){
		$.ajax({
			url:'index-obtenerHoteles.php',
			type:'GET',
			success: function(respuesta2){
				//console.log(respuesta2);
				let admListarHabitacion= JSON.parse(respuesta2);
				let hoteles='';
				
				admListarHabitacion.forEach(elemento =>{
						hoteles+=`
						<div class="col-md-6 col-lg-4 listarHabitacionesDisp" id="${elemento.id}" nombre="${elemento.nombre}" precio="${elemento.precio}">
						  <div class="portfolio-item mx-auto" data-toggle="modal" data-target="#hotel">
							<div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
							  <div class="portfolio-item-caption-content text-center text-white">
								<i class="fas fa-plus fa-3x"></i>
							  </div>
							</div>
							<img class="img-thumbnail" src="img/portfolio/${elemento.imagen}" alt="${elemento.imagen}" width="480px" height="360px">
						  </div>
						</div>`
				});
				$('#hoteles').html(hoteles);
			}
		});
	}
	
	// Boton buscar
	$('#buscar').keyup(function(){
		if($('#buscar').val()){
			let busca= $('#buscar').val();
			//console.log(busca);
			$.ajax({
				url:'index-buscarHoteles.php',
				type:'POST',
				data:{busca},
				success: function(respuesta){
					let admListarHabitacion= JSON.parse(respuesta);
					let hoteles='';
					admListarHabitacion.forEach(elemento =>{
						hoteles+=`
							<div class="col-md-6 col-lg-4 listarHabitacionesDisp" id="${elemento.id}" nombre="${elemento.nombre}" precio="${elemento.precio}">
							  <div class="portfolio-item mx-auto" data-toggle="modal" data-target="#hotel">
								<div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
								  <div class="portfolio-item-caption-content text-center text-white">
									<i class="fas fa-plus fa-3x"></i>
								  </div>
								</div>
								<img class="img-thumbnail" src="img/portfolio/${elemento.imagen}" alt="${elemento.imagen}">
							  </div>
							</div>`
					});
					$('#hoteles').html(hoteles);
				}
			})
		}else{
			obtenerHoteles();
		}
	});
	
	//Muestra las habitaciones disponibles
	$(document).on('click','.listarHabitacionesDisp',function(){
		let element= $(this);
		let nombre = $(element).attr('nombre');
		let precio = $(element).attr('precio');
		let idHotel = $(element).attr('id');
		//console.log(nombre+",  $"+precio+", "+idHotel);
		let modNombrePrecio='';
		modNombrePrecio=`
			<!-- Portfolio Modal - Title -->
			<h2 class="portfolio-modal-title text-secondary text-uppercase mb-0">${nombre}</h2>
			<!-- Icon Divider -->
			<div class="divider-custom">
			<div class="divider-custom-line"></div>
				<div class="divider-custom-icon">
					<i class="fas fa-star"></i>
				</div>
			<div class="divider-custom-line"></div>
			</div>
			<table class="table">
				<thead class="thead-dark">
					<tr><!-- fila -->
						<th scope="col">HABITACIONES DISPONIBLES</th>
						<th scope="col">PRECIO</th> <!-- columna -->
					</tr>
				</thead>
				<tbody id="tablahabitacionesDisp">
					<!-- aca van las habitaciones Disponibles-->	 
				
				</tbody>
			</table>
			<button class="btn btn-primary listarHabitacionesDisp" href="" id="${idHotel}" nombre="${nombre}" precio="${precio}">
			  Actualizar
			</button>`;
		$.ajax({
			url:"index-obtenerHabitaciones.php",
			type:"POST",
			data:{idHotel},
			success: function(respuesta){
				let indexListarHabitacion= JSON.parse(respuesta);
				let habitacionesDisp='';
				indexListarHabitacion.forEach(elemento=>{
					habitacionesDisp+=`
					<tr class="mostrarFotos1" id="${elemento.id}">
						<br>
						<div class="portfolio-item mx-auto" data-toggle="modal" data-target="#f0t0">
							<div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
							  <div class="portfolio-item-caption-content text-center text-white">
								<td class="td">${elemento.nombre}</td>
								<td class="td">${elemento.PRECIO}</td>
							  </div>
							</div>
						</div>
					</tr>`
				});
				$('#contenido').html(modNombrePrecio);
				$('#tablahabitacionesDisp').html(habitacionesDisp);
				$('.mostrarFotos1').click(function(){
					let idFotosHabitaciones=$(this).attr('id');
					//console.log(idFotosHabitaciones);
					let mostrarFotos1=`
						<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner" id="fotosDeHabitacion">
								<!-- aca van las fotos de la habitacion -->
							</div>
							<a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
								<span class="carousel-control-prev-icon" aria-hidden="true"></span>
								<span class="sr-only">Previous</span>
							</a>
							<a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
								<span class="carousel-control-next-icon" aria-hidden="true"></span>
								<span class="sr-only">Next</span>
							</a>
						</div>
					`;
					$.ajax({
						url:"index-obtFotosHabitaciones.php",
						type:"POST",
						data:{idFotosHabitaciones},
						success:function(respuesta){
							//console.log(respuesta);
							let fotos= JSON.parse(respuesta);
							let FotoPorHabitacion='';
							let activo=true;
							fotos.forEach(elemento=>{
								if(activo){
									FotoPorHabitacion+=`
										<div class="carousel-item active">
											<img src="img/${elemento.idHotel}/${elemento.idHabitacion}/${elemento.nombre}" class="d-block w-100">
										</div>
									`
									activo=false;
								}else{
									FotoPorHabitacion+=`
										<div class="carousel-item">
											<img src="img/${elemento.idHotel}/${elemento.idHabitacion}/${elemento.nombre}" class="d-block w-100">
										</div>
									`
								}
							});
							$('#fotosDeHabitacion').html(FotoPorHabitacion);
						}
					});
					
					$('#contenido2').html(mostrarFotos1);
					$('#hotel').attr('class',"portfolio-modal modal fade");
					$('#hotel').attr('style',"display: none;");
					$('#hotel').attr('aria-hidden','true');
					$('#hotel').attr('aria-modal','false');
					$('#f0t0').attr('class',"portfolio-modal modal fade show");
					$('#f0t0').attr('style',"display: block;");
					$('#f0t0').attr('aria-hidden','false');
					$('#f0t0').attr('aria-modal','true');
					$('#cerrarCarousel').click(function(){
						//console.log("cierra carousel");
						$('#f0t0').attr('class',"portfolio-modal modal fade");
						$('#f0t0').attr('style',"display: none;");
						$('#f0t0').attr('aria-hidden','true');
						$('#f0t0').attr('aria-modal','false');
						$('#hotel').attr('class',"portfolio-modal modal fade show");
						$('#hotel').attr('style',"display: block;");
						$('#hotel').attr('aria-hidden','false');
						$('#hotel').attr('aria-modal','true');
					})
				});
			}
		});
	});
});