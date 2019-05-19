
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>{{$returninfo->invoice->customer->name}}</title>

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
								Return Form Id #: {{$returninfo->id}}<br>
								Created: {{$returninfo->created_at}}<br>
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
								<div class="text justified">	
								{{$returninfo->invoice->customer->name}}<br>
								{{$returninfo->invoice->customer->phoneNumber}}<br>
								{{$returninfo->invoice->customer->address}}
								</div>
							</td>
						</tr>
					</table>
				</td>
			</tr>
			</table>
<table cellpadding="0" cellspacing="0">
			<tr class="heading">
				<td>
					Product Id
				</td>

				<td>
					Return Quantity 
				</td>

				<td>
					Damage
				</td>

				<td>
					Return Amount
				</td>
			</tr>
			<tr class="item">
				<td>
					{{$returninfo->product_id}}
				</td>

				<td>
					{{$returninfo->returnQuantity}}
				</td>

				<td>
					{{$returninfo->damage}}
				</td>
				
				<td>
					{{$returninfo->returnAmount}}
				</td>
			</tr>
		</table>
	</div>
</body>
</html>