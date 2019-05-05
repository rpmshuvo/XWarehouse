<!-- navbar-->
<div class="container">
	
<ul class="navbar-nav ml-auto">
	<li class="nav-item">
		<a href="/home" class="nav-link">Home</a>
	</li>
	<li class="nav-item dropdown">
		<a class="dropdown-toggle" href="#" id="categoryDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">category</a>
		<div class="dropdown-menu" aria-labelledby="categoryDropdown">
			@role('admin|moderator')
			<a class="dropdown-item" href="/categories/create">Add category</a>
			@endrole
			<a class="dropdown-item" href="/categories">Manage Category</a>
		</div>
	</li>
	<li class="nav-item dropdown">
		<a class="dropdown-toggle" href="#" id="productDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Products</a>
		<div class="dropdown-menu" aria-labelledby="productDropdown">
			@role('admin|moderator')
			<a class="dropdown-item" href="/products/create">Add Product</a>
			@endrole
			<a class="dropdown-item" href="/products">Manage Products</a>
		</div>
	</li>
	<li class="nav-item dropdown">
		<a class="dropdown-toggle" href="#" id="invoiceDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Invoices</a>
		<div class="dropdown-menu" aria-labelledby="invoiceDropdown">
			<a class="dropdown-item" href="/invoices/create">New invoice</a>
			<a class="dropdown-item" href="/invoices">Invoices</a>
		</div>
	</li>
	<li class="nav-item dropdown">
		<a class="dropdown-toggle" href="#" id="invoiceDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Return Info</a>
		<div class="dropdown-menu" aria-labelledby="invoiceDropdown">
			<a class="dropdown-item" href="/returninfos/create">Return Form</a>
			<a class="dropdown-item" href="/returninfos">Return Info</a>
		</div>
	</li>

	@role('admin')
	<li class="nav-item dropdown">
		<a class="dropdown-toggle" href="#" id="dropdown09" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Emplpyee</a>
		<div class="dropdown-menu" aria-labelledby="dropdown09">
			<a class="dropdown-item" href="/employees/create">Add employee</a>
			<a class="dropdown-item" href="/employees">Manage employee</a>
		</div>
	</li>
	@endrole
</ul>
</div>
