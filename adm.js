$(document).ready(function(){
	obtenerHabitaciones();
	btnagregar();
	
	// validar cantidad de fotos
	$('#agregar-imagen').on('change',function(){
		if($(this)[0].files.length <= 4){
			// let input=`<button type="submit" class="btn btn-primary btn-xl" id="btnagregar">AGREGAR HABITACION</button>`;
			// $('#boton-agregar').html(input);
			$('#btnagregar').attr('class',"btn btn-primary btn-xl");
			$('#btnagregar').prop('disabled',false);
		}else{
			$('#btnagregar').prop('disabled',true);
			$('#label-agregarfotos').html(`solo se permiten <spam class="text-danger">4</spam> fotos por habitacion`);
		}
	});
	// agregar nueva habitacion
	function btnagregar(){
		$('#btnagregar').click(function(){
		  var datos= new FormData($('#frmajax')[0]);
		  console.log(datos);
		   $.ajax({
			type:"POST",
			url:"habitacion.php",
			data:datos,
			contentType: false,
			processData: false,
			success:function(r){
			  if(r < 5){
				obtenerHabitaciones();
				alert("agregado con exito");
			  }else{
				alert("Fallo el server ?");
				console.log(r);
			  }
			}
		  });
		  $('#nombre').val("");
		  $('#precio').val("");
		  $('#label-agregarfotos').val("Seleccione las imagenes...");
		  return false;
		});
	}
	
	//este me parece que no va...
	// $('.btnmodificar').click(function(e){
		// var datos=$('.modificarHabitacion').serialize();
		// console.log(datos);
		// return 1;
		// $.ajax({
			// type:"POST",
			// url:"modificar.php",
			// data:datos,
			// success:function(r){
				// if(r>=1){
				
					// alert("modificado con exito");
				// }else{
					// console.log(r);
					// alert("Fallo el server");
				// }
			// }
		// });
		// $('input').val("");
		// e.preventDefault();
		// return false;
    // });
	
	// traer usuario en bienvenido
		$.ajax({
			url: 'adm-obtenerUsuario.php',
			type: 'GET',
			success: function(respuesta){
				//console.log(respuesta);
				let admListarUsuario=JSON.parse(respuesta);
				let template='';
				admListarUsuario.forEach(elemento =>{
					template+=`${elemento.nombre}`
				});
				$('#bienvenido').html(template);
			}
		});
	
	// traer botones de las habitaciones
	function obtenerHabitaciones(){
		$.ajax({
			url:'adm-obtenerHabitaciones.php',
			type:'GET',
			success: function(respuesta2){
				//console.log(respuesta2);
				let admListarHabitacion= JSON.parse(respuesta2);
				let boton1='';
				
				admListarHabitacion.forEach(elemento =>{
					if ( `${elemento.estado}` == 1){
						boton1+=`
						<div class="col-md-6 col-lg-12 text-center">
							<div class="btn-lg btn-block btn-group" role="group" aria-label="Basic example">
								<button type="button" class="btn-xl btn btn-primary estadoHabitacion" estadoHabitacion="${elemento.id}">
									<h4>${elemento.nombre}</h4>
								</button>
								<div class="btn-group" data-toggle="modal" data-target="#hotel1">
									<button type="button" class="btn-xl btn btn-primary modNombrePrecio" nombre="${elemento.nombre}" precio="${elemento.PRECIO}" id="${elemento.id}">
										<h4>$${elemento.PRECIO}</h4>
									</button>
								</div>
							</div>
						</div>`
					}else{
						boton1+=`
						<div class="col-md-6 col-lg-12 text-center">
							<div class="btn-lg btn-block btn-group" role="group" aria-label="Basic example">
								<button type="button" class="btn-xl btn btn-secondary p-auto estadoHabitacion" estadoHabitacion="${elemento.id}">
									<h6>${elemento.nombre}</h6>
								</button>
								<div class="btn-group" data-toggle="modal" data-target="#hotel1">
									<button type="button" class="btn-xl btn btn-secondary modNombrePrecio" nombre="${elemento.nombre}" precio="${elemento.PRECIO}" id="${elemento.id}">
										<h4>$${elemento.PRECIO}</h4>
									</button>
								</div>
							</div>
						</div>`
					}
				});
				$('#botones').html(boton1);
			}
		});
	}
	
	//modificar estado de la habitacion.
	$(document).on('click','.estadoHabitacion',function(){
		let element= $(this)[0];
		//console.log(element);
		let id=$(element).attr('estadoHabitacion');
		$.post('adm-modificarEstado.php',{id},function(respuesta){
			//console.log(respuesta);
			obtenerHabitaciones();
		})
	})
	
	let cantImagenes=0;
	//modifica el nombre, precio e imagenes
	$(document).on('click','.modNombrePrecio',function(){
		let element= $(this);
		let modNombrePrecio='';
		let nombre = $(element).attr('nombre');
		let precio = $(element).attr('precio');
		let id = $(element).attr('id');
		
		//console.log(nombre+",  $"+precio+", "+id);
		modNombrePrecio+=`
			<div class="modal-dialog modal-xl" role="document">
				<div class="modal-content">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">
							<i class="fas fa-times"></i>
						</span>
					</button>
					<div class="modal-body text-center">
					  <div class="container">
						<div class="row justify-content-center">
						  <div class="col-lg-8">
							<!-- Portfolio Modal - Title -->
							<h2 class="portfolio-modal-title text-secondary text-uppercase mb-0" id="nombreTitulo">${nombre}</h2>
							<!-- Icon Divider -->
							<div class="divider-custom">
							  <div class="divider-custom-line"></div>
							  <div class="divider-custom-icon">
								<i class="fas fa-star"></i>
							  </div>
							  <div class="divider-custom-line"></div>
							</div>
							
							<!-- para usar un input file, siempre poner en la etiqueta form: novalidate="novalidate" enctype="multipart/form-data"	-->
							<form id="modDatosHabitacion" method="POST" novalidate="novalidate" enctype="multipart/form-data">
								<div class="input-group input-group-lg ">
									<input type="text" name="nombre" class="form-control rounded" placeholder="${nombre}" value="${nombre}" autofocus="autofocus">
								</div>
								<div class="input-group input-group-lg ">
								  <input type="number" name="precio" class="form-control rounded" placeholder="$${precio}" value="${precio}">
								  <input type="hidden" name="idhoteles" value="${id}">
								</div>
								<div class="input-group input-group-lg">
									<input type="file" class="custom-file-input modificarImagen" name="foto[]" multiple="" aria-describedby="inputGroupFileAddon04">
									<label class="custom-file-label text-left label-modificarfotos" for="inputGroupFile04">Agregar nuevas fotos</label>
								</div>
								
								
								<div class="row" id="rowImagenes">
								</div>
								
								<br>  
								<div class="form-group">
									<button class="btn btn-primary btn-xl btnmodificar">MODIFICAR</button>
								</div>
								<div class="form-group">
									<button class="btn btn-danger btn-xl eliminarHabitacion" id="${id}">ELIMINAR</button>
								</div>
							</form>
							  
						  </div>
						</div>
					  </div>
					</div>
				</div>
			</div>`
		$('#hotel1').html(modNombrePrecio);
		mostrarImg(id);
		
		
		// validar cantidad de fotos
		$('.modificarImagen').on('change',function(){
			console.log($(this)[0].files.length + cantImagenes);
			if(($(this)[0].files.length + cantImagenes) > 4){
				console.log("la cantidad de imagenes es mayor a 4");
				$('.btnmodificar').prop('disabled',true);
			}else{
				$('.btnmodificar').prop('disabled',false);
			}
		});
		cantImagenes=0;
		$('.btnmodificar').click(function(e){
			var datos=new FormData($('#modDatosHabitacion')[0]);
			//console.log(datos=>foto);
			$.ajax({
				type:"POST",
				url:"modificar.php",
				data:datos,
				contentType:false,
				processData:false,
				success:function(r){
					mostrarImg(id);
					obtenerHabitaciones();
					alert("modificado con exito");
					for (var i of datos.entries()){
						if (i[0]== "nombre"){
							$('#nombreTitulo').html(i[1]);
						}
					}
					
					
				}
			});
			e.preventDefault();
			return false;
		});
	});
	
	//no se que mounstrocidad hice aca.... XD
	function mostrarImg(id){
		$.ajax({
			url:"adm-obtFotosHabitaciones.php",
			type:"GET",
			success: function(respuesta){
				let fotos=JSON.parse(respuesta);
				let rowImagenes='';
				cantImagenes=0;
				fotos.forEach(elemento => {
					
					if(`${elemento.idHabitacion}`==id){
						cantImagenes++;
						rowImagenes+=`
						<div class="col-md-6 col-lg-3">
								<br>
								<div class="miEstilos" aria-label="Close">
									<img 	class="img-thumbnail oscurecer" 
											src="img/${elemento.idHotel}/${elemento.idHabitacion}/${elemento.nombreImagen}" 
											nombre="${elemento.nombreImagen}"
											idImagen="${elemento.idImagen}"
											idHabitacion="${elemento.idHabitacion}"
											idHotel="${elemento.idHotel}"
									>
								</div>
													
						</div>
						`
					}
				});
				console.log("entra? "+cantImagenes);
				if(cantImagenes >= 4){
					console.log("hay 4 fotos o mas...");
					$('.modificarImagen').prop('disabled',true);
				}else{
					$('.modificarImagen').prop('disabled',false);
				}
				$('#rowImagenes').html(rowImagenes);
				oscurecer();
			}
			
		})
		
	}
	
	//no se que mounstrocidad hice aca.... XD
	//elimina imagen..
	function oscurecer(){
			$('.oscurecer').on('click',function(){
					
					let elemento=$(this)[0];
					let nombre=$(elemento).attr("nombre");
					let idImagen=$(elemento).attr("idImagen");
					let idHabitacion=$(elemento).attr("idHabitacion");
					let idHotel=$(elemento).attr("idHotel");
					console.log(nombre+"	"+idHabitacion);
					if(confirm("Seguro que desea eliminar la IMAGEN: "+nombre+" ??")){
						$.ajax({
							url:"adm-eliminarImagen.php",
							type:"POST",
							data:{nombre, idImagen, idHabitacion, idHotel},
							success: function(respuesta){
								mostrarImg(idHabitacion);
								console.log(respuesta);
							}
						});
					}
				});
		}
	
	//eliminar habitacion
	$(document).on('click','.eliminarHabitacion',function(e){
		let element=$(this);
		let id=$(element).attr('id');
		//console.log(id);
		if(confirm('Seguro que desea eliminar la HABITACION?')){
			$.ajax({
				url:'adm-eliminarHabitacion.php',
				type:'POST',
				data:{id},
				success: function(respuesta){
					obtenerHabitaciones();
					console.log(respuesta);
					e.preventDefault();
				}
			});
		}
	});
	
});