@extends('layouts.app')

@section('content')
<div class="container py-5">

    <div class="mb-4">
        <a href="{{ route('user-access.index') }}" class="btn btn-secondary">
            Kembali
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card border-0 shadow-sm">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Edit Akses User</h5>
        </div>

        <div class="card-body">

            <div class="mb-4">
                <h5 class="fw-bold mb-1">{{ $user->name }}</h5>
                <div class="text-muted">{{ $user->email }}</div>

                <span class="badge bg-primary mt-2">
                    {{ $user->role ?? '-' }}
                </span>
            </div>

            <div class="row">

                <div class="col-md-6 mb-4">
                    <div class="card border shadow-sm h-100">
                        <div class="card-header fw-bold">
                            Akses Aplikasi
                        </div>

                        <div class="card-body">

                            <form action="{{ route('user-access.update', $user->id) }}"
                                  method="POST">

                                @csrf
                                @method('PUT')

                                <div class="form-check form-switch mb-3">
                                    <input class="form-check-input"
                                           type="checkbox"
                                           name="sales_report"
                                           id="sales_report"
                                           {{ $access->sales_report ? 'checked' : '' }}>

                                    <label class="form-check-label" for="sales_report">
                                        Akses Sales Report
                                    </label>
                                </div>

                                <div class="form-check form-switch mb-3">
                                    <input class="form-check-input"
                                           type="checkbox"
                                           name="sales_stock_search"
                                           id="sales_stock_search"
                                           {{ $access->sales_stock_search ? 'checked' : '' }}>

                                    <label class="form-check-label" for="sales_stock_search">
                                        Akses Pencarian Stock Sales
                                    </label>
                                </div>

                                <div class="form-check form-switch mb-3">
                                    <input class="form-check-input"
                                           type="checkbox"
                                           name="stock_full"
                                           id="stock_full"
                                           {{ $access->stock_full ? 'checked' : '' }}>

                                    <label class="form-check-label" for="stock_full">
                                        Akses Stock Full
                                    </label>
                                </div>

                                <hr>

                                <div class="form-check form-switch mb-3">
                                    <input class="form-check-input"
                                           type="checkbox"
                                           name="assembling"
                                           id="assembling"
                                           {{ $access->assembling ? 'checked' : '' }}>

                                    <label class="form-check-label" for="assembling">
                                        Akses Assembling
                                    </label>
                                </div>

                                <div class="ms-4">
                                    <div class="form-check form-switch mb-3">
                                        <input class="form-check-input"
                                               type="checkbox"
                                               name="assembling_create"
                                               id="assembling_create"
                                               {{ $access->assembling_create ? 'checked' : '' }}>

                                        <label class="form-check-label" for="assembling_create">
                                            Tambah Data Assembling
                                        </label>
                                    </div>

                                    <div class="form-check form-switch mb-3">
                                        <input class="form-check-input"
                                               type="checkbox"
                                               name="assembling_edit"
                                               id="assembling_edit"
                                               {{ $access->assembling_edit ? 'checked' : '' }}>

                                        <label class="form-check-label" for="assembling_edit">
                                            Edit Data Assembling
                                        </label>
                                    </div>

                                    <div class="form-check form-switch mb-4">
                                        <input class="form-check-input"
                                               type="checkbox"
                                               name="assembling_delete"
                                               id="assembling_delete"
                                               {{ $access->assembling_delete ? 'checked' : '' }}>

                                        <label class="form-check-label" for="assembling_delete">
                                            Hapus Data Assembling
                                        </label>
                                    </div>
                                </div>

                                <button class="btn btn-primary">
                                    Simpan Akses
                                </button>

                            </form>

                        </div>
                    </div>
                </div>

                <div class="col-md-6 mb-4">
                    <div class="card border shadow-sm h-100">
                        <div class="card-header fw-bold">
                            Akses Wilayah Assembling
                        </div>

                        <div class="card-body">

                            <form action="{{ route('user-access.update-wilayah', $user->id) }}"
                                  method="POST">

                                @csrf

                                @forelse($wilayahs as $wilayah)
                                    <div class="form-check mb-2">
                                        <input type="checkbox"
                                               name="wilayah_ids[]"
                                               value="{{ $wilayah->id }}"
                                               class="form-check-input"
                                               id="wilayah_{{ $wilayah->id }}"
                                               {{ in_array($wilayah->id, $selectedWilayahIds) ? 'checked' : '' }}>

                                        <label class="form-check-label" for="wilayah_{{ $wilayah->id }}">
                                            {{ $wilayah->nama_wilayah }}
                                        </label>
                                    </div>
                                @empty
                                    <div class="alert alert-info mb-0">
                                        Belum ada wilayah di aplikasi Assembling.
                                    </div>
                                @endforelse

                                <button class="btn btn-success mt-3">
                                    Simpan Wilayah
                                </button>

                            </form>

                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>

</div>
@endsection