<style>
    /* Custom Dark Silver / Gunmetal Navbar Styling */
    .navbar-silver {
        /* Degradasi Silver Metalik Gelap (Gunmetal) */
        background: linear-gradient(135deg, #334155 0%, #1e293b 50%, #0f172a 100%) !important;
        border-bottom: 1px solid rgba(255, 255, 255, 0.12);
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.4);
        padding: 12px 24px;
    }

    /* Brand / Logo */
    .navbar-silver .navbar-brand {
        color: #f8fafc !important;
        font-weight: 800;
        font-size: 1.35rem;
        letter-spacing: 0.5px;
        text-shadow: 0 2px 4px rgba(0, 0, 0, 0.5);
    }

    /* Nav Links */
    .navbar-silver .nav-link {
        color: #cbd5e1 !important; /* Perak Elegan */
        font-weight: 600;
        padding: 8px 18px !important;
        border-radius: 8px;
        transition: all 0.25s ease;
    }

    /* Hover State */
    .navbar-silver .nav-link:hover {
        color: #ffffff !important;
        background-color: rgba(255, 255, 255, 0.08);
        transform: translateY(-1px);
    }

    /* Active State (Halaman Aktif) */
    .navbar-silver .nav-link.active {
        color: #0f172a !important;
        background: linear-gradient(135deg, #e2e8f0 0%, #cbd5e1 100%) !important; /* Silver highlight */
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.3);
        font-weight: 700;
    }

    /* Button Logout Style */
    .btn-logout-silver {
        background-color: rgba(255, 255, 255, 0.05);
        color: #e2e8f0 !important;
        border: 1px solid rgba(255, 255, 255, 0.2);
        font-weight: 600;
        padding: 6px 18px;
        border-radius: 8px;
        transition: all 0.25s ease;
    }

    .btn-logout-silver:hover {
        background-color: #ef4444;
        color: #ffffff !important;
        border-color: #dc2626;
        box-shadow: 0 2px 10px rgba(239, 68, 68, 0.4);
    }
</style>

<nav class="navbar navbar-expand-lg navbar-silver sticky-top">
  <div class="container-fluid">
    <a class="navbar-brand d-flex align-items-center gap-2" href="#">
      <span>Aplikasi POS</span>
    </a>
    
    <button class="navbar-toggler border-0 text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon" style="filter: invert(1);"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-3 gap-1">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" 
             href="{{ route('dashboard') }}">
             Dashboard
          </a>
        </li>

        @if(auth()->user()->role->name == 'admin')
        <li class="nav-item">
            <a class="nav-link {{ Request::is('admin/users*') ? 'active' : '' }}" 
              href="{{ route('admin.users') }}">
              Users
            </a>
        </li>
        @endif

        <li class="nav-item">
          <a class="nav-link {{ Request::is('produk*') ? 'active' : '' }}" 
             href="{{ route('produk.index') }}">
             Produk
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link {{ Request::is('penjualan*') ? 'active' : '' }}" 
             href="{{ route('penjualan.index') }}">
             Penjualan
          </a>
        </li>
      </ul>

      <form action="{{ route('logout') }}" method="POST" class="d-flex m-0">
        @csrf
       <button type="button" class="btn btn-outline-light btn-sm px-3" data-bs-toggle="modal" data-bs-target="#logoutModal" style="border-radius: 8px;">
    Logout
</button>
      </form>
    </div>
  </div>
</nav>