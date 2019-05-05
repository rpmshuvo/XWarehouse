
/*
$(document).ready(function(){

	$('#productName').change(function(){
		var productId= $(this).val();
		var a = $(this).parent();
		$.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')} })
		$.ajax({
			url:'/findPrice',
			type:'get',
			data:{'id':productId},
			dataType:'JSON',
			success:function(data)
			{
				$('#available').html(data.quantity);
				$('#price').val(data.sellPrice);

			}
		});
	});

	$("#invoiceForm").submit(function() { 
                    console.log(products); 
                });

});
*/