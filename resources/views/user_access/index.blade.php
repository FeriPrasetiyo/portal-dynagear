@extends('layouts.app')

@section('content')
<div class="container py-5">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-bold mb-1">Pengaturan Akses User</h3>
            <p class="text-muted mb-0">
                Atur akses aplikasi berdasarkan user.
            </p>
        </div>

        <a href="{{ route('dashboard') }}" class="btn btn-secondary">
            Kembali
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card border-0 shadow-sm">
        <div class="card-body table-responsive">

            <table class="table table-bordered table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Sales Report</th>
                        <th>Cek Stock Sales</th>
                        <th>Stock Full</th>
                        <th>Assembling</th>
                        <th>Asm Tambah</th>
                        <th>Asm Edit</th>
                        <th>Asm Hapus</th>
                        <th width="120">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($users as $user)
                        <tr>
                            <td>{{ $loop->iteration }}</td>

                            <td>{{ $user->name }}</td>

                            <td>{{ $user->email }}</td>

                            <td>
                                <span class="badge bg-primary">
                                    {{ $user->role ?? '-' }}
                                </span>
                            </td>

                            <td>
                                {!! optional($user->access)->sales_report ? '<span class="badge bg-success">Ya</span>' : '<span class="badge bg-secondary">Tidak</span>' !!}
                            </td>

                            <td>
                                {!! optional($user->access)->sales_stock_search ? '<span class="badge bg-success">Ya</span>' : '<span class="badge bg-secondary">Tidak</span>' !!}
                            </td>

                            <td>
                                {!! optional($user->access)->stock_full ? '<span class="badge bg-success">Ya</span>' : '<span class="badge bg-secondary">Tidak</span>' !!}
                            </td>

                            <td>
                                {!! optional($user->access)->assembling ? '<span class="badge bg-success">Ya</span>' : '<span class="badge bg-secondary">Tidak</span>' !!}
                            </td>

                            <td>
                                {!! optional($user->access)->assembling_create ? '<span class="badge bg-success">Ya</span>' : '<span class="badge bg-secondary">Tidak</span>' !!}
                            </td>

                            <td>
                                {!! optional($user->access)->assembling_edit ? '<span class="badge bg-success">Ya</span>' : '<span class="badge bg-secondary">Tidak</span>' !!}
                            </td>

                            <td>
                                {!! optional($user->access)->assembling_delete ? '<span class="badge bg-success">Ya</span>' : '<span class="badge bg-secondary">Tidak</span>' !!}
                            </td>

                            <td>
                                <a href="{{ route('user-access.edit', $user->id) }}"
                                   class="btn btn-warning btn-sm">
                                    Edit
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="12" class="text-center text-muted">
                                User belum ada.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

        </div>
    </div>

</div>
@endsection