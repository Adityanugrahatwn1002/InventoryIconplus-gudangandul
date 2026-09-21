@extends('layouts.app')

@section('title', 'Dashboard')

@section('page-title')
    <div>
        <div style="font-size: 20px; font-weight: 600;">Dashboard</div>
        <div style="font-size: 13px; color: var(--color-muted);">{{ now()->translatedFormat('l, d F Y') }}</div>
    </div>
@endsection

@section('styles')
<style>
    .tally-hero {
        display: flex;
        align-items: flex-end;
        gap: 48px;
        flex-wrap: wrap;
        padding-bottom: 24px;
        margin-bottom: 28px;
        border-bottom: 1px solid var(--color-border);
    }

    .tally-hero .big-number {
        font-size: 64px;
        font-weight: 700;
        line-height: 1;
        font-family: 'IBM Plex Mono', monospace;
    }

    .tally-hero .big-label {
        font-size: 14px;
        color: var(--color-muted);
        margin-top: 6px;
    }

    .tally-row {
        display: flex;
        gap: 40px;
        flex-wrap: wrap;
    }

    .tally-item .num {
        font-size: 26px;
        font-weight: 600;
        font-family: 'IBM Plex Mono', monospace;
    }

    .tally-item .label {
        font-size: 13px;
        color: var(--color-muted);
    }

    .tally-item.warn .num { color: #9A7A0E; }

    .panel {
        background: var(--color-surface);
        border: 1px solid var(--color-border);
        border-radius: 6px;
    }

    .panel-header {
        padding: 16px 20px;
        border-bottom: 1px solid var(--color-border);
        font-weight: 600;
        font-size: 15px;
    }

    .ledger-row {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 13px 20px;
        border-bottom: 1px solid var(--color-border);
        font-size: 14px;
    }

    .ledger-row:last-child { border-bottom: none; }

    .ledger-row .meta {
        color: var(--color-muted);
        font-size: 12.5px;
    }

    .badge-low {
        background: var(--color-accent-soft);
        color: #8A6D0E;
        font-family: 'IBM Plex Mono', monospace;
        font-size: 12px;
        padding: 3px 8px;
        border-radius: 4px;
    }

    .badge-ok {
        background: var(--color-primary-soft);
        color: var(--color-primary);
        font-family: 'IBM Plex Mono', monospace;
        font-size: 12px;
        padding: 3px 8px;
        border-radius: 4px;
    }
</style>
@endsection

@section('content')

    {{-- Hero: total kartu gantung sebagai angka utama --}}
    <div class="tally-hero">
        <div>
            <div class="big-number">{{ $totalKartu ?? '128' }}</div>
            <div class="big-label">kartu gantung tercatat</div>
        </div>

        <div class="tally-row">
            <div class="tally-item">
                <div class="num">{{ $totalItem ?? '96' }}</div>
                <div class="label">jenis barang</div>
            </div>
            <div class="tally-item">
                <div class="num">{{ $totalKategori ?? '12' }}</div>
                <div class="label">kategori</div>
            </div>
            <div class="tally-item">
                <div class="num">{{ $totalLokasi ?? '7' }}</div>
                <div class="label">storage location aktif</div>
            </div>
            <div class="tally-item warn">
                <div class="num">{{ $totalStokMenipis ?? '5' }}</div>
                <div class="label">stok menipis</div>
            </div>
        </div>
    </div>

    <div class="row g-4">
        {{-- Aktivitas terbaru --}}
        <div class="col-lg-7">
            <div class="panel">
                <div class="panel-header">Aktivitas terbaru</div>

                @forelse($aktivitas ?? [
                    ['nama' => 'Kabel NYA 2.5mm', 'aksi' => 'diperbarui', 'petugas' => 'Budi Santoso', 'waktu' => '12 menit lalu'],
                    ['nama' => 'Bearing 6204', 'aksi' => 'ditambahkan', 'petugas' => 'Siti Aminah', 'waktu' => '1 jam lalu'],
                    ['nama' => 'Sarung Tangan Safety', 'aksi' => 'diperbarui', 'petugas' => 'Budi Santoso', 'waktu' => 'Kemarin, 16:40'],
                    ['nama' => 'Oli Hidrolik 20L', 'aksi' => 'dihapus', 'petugas' => 'Rina Marlina', 'waktu' => 'Kemarin, 09:12'],
                ] as $log)
                    <div class="ledger-row">
                        <div>
                            <div>{{ $log['nama'] }} <span class="meta">— {{ $log['aksi'] }}</span></div>
                            <div class="meta">oleh {{ $log['petugas'] }}</div>
                        </div>
                        <div class="meta">{{ $log['waktu'] }}</div>
                    </div>
                @empty
                    <div class="ledger-row">
                        <span class="meta">Belum ada aktivitas.</span>
                    </div>
                @endforelse
            </div>
        </div>

        {{-- Stok menipis --}}
        <div class="col-lg-5">
            <div class="panel">
                <div class="panel-header">Stok menipis</div>

                @forelse($stokMenipis ?? [
                    ['kode' => 'MAT-00231', 'nama' => 'Sekring 10A', 'stok' => 3],
                    ['kode' => 'MAT-00119', 'nama' => 'Mur Baut M8', 'stok' => 6],
                    ['kode' => 'MAT-00087', 'nama' => 'Lem Epoxy', 'stok' => 2],
                ] as $item)
                    <div class="ledger-row">
                        <div>
                            <div>{{ $item['nama'] }}</div>
                            <div class="meta font-mono">{{ $item['kode'] }}</div>
                        </div>
                        <span class="badge-low">{{ $item['stok'] }} tersisa</span>
                    </div>
                @empty
                    <div class="ledger-row">
                        <span class="meta">Semua stok aman.</span>
                    </div>
                @endforelse
            </div>
        </div>
    </div>

@endsection
