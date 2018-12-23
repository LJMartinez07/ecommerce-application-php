$(document).ready(function(){

	

	$(".cantidad").keyup(function(e){
		if($(this).val()!=''){
			if(e.keyCode==13){
				
				var id=$(this).attr('data-id');
				var precio=$(this).attr('data-precio');
				var cantidad=$(this).val();
				$(this).parentsUntil('.product').find('.subtotal').text(precio*cantidad);

				$.post('js/modificarDatos.php',{

					Id:id,
					Precio:precio,
					Cantidad:cantidad
				},function(e){
					
						$("#total").text(e);

				});
			}
		}
	});

	$(".eliminar").click(function(e){
		e.preventDefault();
		var id=$(this).attr('data-id');
		
		$(this).parentsUntil('.product').remove();
		$.post('js/eliminar.php',{
			Id:id
		},function(a){ 
			if(a=='0'){
			location.reload();
			}
		});

	});

	$(".button-comprar").click(function(e){
		alert('Compra agregada al carrito con exito');
		$.post('./compras.php',{
			
			id:$(this).attr('data-id')
		});

	});

	$(".comp-det").click(function(e){
		alert('Compra agregada al carrito con exito');
		$.post('../compras.php',{
			
			id:$(this).attr('data-id')
		});
	});

	$(".subs").click(function(e){


		document.getElementById('ja').src = $(this).attr('data-img');

		});

	



});
