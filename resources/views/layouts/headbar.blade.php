<div class="d-flex justify-content-between align-items-center px-4 py-3 bg-white border-bottom shadow-sm">
    <div class="fw-bold fs-5">@yield('page-title', 'Dashboard')</div>
    <div>{{ auth()->user()->name ?? 'Petugas Gudang' }}</div>
</div>
