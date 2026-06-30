@if ($errors->any())
    <div class="alert alert-danger">
        Email atau password salah.
    </div>
@endif

@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif

<form method="POST" action="{{ route('login') }}">
    @csrf

    <div class="mb-3">
        <label class="form-label fw-semibold">
            Email
        </label>

        <input type="email"
               name="email"
               class="form-control"
               value="{{ old('email') }}"
               placeholder="contoh: admin@dynagear.com"
               required
               autofocus>
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

    <div class="d-flex justify-content-between align-items-center mb-4">
        <label class="form-check-label text-muted">
            <input type="checkbox"
                   name="remember"
                   class="form-check-input">
            Remember me
        </label>
    </div>

    <button type="submit"
            class="btn btn-primary btn-login w-100">
        Masuk Portal
    </button>
</form>