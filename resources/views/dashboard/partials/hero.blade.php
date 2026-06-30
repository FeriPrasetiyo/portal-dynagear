<div class="hero-card shadow-lg p-4 p-md-5 mb-4">
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3">

        <div class="d-flex align-items-center gap-3">

            <div class="dashboard-logo-box">
                <img src="{{ asset('img/logo/dynagearlogo.jpg') }}"
                     alt="Dynagear Logo"
                     class="dashboard-logo">
            </div>

            <div>
                <h1 class="fw-bold mb-2">
                    Portal Dynagear
                </h1>

                <p class="text-muted mb-0">
                    Selamat datang, <strong>{{ $user->name }}</strong>.
                    Pilih sistem yang ingin digunakan.
                </p>
            </div>

        </div>

        <div>
            <span class="badge bg-primary fs-6 px-3 py-2">
                {{ strtoupper($user->role ?? 'USER') }}
            </span>
        </div>

    </div>
</div>