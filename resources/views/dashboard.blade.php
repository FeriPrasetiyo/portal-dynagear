@extends('layouts.app')

@section('content')

<div class="container py-5">

    <div class="hero-card shadow-lg p-4 p-md-5 mb-4">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center">
            <div>
                <h1 class="fw-bold mb-2">
                    Portal Dynagear
                </h1>

                <p class="text-muted mb-0">
                    Selamat datang, <strong>{{ Auth::user()->name }}</strong>.
                    Pilih sistem yang ingin digunakan.
                </p>
            </div>

            <div class="mt-3 mt-md-0">
                <span class="badge bg-primary fs-6 px-3 py-2">
                    {{ strtoupper(Auth::user()->role ?? 'USER') }}
                </span>
            </div>
        </div>
    </div>

    @if(Auth::user()->role === 'super_admin')
        <div class="mb-4 d-flex gap-2 flex-wrap">

            <a href="{{ route('users.index') }}"
               class="btn btn-primary shadow-sm">
                Kelola User
            </a>

            <a href="{{ route('users.create') }}"
               class="btn btn-success shadow-sm">
                Tambah User
            </a>

            @if(Route::has('user-access.index'))
                <a href="{{ route('user-access.index') }}"
                   class="btn btn-warning shadow-sm">
                    Pengaturan Akses
                </a>
            @endif

        </div>
    @endif

    <div class="row">

        @if(Auth::user()->canAccessAssembling())
            <div class="col-md-4 mb-4">
                <a href="https://assembling.dynagear.co.id/wilayah"
                   class="text-decoration-none">
                    <div class="card portal-card h-100 shadow">
                        <div class="card-body text-center p-5">
                            <div class="icon-box bg-primary-subtle text-primary">
                                🏭
                            </div>

                            <h4 class="fw-bold text-dark">
                                Assembling
                            </h4>

                            <p class="text-muted">
                                Sistem dokumentasi assembling produksi Dynagear.
                            </p>

                            <span class="btn btn-primary rounded-pill px-4">
                                Masuk Sistem
                            </span>
                        </div>
                    </div>
                </a>
            </div>
        @endif

        @if(Auth::user()->canAccessStockFull())
            <div class="col-md-4 mb-4">
                <a href="https://stock.dynagear.co.id/dashboard"
                   class="text-decoration-none">
                    <div class="card portal-card h-100 shadow">
                        <div class="card-body text-center p-5">
                            <div class="icon-box bg-success-subtle text-success">
                                📦
                            </div>

                            <h4 class="fw-bold text-dark">
                                Stock
                            </h4>

                            <p class="text-muted">
                                Sistem stock dan inventory barang.
                            </p>

                            <span class="btn btn-success rounded-pill px-4">
                                Masuk Sistem
                            </span>
                        </div>
                    </div>
                </a>
            </div>
        @endif

        @if(Auth::user()->canAccessSalesStockSearch())
            <div class="col-md-4 mb-4">
                <a href="https://stock.dynagear.co.id/sales/stock-search"
                   class="text-decoration-none">
                    <div class="card portal-card h-100 shadow">
                        <div class="card-body text-center p-5">
                            <div class="icon-box bg-warning-subtle text-warning">
                                🔎
                            </div>

                            <h4 class="fw-bold text-dark">
                                Pencarian Stock
                            </h4>

                            <p class="text-muted">
                                Cari stock barang untuk kebutuhan sales.
                            </p>

                            <span class="btn btn-warning rounded-pill px-4">
                                Cari Stock
                            </span>
                        </div>
                    </div>
                </a>
            </div>
        @endif

    </div>

</div>

@endsection