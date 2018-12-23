$(document).ready(function(){
	$(".eliminar").click(function(){
		var imagen=$(this).parent('td').parent('tr').find('.imagen').val();
		$(this).parent('td').parent('tr').remove();
		$.post('./ejecuta.php',{
			Caso:'Eliminar',
			Id:$(this).attr('data-id'),
			Imagen:imagen
		},function(e){
			alert(e);
		});
		
	});
	$(".modificar").click(function(){
		var nombre=$(this).parent('td').parent('tr').find('.nombre-producto').val();
		var descripcion=$(this).parent('td').parent('tr').find('.descripcion-producto').val();
		var estado =$(this).parent('td').parent('tr').find('.estado-producto').val(); 
		var precio=$(this).parent('td').parent('tr').find('.precio-producto').val();
		var especial =$(this).parent('td').parent('tr').find('.especial-producto').val(); 
		var descuento=$(this).parent('td').parent('tr').find('.descuento-producto').val();
		$.post('./ejecuta.php',{
			Caso:'Modificar',
			Id:$(this).attr('data-id'),
			Nombre:nombre,
			Descripcion:descripcion,
			Agotado: estado,
			Precio:precio,
			Especial: especial,
			Descuento:descuento
		},function(e){
			alert(e);
		});
	});
});