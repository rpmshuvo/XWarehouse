var row = null;
var products = [];


function onReturnFormSubmit() {
  var formData = readReturnFormData();
  //console.log(formData);
  if(formData['available'] > formData['quantity'] && formData[
    'quantity'] > 0 ){
    if (row == null) insertNewReturnRecord(formData);
    resetReturnForm();
  }else{
    alert("only '" + formData['available'] + "' unit are available and you select '" + formData['quantity'] + "' unit of that product" );
  }
  
}


function readReturnFormData() {
  var formData = {};
  formData["productId"] =document.getElementById("productName").value;
  formData["productName"] =getSelectedText("productName");
  formData["available"] = document.getElementById("available").innerHTML;
  formData["quantity"] = document.getElementById("quantity").value;
  formData["price"] = document.getElementById("price").value;
  formData["totalPrice"] = document.getElementById("totalPrice").innerHTML;
  formData["percentage"] = document.getElementById("percentage").value;
  formData["netPrice"] = document.getElementById("netPrice").innerHTML;
  // formData["name"] = document.getElementById("name").value;
  // formData["address"] = document.getElementById("address").value;
  return formData;
}

function insertNewReturnRecord(data) {
// store added product in array
  products.push(data);
  //console.log(products);

  document.getElementById("invoice").style.display = "block";
  var table = document
    .getElementById("invoiceList")
    .getElementsByTagName("tbody")[0];
  var newRow = table.insertRow(table.length);
  cell1 = newRow.insertCell(0);
  cell1.innerHTML = table.rows.length;
  cell2 = newRow.insertCell(1);
  cell2.innerHTML = data.productName;
  cell3 = newRow.insertCell(2);
  cell3.innerHTML = data.quantity;
  cell4 = newRow.insertCell(3);
  cell4.innerHTML = data.price;
  cell5 = newRow.insertCell(4);
  cell5.innerHTML = document.getElementById("totalPrice").innerHTML;
  cell6 = newRow.insertCell(5);
  cell6.innerHTML = data.percentage;
  cell7 = newRow.insertCell(6);
  cell7.innerHTML = document.getElementById("netPrice").innerHTML;
  cell7 = newRow.insertCell(7);
  cell7.innerHTML = `<a class="btn btn-sm btn-outline-danger" role="button" onclick="onReturnItemDelete(this)">Remove</a>`;

  var table = document.getElementById("here");

  // document.getElementById("cus_name").innerHTML = data.name;
  // document.getElementById("cus_add").innerHTML = data.address;
  calcu();

  function calcu() {
    var totalAmount = 0;

    for (var i = 0; i < table.rows.length; i++) {
      totalAmount = totalAmount + parseInt(table.rows[i].cells[6].innerHTML);
    }

    document.getElementById("totalAmount").value = totalAmount;
  }
}

function resetReturnForm() {
  document.getElementById("productName").value = "Choose Product...";
  document.getElementById("available").value = "";
  document.getElementById("quantity").value = "";
  document.getElementById("price").value = "";
  document.getElementById("totalPrice").innerHTML = "_";
  document.getElementById("percentage").value = "";
  document.getElementById("netPrice").innerHTML = "_";
  // document.getElementById("name").value = document.getElementById("name").value;
  // document.getElementById("address").value = document.getElementById(
  //   "address"
  // ).value;
  document.getElementById("deliveryCharge").value = "";
  document.getElementById("discount").value = "";
  document.getElementById("netAmount").value = "";
  document.getElementById("payMethod").value = "Choose...";
  document.getElementById("paidAmount").value = "";
  document.getElementById("amountDue").value = "";
  row = null;
}

function onReturnItemDelete(td) {

  if (confirm("Are you sure to delete?")) {
    row = td.parentElement.parentElement;
    var index = row.cells[0].innerText;

    //to delete product from products variable when a product is removed from invoice
    delete products[index-1];


    document.getElementById("invoiceList").deleteRow(row.rowIndex);
    
    resetReturnForm();
    var table = document.getElementById("here");
    if (table.rows.length == 0) {
      products = [];
  //    console.log(products);
      document.getElementById('invoice').style.display = "none";
    }
    if (table.rows.length > 0) {
      calcu();
      function calcu() {
        var totalAmount = 0;
        for (var i = 0; i < table.rows.length; i++) {
          totalAmount =
            totalAmount + parseFloat(table.rows[i].cells[6].innerHTML);
        }
        document.getElementById("totalAmount").value = totalAmount;
      }
    }
  }
}

$(document).ready(function(){


//for find invoice information in return form
$('#invoiceId').submit(function(event){
    event.preventDefault();
		  var invoiceId = $(this).val();
		  $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name = "csrf-token"]').attr('content')} })
		  $.ajax({
		    url : '/invoiceInformation',
		    type : 'get',
		    data : {'id' : invoiceId},
		    dataType : 'JSON',
		    success :function(data){
		      
		        console.log(data);

		  
		    }
		  });
  });

});































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