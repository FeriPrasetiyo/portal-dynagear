@extends('layouts.app')

@section('content')
<div class="container py-5">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-bold mb-1">
                Tambah User
            </h3>

            <p class="text-muted mb-0">
                Tambahkan user baru ke Portal Dynagear.
            </p>
        </div>

        <a href="{{ route('users.index') }}"
           class="btn btn-secondary">
            Kembali
        </a>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-body">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Terjadi Kesalahan:</strong>

                    <hr>

                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('users.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label fw-semibold">
                        Nama
                    </label>

                    <input type="text"
                           name="name"
                           class="form-control"
                           value="{{ old('name') }}"
                           placeholder="Masukkan nama user"
                           required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">
                        Email
                    </label>

                    <input type="email"
                           name="email"
                           class="form-control"
                           value="{{ old('email') }}"
                           placeholder="contoh@dynagear.test"
                           required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">
                        Password
                    </label>

                    <input type="password"
                           name="password"
                           class="form-control"
                           placeholder="Masukkan password"
                           required>
                </div>

                <div class="mb-4">
                    <label class="form-label fw-semibold">
                        Role
                    </label>

                    <select name="role"
                            class="form-select"
                            required>
                        <option value="">
                            -- Pilih Role --
                        </option>

                        @foreach($roles as $role)
                            <option value="{{ $role }}"
                                {{ old('role') === $role ? 'selected' : '' }}>
                                {{ ucwords(str_replace('_', ' ', $role)) }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="alert alert-info">
                    User baru hanya dibuat di Portal. Akses aplikasi bisa diatur setelah user berhasil dibuat.
                </div>

                <div class="d-flex gap-2">
                    <button type="submit"
                            class="btn btn-success">
                        Simpan User
                    </button>

                    <a href="{{ route('users.index') }}"
                       class="btn btn-secondary">
                        Batal
                    </a>
                </div>

            </form>

        </div>
    </div>

</div>
@endsection