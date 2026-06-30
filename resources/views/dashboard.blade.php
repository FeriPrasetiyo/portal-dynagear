@extends('layouts.app')

@section('content')

@php
    $user = Auth::user();

    $assemblingUrl = rtrim(env('ASSEMBLING_URL', 'https://assembling.dynagear.co.id'), '/');
    $stockUrl = rtrim(env('STOCK_URL', 'https://stock.dynagear.co.id'), '/');
@endphp

<div class="container py-5">

    @include('dashboard.partials.hero', [
        'user' => $user,
    ])

    @if($user->role === 'super_admin')
        @include('dashboard.partials.admin-actions')
    @endif

    <div class="row">

        @if($user->canAccessAssembling())
            @include('dashboard.partials.app-card', [
                'url' => $assemblingUrl . '/wilayah',
                'icon' => 'bi-tools',
                'color' => 'primary',
                'title' => 'Assembling',
                'description' => 'Sistem dokumentasi assembling produksi Dynagear.',
                'buttonText' => 'Masuk Sistem',
            ])
        @endif

        @if($user->canAccessStockFull())
            @include('dashboard.partials.app-card', [
                'url' => $stockUrl . '/dashboard',
                'icon' => 'bi-box-seam',
                'color' => 'success',
                'title' => 'Stock',
                'description' => 'Sistem stock dan inventory barang.',
                'buttonText' => 'Masuk Sistem',
            ])
        @endif

        @if($user->canAccessSalesStockSearch())
            @include('dashboard.partials.app-card', [
                'url' => $stockUrl . '/sales/stock-search',
                'icon' => 'bi-search',
                'color' => 'warning',
                'title' => 'Pencarian Stock',
                'description' => 'Cari stock barang untuk kebutuhan sales.',
                'buttonText' => 'Cari Stock',
            ])
        @endif

    </div>

</div>

@endsection