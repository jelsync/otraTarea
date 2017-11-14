function seleccionarUsuario(codigoUsuario, nombre){
	$("#txt-id-usuario").val(codigoUsuario);
	//$("#txt-nombre").val(nombre);
	$("#txt-nombre").attr("value",nombre);
}
function agregarAmigo(codigoNuevoAmigo){
	alert("Codigo nuevo amigo: " + codigoNuevoAmigo);
}


function guardar(){
		var parametros ="txt-usuario="+$("#txt-usuario").val()+"&txt-email=" +$("#txt-email").val() + 
						"&txt-contrasena="+$("#txt-contrasena").val()+"&slc-imagen="+$("#slc-imagen").val();
		alert(parametros);
		$.ajax({
			url:"ajax/acciones-login.php?accion=guardar",
			method: "POST",
			data: parametros,
			success:function(respuesta){
				$("#respuesta").html("registro almacenado");
			},
			error:function(e){
				alert("Error:"+ e);
			}
		});

}

function comprobarRegistro(){
	//$("#btn-login").click(function(){
			var parametros = "txt-correo=" +$("#txt-correo").val() + 
						"&txt-password="+$("#txt-password").val();
			alert(parametros);
			$.ajax({
				url:"ajax/acciones-login.php?accion=login",
				method: "POST",
				data: parametros,
				success:function(respuesta){
					$("#respuesta").html(respuesta);
				},
				error:function(e){
					alert("Error:"+ e);
				}
		});
	
}
$(document).ready(function(){
	

	$.ajax({
		url:"ajax/get-info.php?accion=obtener_usuarios",
		data:"",
		method:"POST",
		success:function(resultado){
			$("#div-usuarios").html(resultado);
		},
		error:function(){
            alert(e);
		}
	});	
   
   $.ajax({
		url:"ajax/get-info.php?accion=obtener_publicacion",
		data:"",
		method:"POST",
		success:function(resultado){
			$("#div-publicacion").html(resultado);
		},
		error:function(){
            alert(e);
		}
	});	





	$("#btn-tengo-hambre").click(function(e){
		e.preventDefault();
		alert("Puede tomar 5 minutos e ir donde don Tito a comprar algo, me trae.");
	});	
	$("#btn-ir-banio").click(function(e){
		e.preventDefault();
		alert("Vaya, solamente deje su telefono en el escritorio.");
	});	
	
});

