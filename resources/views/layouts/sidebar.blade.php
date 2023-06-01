<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="AdminLTE-2/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Alexander Pierce</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
          <li>
              <a href="{{ route('dashboard') }}">
                  <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>
            <li class="header">MASTER</li>
            <li>
                <a href="{{ route('kategori.index') }}">
                    <i class="fa fa-cube"></i> <span>Katergori</span>
                  </a>
              </li>
            <li>
                <a href="{{ route('produk.index') }}">
                    <i class="fa fa-id-card"></i> <span>Produk</span>
                </a>
            </li>
            <li>
                <a href="{{route('member.index')}}">
                    <i class="fa fa-credit-card"></i> <span>Member</span>
                </a>
            </li>
            <li>
                <a href="{{route('supplier.index')}}">
                    <i class="fa fa-handshake-o"></i> <span>Suplier</span>
                </a>
            </li>
            <li class="header">TRANSAKSI</li>
            <li>
                <a href="{{route('pengeluaran.index')}}">
                    <i class="fa fa-money"></i> <span>Penegeluaran</span>
                  </a>
              </li>
            <li>
                <li>
                    <a href="{{route('pembelian.index')}}">
                        <i class="fa fa-cart-plus"></i> <span>Pembelian</span>
                    </a>
                </li>
                <li>
                    <li>
                        <a href="{{route('penjualan.index') }}">
                            <i class="fa fa-truck"></i> <span>Penjualan</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('transaksi.index')}}">
                            <i class="fa fa-cart-arrow-down"></i> <span>Transaksi Lama</span>
                          </a>
                      </li>
                    <li>
                    <li>
                        <a href="{{route('transaksi.baru')}}">
                            <i class="fa fa-shopping-cart"></i> <span>Transaksi Baru</span>
                          </a>
                      </li>
                    <li>
                    <li class="header">REPORT  </li>
                    <li>
                        <a href="{{route('laporan.index')}}">
                            <i class="fa fa-file-pdf-o"></i> <span>Laporan</span>
                          </a>
                      </li>
                      <li class="header">SYSTEM</li>
                      <li>
                          <a href="#">
                              <i class="fa fa-user"></i> <span>User</span>
                            </a>
                        </li>
                      <li>
                          <a href="#">
                              <i class="fa fa-cogs"></i> <span>Pengaturan</span>
                            </a>
                        </li>
                    <li>
                <li>
            
        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>