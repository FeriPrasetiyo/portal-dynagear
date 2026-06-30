@extends('layouts.app')

@section('content')
<div class="container py-5">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-bold mb-1 text-white">
    Kelola User
</h3>

<p class="text-white-50 mb-0">
    Tambah, edit, dan hapus user Portal Dynagear.
</p>
        </div>

        <div class="d-flex gap-2">
            <a href="{{ route('dashboard') }}"
               class="btn btn-secondary">
                Kembali
            </a>

            <a href="{{ route('users.create') }}"
               class="btn btn-success">
                Tambah User
            </a>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <div class="card border-0 shadow-sm">
        <div class="card-body table-responsive">

            <table class="table table-bordered table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th width="60">No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th width="180">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($users as $user)
                        <tr>
                            <td>{{ $loop->iteration }}</td>

                            <td>
                                <strong>{{ $user->name }}</strong>
                            </td>

                            <td>{{ $user->email }}</td>

                            <td>
                                <span class="badge bg-primary">
                                    {{ $user->role ?? '-' }}
                                </span>
                            </td>

                            <td>
                                <div class="d-flex gap-2">

                                    <a href="{{ route('users.edit', $user->id) }}"
                                       class="btn btn-warning btn-sm">
                                        Edit
                                    </a>

                                    @if($user->id !== auth()->id() && $user->role !== 'super_admin')
                                        <form action="{{ route('users.destroy', $user->id) }}"
                                              method="POST"
                                              onsubmit="return confirm('Yakin ingin menghapus user ini?')">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                    class="btn btn-danger btn-sm">
                                                Hapus
                                            </button>
                                        </form>
                                    @endif

                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted">
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