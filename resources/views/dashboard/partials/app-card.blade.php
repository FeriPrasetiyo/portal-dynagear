<div class="col-md-4 mb-4">
    <a href="{{ $url }}"
       class="text-decoration-none">
        <div class="card portal-card h-100 shadow">
            <div class="card-body text-center p-5">

                <div class="icon-box bg-{{ $color }}-subtle text-{{ $color }}">
                    <i class="bi {{ $icon }}"></i>
                </div>

                <h4 class="fw-bold text-dark">
                    {{ $title }}
                </h4>

                <p class="text-muted">
                    {{ $description }}
                </p>

                <span class="btn btn-{{ $color }} rounded-pill px-4">
                    {{ $buttonText }}
                </span>

            </div>
        </div>
    </a>
</div>