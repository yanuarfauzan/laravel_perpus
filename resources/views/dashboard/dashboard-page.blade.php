@extends('layouts.main')
@section('content')
    <div class="page-heading">
        <h3>Dashboard</h3>
    </div>
    <div class="page-content">
        <section class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body py-4-5 px-4">
                        <div class="d-flex align-items-center">
                            <div class="avatar avatar-xl">
                                <img src="assets/images/faces/1.jpg" alt="Face 1" />
                            </div>
                            <div class="ms-3 name">
                                <h5 class="font-bold">{{ session('user_data')['username'] }}</h5>
                                <h6 class="text-muted mb-0">{{ session('user_data')['email'] }}</h6>
                                <h6 class="text-muted mb-0"> Role anda
                                    : {{ session('user_data')['role_id'] === 1 ? 'admin' : 'user' }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="row">
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                        <div class="stats-icon purple mb-2">
                                            <i class="iconly-boldShow"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                        <h6 class="text-muted font-semibold">
                                            Buku
                                        </h6>
                                        <h6 class="font-extrabold mb-0">{{ $totalBuku }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                        <div class="stats-icon blue mb-2">
                                            <i class="iconly-boldProfile"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                        <h6 class="text-muted font-semibold">Kategori</h6>
                                        <h6 class="font-extrabold mb-0">{{ $totalKategori }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    <div class="col-12 col-md-12">
        <div class="card">
            <h4 class="font-semibold mt-3 ms-3">
                Buku Terbaru
            </h4>
            <div class="card-body">
                <div class="row mt-3">
                    @foreach ($bukuBaru as $b)
                        <div class="col-md-3 text-center">
                            <a href="/detail_buku/{{ $b->id }}">
                                <img src="image/{{ $b->cover_buku }}" alt="" width="100px">
                                <h6 class="text-muted font-semibold mt-3">
                                    {{ $b->judul_buku }}
                                </h6>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    </section>
@endsection
