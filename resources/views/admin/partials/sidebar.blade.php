<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{asset('admin/assets/index3.html')}}" class="brand-link">
      <img src="{{asset('admin/assets/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">HiShop Dashboard</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('admin/assets/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Destian Wira F.</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <!-- <i class="nav-icon fas fa-tachometer-alt"></i> -->
              <p>
                Katalog
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('admin/products')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Produk</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('admin/categories')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kategori</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('admin/attributes')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Atribut</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
					<a href="#" class="nav-link">
            <p>
              Pesanan
              <i class="right fas fa-angle-left"></i>
            </p>
					</a>
					<ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('admin/orders')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
								  <p>Pesanan</p>
								</a>
							</li>
							<li class="nav-item">
                <a href="{{ url('admin/orders/trashed')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sampah</p>
								</a>
							</li>
              <li class="nav-item">
                <a href="{{ url('admin/shipments')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pengiriman</p>
								</a>
							</li>
              </ul>
          </li>
          <li class="nav-item">
					<a href="#" class="nav-link">
            <p>
              Laporan
              <i class="right fas fa-angle-left"></i>
            </p>
					</a>
					<ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('admin/reports/revenue')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
								  <p>Pendapatan</p>
								</a>
							</li>
							<li class="nav-item">
                <a href="{{ url('admin/reports/product')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Produk</p>
								</a>
							</li>
              <li class="nav-item">
                <a href="{{ url('admin/reports/inventory')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Persediaan</p>
								</a>
							</li>
              <li class="nav-item">
                <a href="{{ url('admin/reports/payment')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pembayaran</p>
								</a>
							</li>
              </ul>
          </li>
          <li class="nav-item">
					<a href="#" class="nav-link">
            <p>
              Umum
              <i class="right fas fa-angle-left"></i>
            </p>
					</a>
					<ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('admin/slides')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
								  <p>Tampilan</p>
								</a>
							</li>
					</ul>
				</li>
          <li class="nav-item">
					<a href="#" class="nav-link">
            <p>
              Pengguna & Peran
              <i class="right fas fa-angle-left"></i>
            </p>
					</a>
					<ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('admin/users')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
								  <p>Pengguna</p>
								</a>
							</li>
							<li class="nav-item">
                <a href="{{ url('admin/roles')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Peran</p>
								</a>
							</li>
					</ul>
				</li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>