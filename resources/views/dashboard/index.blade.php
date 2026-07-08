@extends('layouts.app')

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row align-items-center">
            <div class="col-12 col-md-8 order-md-1 order-last">
                <h3 class="mb-1">Dashboard</h3>
                <p class="text-subtitle text-muted mb-0">
                    Selamat datang, <b>{{ auth()->user()->name }}</b>! 👋
                </p>
            </div>
            <div class="col-12 col-md-4 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <section class="row g-4 mt-2">
        <div class="col-12 col-md-6">
            <div class="card border-0 shadow-sm h-100 rounded-4 overflow-hidden">
                <div class="card-body px-4 py-4">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <h6 class="text-muted mb-2">Total Siswa</h6>
                            <h3 class="fw-bold mb-0">{{ $totalSiswa }}</h3>
                        </div>
                        <div class="stats-icon blue rounded-circle p-3 shadow-sm">
                            <i class="iconly-boldProfile fs-4"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-6">
            <div class="card border-0 shadow-sm h-100 rounded-4 overflow-hidden">
                <div class="card-body px-4 py-4">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <h6 class="text-muted mb-2">Total Guru</h6>
                            <h3 class="fw-bold mb-0">{{ $totalGuru }}</h3>
                        </div>
                        <div class="stats-icon red rounded-circle p-3 shadow-sm">
                            <i class="iconly-boldAdd-User fs-4"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-6">
            <div class="card border-0 shadow-sm h-100 rounded-4 overflow-hidden">
                <div class="card-body px-4 py-4">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <h6 class="text-muted mb-2">Total Kelas</h6>
                            <h3 class="fw-bold mb-0">{{ $totalKelas }}</h3>
                        </div>
                        <div class="stats-icon green rounded-circle p-3 shadow-sm">
                            <i class="iconly-boldBookmark fs-4"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-6">
            <div class="card border-0 shadow-sm h-100 rounded-4 overflow-hidden">
                <div class="card-body px-4 py-4">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <h6 class="text-muted mb-2">Total Mapel</h6>
                            <h3 class="fw-bold mb-0">{{ $totalMapel }}</h3>
                        </div>
                        <div class="stats-icon purple rounded-circle p-3 shadow-sm">
                            <i class="iconly-boldDocument fs-4"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection