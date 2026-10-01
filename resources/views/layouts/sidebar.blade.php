<div class="bg-white border-end d-flex flex-column p-3" style="width: 260px; min-height: 100vh;">

    <!-- Logo + nama app -->
    <div class="d-flex align-items-center justify-content-between mb-4">
        <div class="d-flex align-items-center gap-2">
            <div class="bg-white p-1 rounded d-flex align-items-center justify-content-center" style="width:50px; height:80px; flex-shrink:0;">
                <img src="{{ asset('images/logo-pln.jpg') }}"
                     alt="Logo"
                     style="max-width:100%; max-height:100%; object-fit:contain;"
                     onerror="this.onerror=null; this.outerHTML='<div class=\'bg-primary text-white rounded d-flex align-items-center justify-content-center fw-bold\' style=\'width:32px;height:32px;\'>IP</div>';">
            </div>
            <span class="fw-bold text-dark">PLN Icon Plus</span>
        </div>
        <i class="bi bi-search text-muted"></i>
    </div>

    <!-- Dashboard -->
    <a href="{{ url('/dashboard') }}" class="d-flex align-items-center gap-2 text-decoration-none text-dark py-2 px-2 rounded mb-1 sidebar-link {{ request()->is('dashboard') ? 'active' : '' }}">
        <i class="bi bi-house"></i> Dashboard
    </a>

    <!-- Kartu Gantung (expandable) -->
    <div class="mb-1">
        <div class="d-flex align-items-center justify-content-between text-dark py-2 px-2 rounded sidebar-link" style="cursor:pointer;" data-bs-toggle="collapse" data-bs-target="#menuKartu">
            <span><i class="bi bi-box-seam me-2"></i>Kartu Gantung</span>
            <i class="bi bi-chevron-right chevron-icon"></i>
        </div>
        <div class="collapse ps-4" id="menuKartu">
            <a href="{{ url('/kartu-gantung') }}" class="d-block text-decoration-none text-dark py-2 px-2 rounded sidebar-link">List Kartu Gantung</a>
            <a href="{{ url('/kartu-gantung/create') }}" class="d-block text-decoration-none text-dark py-2 px-2 rounded sidebar-link">Buat Kartu Baru</a>
        </div>
    </div>

    <!-- Setting (expandable) -->
    <div class="mb-1">
        <div class="d-flex align-items-center justify-content-between text-dark py-2 px-2 rounded sidebar-link" style="cursor:pointer;" data-bs-toggle="collapse" data-bs-target="#menuSetting">
            <span><i class="bi bi-gear me-2"></i>Setting</span>
            <i class="bi bi-chevron-right chevron-icon"></i>
        </div>
        <div class="collapse ps-4" id="menuSetting">
            <a href="{{ url('/setting') }}" class="d-block text-decoration-none text-dark py-2 px-2 rounded sidebar-link">Data Master</a>
        </div>
    </div>

    <!-- Bagian bawah: notifikasi & keluar -->
    <div class="mt-auto pt-3 border-top">
        <a href="#" class="d-flex align-items-center text-decoration-none text-dark py-2 px-2 rounded sidebar-link">
            <i class="bi bi-bell me-2"></i> Notifications
            <span class="badge bg-danger rounded-pill ms-auto">9</span>
        </a>
        <a href="#" class="d-flex align-items-center text-decoration-none text-danger py-2 px-2 rounded sidebar-link">
            <i class="bi bi-box-arrow-right me-2"></i> Keluar
        </a>
    </div>

</div>

<style>
    .sidebar-link:hover {
        background-color: #f3f4f6;
    }
    .sidebar-link.active {
        background-color: #e7edf5;
        color: #0d6efd !important;
        font-weight: 600;
    }
    [data-bs-toggle="collapse"][aria-expanded="true"] .chevron-icon {
        transform: rotate(90deg);
    }
    .chevron-icon {
        transition: transform 0.2s ease;
        font-size: 12px;
    }
</style>
