function seleccionarUsuario(codigoUsuario, nombreUsuario){
	
			$("#txt-id-usuario").val(codigoUsuario);
			$("#txt-nombre").val(nombreUsuario);
		}
function agregarAmigo(codigoNuevoAmigo){
	alert("Codigo nuevo amigo: " + codigoNuevoAmigo);
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

