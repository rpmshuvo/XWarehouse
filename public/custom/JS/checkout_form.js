var row = null;
var products = [];
//fro side Bar
var sideBar = document.getElementById("sideBar");
// sideBar.onmouseover = function(){
//   this.style.backgroundColor = "green";

// };
  //sideBar.style.backgroundColor = "darkgray";
  sideBar.style.padding = "20px";

//for checkout form
function totalPrice() {
  var unit = document.getElementById("quantity").value;
  var pup = document.getElementById("price").value;
  var res = unit * pup;

  if (!isNaN(res)) {
    document.getElementById("totalPrice").innerHTML = res;
  }
}

function netPrice() {
  var totalPrice = document.getElementById("totalPrice").innerHTML;
  var percentage = document.getElementById("percentage").value;
  var netTotal = totalPrice - (totalPrice * percentage) / 100;
  if (!isNaN(netTotal)) {
    document.getElementById("netPrice").innerHTML = netTotal;
  }
}

function calculation1() {
  var totalAmount = document.getElementById("totalAmount").value;
  var deliveryCharge = document.getElementById("deliveryCharge").value;
  var netAmount = parseInt(totalAmount) + parseInt(deliveryCharge);
  if (!isNaN(netAmount)) {
    document.getElementById("netAmount").value = netAmount;
  }
}

function calculation2() {
  var netAmount = 0;
  var totalAmount = document.getElementById("totalAmount").value;
  var deliveryCharge = document.getElementById("deliveryCharge").value;
  var discount = document.getElementById("discount").value;
  netAmount = parseInt(totalAmount) + parseInt(deliveryCharge);
  netAmount = parseInt(netAmount) - parseInt(discount);
  if (!isNaN(netAmount)) {
    document.getElementById("netAmount").value = netAmount;
  }
}

function finalCalculation() {
  var netAmount = document.getElementById("netAmount").value;
  var paidAmount = document.getElementById("paidAmount").value;
  var amountDue = parseInt(netAmount) - parseInt(paidAmount);
  if (!isNaN(amountDue)) {
    document.getElementById("amountDue").value = amountDue;
  }
}

function onFormSubmit() {
  var formData = readFormData();
  //console.log(formData);
  if(parseInt(formData['available']) >= formData['quantity'] && formData['quantity'] != 0){
    if (row == null) insertNewRecord(formData);
    resetForm();
  }else{
    alert("only ' " + formData['available'] + " ' unit are available and you select ' " + formData['quantity'] + " ' unit of that product" );
  }
  
}

function readFormData() {
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

//to get element text
function getSelectedText(elementId) {
    var elt = document.getElementById(elementId);

    if (elt.selectedIndex == -1)
        return null;

    return elt.options[elt.selectedIndex].text;
}

function insertNewRecord(data) {
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
  cell7.innerHTML = `<a class="btn btn-sm btn-outline-danger" role="button" onclick="onDelete(this)">Remove</a>`;

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

function resetForm() {
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

function onDelete(td) {

  if (confirm("Are you sure to delete?")) {
    row = td.parentElement.parentElement;
    var index = row.cells[0].innerText;

    //to delete product from products variable when a product is removed from invoice
    delete products[index-1];


    document.getElementById("invoiceList").deleteRow(row.rowIndex);
    
    resetForm();
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





//for find product's price

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

//for submit the checkout form

  $('#invoiceForm').submit(function(event){
      event.preventDefault();
  if (confirm('are you sure')) {
      var phoneNumber = $('#phoneNumber').val();
      var name = $('#name').val();
      var address = $('#address').val();
      var totalAmount = $('#totalAmount').val();
      var deliveryCharge = $('#deliveryCharge').val();
      var discount = $('#discount').val();
      var netAmount = $('#netAmount').val();
      var paidAmount = $('#paidAmount').val();
      var amountDue = $('#amountDue').val();

      $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')} })
      $.ajax({
        url:'/invoices',
        type:'POST',
        data:{'products': products,
              'phoneNumber' : phoneNumber,
              'name' : name,
              'address' : address,
              'totalAmount' : totalAmount,
              'deliveryCharge' : deliveryCharge,
              'discount' : discount,
              'netAmount' : netAmount,
              'paidAmount' : paidAmount,
              'amountDue' : amountDue,
              },
        dataType:'JSON',
        success:function(data)
        {
          //console.log(data);
           window.location.replace("/invoices/" + data);

        }
      });
    }
  });

});