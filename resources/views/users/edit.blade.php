@extends('layouts.app')

@section('content')
<div class="container py-5">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-bold mb-1 text-white">
              Edit User
            </h3>

            <p class="text-white-50 mb-0">
                Perbarui data user Portal Dynagear.
            </p>
        </div>

        <a href="{{ route('users.index') }}"
           class="btn btn-secondary">
            Kembali
        </a>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Terjadi kesalahan:</strong>

            <ul class="mb-0 mt-2">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card border-0 shadow-sm">
        <div class="card-body">

            <form action="{{ route('users.update', $user->id) }}"
                  method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label fw-semibold">
                        Nama
                    </label>

                    <input type="text"
                           name="name"
                           class="form-control"
                           value="{{ old('name', $user->name) }}"
                           required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">
                        Email
                    </label>

                    <input type="email"
                           name="email"
                           class="form-control"
                           value="{{ old('email', $user->email) }}"
                           required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">
                        Password Baru
                    </label>

                    <input type="password"
                           name="password"
                           class="form-control"
                           placeholder="Kosongkan jika tidak ingin mengubah password">

                    <small class="text-muted">
                        Isi hanya jika ingin mengganti password.
                    </small>
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
                                {{ old('role', $user->role) === $role ? 'selected' : '' }}>
                                {{ ucwords(str_replace('_', ' ', $role)) }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="d-flex gap-2">
                    <button type="submit"
                            class="btn btn-primary">
                        Simpan Perubahan
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