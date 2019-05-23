<!-- navbar-->
<div class="container d-none d-sm-block">
	
	<ul id="sideBar" class="navbar-nav  bg-dark text-light">
		<li class="nav-item dropdown ">
			<span class="text-muted badge badge-light badge-box"  style="color: gray; width:100%; height: 50px">
				<a class="dropdown-toggle" href="#" id="categoryDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<h5>Categories</h5>
				</a>
				<div class="dropdown-menu" aria-labelledby="categoryDropdown">
					@role('admin|moderator')
					<a class="dropdown-item" href="/categories/create">Add category</a>
					@endrole
					<a class="dropdown-item" href="/categories">Manage Categories</a>
				</div>
			</span>
		</li>
		<li class="nav-item dropdown">
			<span class="text badge badge-light badge-box" style="color: gray; width:100%; height: 50px">
				<a class="dropdown-toggle" href="#" id="productDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><h5>Products</h5></a>
				<div class="dropdown-menu" aria-labelledby="productDropdown">
					@role('admin|moderator')
					<a class="dropdown-item" href="/products/create">Add Product</a>
					@endrole
					<a class="dropdown-item" href="/products">Manage Products</a>
				</div>
			</span>

		</li>
		<li class="nav-item dropdown">
			<span class="text-muted badge badge-light badge-box" style="color: gray; width:100%; height: 50px">
				<a class="dropdown-toggle" href="#" id="invoiceDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><h5>Invoices</h5>
				</a>
				<div class="dropdown-menu" aria-labelledby="invoiceDropdown">
					<a class="dropdown-item" href="/invoices/create">New invoice</a>
					<a class="dropdown-item" href="/invoices">Invoices</a>
				</div>
			</span>
		</li>
		<li class="nav-item dropdown">
			<span class="text-muted badge badge-light badge-box"  style="color: gray; width:100%; height: 50px">
				<a class="dropdown-toggle" href="#" id="invoiceDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><h5>Return Info</h5>
				</a>
				<div class="dropdown-menu" aria-labelledby="invoiceDropdown">
					<a class="dropdown-item" href="/returninfos/create">Return Form</a>
					<a class="dropdown-item" href="/returninfos">Return Info</a>
				</div>
			</span>
		</li>

		@role('admin')
		<li class="nav-item dropdown">
			<span class="text-muted badge badge-light badge-box"  style="color: gray; width:100%; height: 50px">
				<a class="dropdown-toggle" href="#" id="dropdown09" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<h5>Employee</h5>
				</a>
				<div class="dropdown-menu" aria-labelledby="dropdown09">
					<a class="dropdown-item" href="/employees/create">Add employee</a>
					<a class="dropdown-item" href="/employees">Manage employees</a>
				</div>
			</span>
		</li>
		@endrole
	</ul>
</div>
