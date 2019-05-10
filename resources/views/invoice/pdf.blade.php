<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>{{$invoice->customer->name}}</title>

	<style>
		.invoice-box {
			max-width: 800px;
			margin: auto;
			border: 1px solid #eee;
			box-shadow: 0 0 1px rgba(0, 0, 0, .15);
			font-size: 16px;

			font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
			color: #555;
		}

		.invoice-box table {
			width: 100%;
			text-align: left;
		}

		

		.invoice-box table tr td:nth-child(2) {
			text-align: left;
		}



		.invoice-box table tr.top table td.title {
			font-size: 45px;
			color: #333;
		}

		.invoice-box table tr.heading td {
			background: #eee;
			border-bottom: 1px solid #ddd;
			font-weight: bold;
		}

		.invoice-box table tr.item td{
			border-bottom: 1px solid #eee;
		}

		.invoice-box table tr.item.last td {
			border-bottom: none;
		}

		.invoice-box table tr.total td:nth-child(2) {
			font-weight: bold;
		}

		@media only screen and (max-width: 600px) {
			.invoice-box table tr.top table td {
				width: 100%;
				display: block;
				text-align: center;
			}

			.invoice-box table tr.information table td {
				width: 100%;
				display: block;
				text-align: center;
			}
		}

		/** RTL **/
		.rtl {
			direction: rtl;
			font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
		}

		.rtl table {
			text-align: right;
		}

		.rtl table tr td:nth-child(2) {
			text-align: left;
		}
	</style>
</head>

<body>

	<div class="invoice-box">
		<table cellpadding="0" cellspacing="0">
			<tr class="top">
				<td colspan="2">
					<table>
						<tr>
							<td class="title">
								<!--<img src="https://www.sparksuite.com/images/logo.png" style="width:100%; max-width:300px;">-->
								<h3>X Warehouse</h3>
							</td>

							<td>
								Invoice #: {{$invoice->id}}<br>
								Created: {{$invoice->created_at}}<br>
								Due: February 1, 2015
							</td>
						</tr>
					</table>
				</td>
			</tr>

			<tr class="information">
				<td colspan="2">
					<table>
						<tr>
							<td>
								X Warehouse, Inc.<br>
								Road #<br>
								Address<br>
								email: info@xwarehouse.com
							</td>

							<td>
								{{$invoice->customer->name}}<br>
								{{$invoice->customer->phoneNumber}}<br>
								{{$invoice->customer->address}}
							</td>
						</tr>
					</table>
				</td>
			</tr>
			</table>
<table cellpadding="0" cellspacing="0">
<!--
			<tr class="heading">
				<td>
					Payment Method
				</td>

				<td>
					Check #
				</td>
			</tr>

			<tr class="details">
				<td>
					Check
				</td>

				<td>
					1000
				</td>
			</tr>
-->
			<tr class="heading">
				<td>
					Id
				</td>

				<td>
					Name  
				</td>

				<td>
					Quantity
				</td>

				<td>
					Pup
				</td>

				<td>
					Discount %
				</td>

				<td>
					Price
				</td>
			</tr>
@foreach($invoice->products as $product)
			<tr class="item">
				<td>
					{{$product->id}}
				</td>

				<td>
					{{$product->productName}}
				</td>

				<td>
					{{$product->pivot->quantity}}
				</td>

				<td>
					{{$product->pivot->pup}}
				</td>
				
				<td>
					{{$product->pivot->percentage}}
				</td>

				<td>
					{{$product->pivot->netPrice}}
				</td>
			</tr>
@endforeach
			<tr class="">
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td>Total Amount:</td>

				<td>
					 {{$invoice->totalAmount}}
				</td>
			</tr>
			<tr class="total">
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td>Delivery Charge:</td>

				<td>
					 {{$invoice->deliveryCharge}}
				</td>
			</tr>
			<tr class="total">
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td>Discount $:</td>

				<td class="text text-align-right">
					 {{$invoice->discount}}
				</td>
			</tr>
			<tr class="total">
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td>Net Amount:</td>

				<td>
					 {{$invoice->netAmount}}
				</td>
			</tr>
			<tr class="total">
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td>Paid Amount:</td>

				<td>
					 {{$invoice->paidAmount}}
				</td>
			</tr>
			<tr class="total">
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td>Due Amount:</td>

				<td class=" text-align-right">
					 {{$invoice->amountDue}}
				</td>
			</tr>
		</table>
	</div>
</body>
</html>