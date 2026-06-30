<div class="mb-4 d-flex gap-2 flex-wrap">

    @if(Route::has('users.index'))
        <a href="{{ route('users.index') }}"
           class="btn btn-primary shadow-sm">
            Kelola User
        </a>
    @endif

    @if(Route::has('users.create'))
        <a href="{{ route('users.create') }}"
           class="btn btn-success shadow-sm">
            Tambah User
        </a>
    @endif

    @if(Route::has('user-access.index'))
        <a href="{{ route('user-access.index') }}"
           class="btn btn-warning shadow-sm">
            Pengaturan Akses
        </a>
    @endif

</div>